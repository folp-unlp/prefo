<?php

/**
 * Recupera una sesión existente o inicia una nueva.
 * @return bool
 */
session_start();

/**
 * Cargamos el archivo de configuración y el autoloader.
 */
require 'config.php';
require 'vendor/autoload.php';

/**
 * Reporte de errores para depuración durante el desarrollo.
 * @return bool
 */
if (DEVELOPMENT_MODE) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    error_reporting(E_ALL);
    ini_set('log_errors', 'On');
    ini_set('error_log', 'error.log');
    ini_set('display_errors', 'Off');
}
//
if (!empty(DEFAULT_TIMEZONE)) {
    date_default_timezone_set(DEFAULT_TIMEZONE);
}

/**
 * Inicializa los controladores desde el directorio de controladores
 * @return null
 */
function autoloadController($className)
{
    $filename = CONTROLLERS_DIR . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

/**
 * Inicializa las librerías desde el directorio de librerías
 * @return boolean
 */
function autoloadLibrary($className)
{
    $filename = LIBS_DIR . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

/**
 * Inicializa los helpers desde el directorio de helpers
 * @return null
 */
function autoloadHelper($className)
{
    $filename = HELPERS_DIR . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

/**
 * Registra los autoloaders de las clases.
 */
spl_autoload_register("autoloadController");
spl_autoload_register("autoloadLibrary");
spl_autoload_register("autoloadHelper");

/**
 * Inicializa las funciones globales desde el directorio de helpers
 */
require HELPERS_DIR . 'Functions.php';

$lang = new Lang; // Inicializa la clase "lang" y carga el idioma por defecto
$csrf = new Csrf; // Inicializa la clase "Csrf" y genera un nuevo token de aplicación
$csrf_token = $csrf::$token;


/**
 * Clases principales de la aplicación.
 */
require 'BaseModel.php';
require 'BaseController.php';
require 'SecureController.php';
require 'BaseView.php';
require 'Router.php';

/**
 * Inicializa el manejador de errores.
 * @return null
 */
function exception_handler($exception)
{
    $view = new BaseView();
    $view->render("errors/error_server.php", $exception, "info_layout.php");
    exit;
}
set_exception_handler('exception_handler');

/** */