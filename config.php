<?php
define("CORE_VERSION"    , "1.4.0");  // Versión del framework (para control de actualizaciones)
define("DEFAULT_TIMEZONE", "America/Argentina/Buenos_Aires"); // Zona horaria por defecto
define("DEVELOPMENT_MODE", true); // Para producción definir en false

// Define la ruta completa de la aplicación y el directorio de la aplicación
define("ROOT"         , str_replace("\\", "/", dirname(__FILE__)) . "/");
define("ROOT_DIR_NAME", basename(ROOT));

// Define el nombre de la aplicación y su propietario
define("SITE_VERSION", "1.0.0");
define("SITE_NAME"   , "Prefo2");
define("SITE_OWNER"  , "Marco de desarrollo PHP para aplicaciones web");

// Obtinemos la dirección del sitio de forma dinámica, debe terminar con '/'
$site_addr = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== "off" ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["SCRIPT_NAME"]);
$site_addr = rtrim($site_addr, "/\\") . "/";
define("SITE_ADDR", $site_addr);

// ID y color por defecto (usado en entornos móbiles)
define("APP_ID"          , "09e72c457f2348ea2eb9d5cfdb4f57bb");
define("META_THEME_COLOR", "#000000");

// Estado del acceso a los recursos
define("AUTHORIZED"  , 200);
define("UNAUTHORIZED", 401);
define("NOROLE"      , 404);
define("FORBIDDEN"   , 403);

// Directorios y archivos de la aplicación
define("FONTS_DIR"    , "assets/fonts/");
define("IMG_DIR"      , "assets/images/");
define("LANGS_DIR"    , "assets/langs/");
define("CSS_DIR"      , SITE_ADDR . "assets/css/");
define("JS_DIR"       , SITE_ADDR . "assets/js/");
define("PLUGINS_DIR"  , SITE_ADDR . "assets/plugins/");
define("THEMES_DIR"   , SITE_ADDR . "assets/themes/");
define("SITE_FAVICON" , IMG_DIR . "favicon.png");
define("SITE_LOGO"    , IMG_DIR . "logo.png");

define("APP_DIR"        , "app/");
define("SYSTEM_DIR"     , "system/");
define("HELPERS_DIR"    , "helpers/");
define("LIBS_DIR"       , "libs/");
define("CONTROLLERS_DIR", APP_DIR . "controllers/");
define("VIEWS_DIR"      , APP_DIR . "views/");
define("AUDIT_LOGS_DIR" , APP_DIR . "logs/");
define("LAYOUTS_DIR"    , VIEWS_DIR . "layouts/");
define("PARTIALS_DIR"   , VIEWS_DIR . "partials/");

// Ajustes para subida de archivoss
define("UPLOAD_DIR"         , APP_DIR . "uploads/");
define("UPLOAD_FILE_DIR"    , UPLOAD_DIR . "files/");
define("UPLOAD_IMG_DIR"     , UPLOAD_DIR . "photos/");
define("MAX_UPLOAD_FILESIZE", trim(ini_get("upload_max_filesize")));

// Default Homepage, Controller, Action, Layout, Language
define("HOME_PAGE"          , "Home");
define("DEFAULT_PAGE"       , "index");
define("DEFAULT_PAGE_ACTION", "index");
define("DEFAULT_LAYOUT"     , LAYOUTS_DIR . "main_layout.php");
define("DEFAULT_LANGUAGE"   , "spanish");

// Page Meta Information
define("META_AUTHOR"     , "");
define("META_DESCRIPTION", "");
define("META_KEYWORDS"   , "");
define("META_VIEWPORT"   , "width=device-width, initial-scale=1.0");
define("PAGE_CHARSET"    , "UTF-8");

// Ajustes de Email
define("USE_SMTP"     ,false);
define("SMTP_USERNAME", "");
define("SMTP_PASSWORD", "");
// code4odonto | auqgjyqyvgtjrfxy

define("SMTP_HOST", "");
define("SMTP_PORT", "");

// Detalles del Email Sender por defecto
// Configure esto incluso si no está utilizando SMTP
define("DEFAULT_EMAIL"             , "");
define("DEFAULT_EMAIL_ACCOUNT_NAME", "");

// Ajustes de la base de datos
define("DB_HOST"    , "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME"    , "prefo2");
define("DB_TYPE"    , "mysql");
define("DB_PORT"    , "3306");
define("DB_CHARSET" , "utf8");

// Registros por defecto que muestra el paginado y tipo de ordenación
define("MAX_RECORD_COUNT", 20);
define("ORDER_TYPE"      , "DESC");

// Detalles del perfil del usuario activo





define('USER_THEME',(isset($_SESSION[APP_ID.'user_data']) ? $_SESSION[APP_ID.'user_data']['theme'] : null ));
define('USER_FIRSTNAME',(isset($_SESSION[APP_ID.'user_data']) ? $_SESSION[APP_ID.'user_data']['firstname'] : null ));
define('USER_LASTNAME',(isset($_SESSION[APP_ID.'user_data']) ? $_SESSION[APP_ID.'user_data']['lastname'] : null ));