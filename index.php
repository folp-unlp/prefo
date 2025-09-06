<?php

/**
 * --------------------------------------------------
 * Application Entry Point
 * --------------------------------------------------
 *
 * Requerimos el archivo principal de la aplicación
 * luego inicializamos el router y ejecutamos el proceso principal.
 *
 */

require_once 'classes/Core.php';

$core_app = new Router;
$core_app->init();