<?php

/**
 * --------------------------------------------------
 * SecureController Class
 * --------------------------------------------------
 *
 * Extiende la clase BaseController.
 * Las páginas que necesiten autenticación o autoriuzación deben extender de esta clase.
 *
 * @category Security
 * @package SecureController
 * @version 1.0.1
 * @copyright Fernando Merlo (ctrbts.dev@gmail.com)
 *
*/

class SecureController extends BaseController{
	function __construct(){
		parent::__construct();
		// Métodos de página que no necesitan autorización
		$exclude_pages = array();
		$url = Router::$page_url;
		$url = str_ireplace("/index", "/list", $url);

		

		if(!empty($url)){
			$url_segment =$url_segment = explode("/" , rtrim($url , "/")) ;
			$controller = strtolower(!empty($url_segment[0]) ? $url_segment[0] : null);
			$action = strtolower((!empty($url_segment[1]) ? $url_segment[1] : "list"));
			$page = "$controller/$action";
			if(!in_array($page , $exclude_pages)){
				if($this->authenticate_user()){
					
					$this->status = AUTHORIZED;

				}
				else{
					$this->status = UNAUTHORIZED;
				}
			}
		}
	}

	/**
	 * Autentica y verifica el acceso a págians por parte del usuario
	 * @return Redirige al login o muetra un mensaje de error cuando la autenticación falla
	 */
	private function authenticate_user()
	{
		if (user_login_status() == false) {
			$session_key = get_cookie("login_session_key");
			if (!empty($session_key)) {
				$db = $this->GetModel();
				$db->where("login_session_key", hash_value($session_key));
				$user = $db->getOne("__tablename");
				if (!empty($user)) {
					set_session("user_data", $user);
				}
			}
		}

		return user_login_status();
	}
}