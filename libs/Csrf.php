<?php

/**
 * Csrf - Cross Site Request Forgery
 * Evita ataques de tipo CSRF validando el token generado.
 * @version 1.0.0
 * @author  Fernando Merlo <ctrbts.dev@gmail.com>
 */
class Csrf
{
	/**
	 * @var string $token Token de seguridad.
	 */
	public static $token = null;

	/**
	 * Inicializa el token de seguridad.
	 * @return null
	 */
	function __construct()
	{
		$token = get_session('csrf_token');
		if (empty($token)) {
			$token = hash_value(random_str(12));
			set_session('csrf_token', $token);
		}
		self::$token = $token;
	}

	/**
	 * Verifica si la solicitud proviene de nuestro servidor
	 * @category  Security
	 */
	public static function cross_check()
	{
		$current_token = get_session('csrf_token');

		$req_token = "";
		if (!empty($_SERVER['HTTP_X_CSRF_TOKEN'])) {
			$req_token = $_SERVER['HTTP_X_CSRF_TOKEN'];
		} elseif (!empty($_REQUEST['csrf_token'])) {
			$req_token = $_REQUEST['csrf_token'];
		}

		if ($req_token != $current_token) {
			render_error("Se detectó una falsificación de solicitud entre sitios. Comuníquese con el administrador del sistema para más información", 403);
			exit;
		}

		return null;
	}
}
