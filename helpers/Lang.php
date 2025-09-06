<?php

/**
 * Clase para el manejo de idiomas
 * @version 1.0.0
 * @author  Fernando Merlo <ctrbts.dev@gmail.com>
 */
class Lang
{
	public $phrases = array();

	function __construct()
	{
		$lang_get = get_cookie('lang');
		$lang_set = (!empty($lang_get) ? $lang_get : DEFAULT_LANGUAGE);

		if (file_exists(LANGS_DIR . "$lang_set.ini")) {
			$this->phrases = parse_ini_file(LANGS_DIR . "$lang_set.ini");
		}
	}

	/**
	 * Recupera el idioma del usuario o devuelve el idioma por defecto
	 * @return string
	 */
	public static function get_user_language()
	{
		$lang_get = get_cookie('lang');
		$lang_set = (!empty($lang_get) ? $lang_get : DEFAULT_LANGUAGE);
		return $lang_set;
	}

	/**
	 * Recupera las cadenas del idioma
	 * @return string
	 */
	public function get_phrase($key)
	{
		$phrase = isset($this->phrases[$key]) ? $this->phrases[$key] : null;
		return $phrase;
	}
}
