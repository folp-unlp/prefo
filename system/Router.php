<?php

/**
 * --------------------------------------------------
 * Router Class
 * --------------------------------------------------
 *
 * Enrutador dinámico que analiza la URL y envía el controlador/función (o método) con argumentos opcionales.
 *
 * Como generar nombres correctamente para las rutas:
 * - El nombre del controlador debe comenzar con mayúscula seguido de la palabra "Controller", ej.: UserController.
 * - Los nombres de las acciones deben estar en minúsculas, ej.: index, view, edit, delete.
 *
 * Ejemplos de rutas válidas
 * - users (es igual a: users/index)
 * - users/{función}/{argumento}
 * - users/view/{id}
 * - users/edit/{id}
 * - users/delete/{id}
 * - users/{función}/{argumento1}/{argumento2}/{argumento3}/
 *
 * Se puede acceder a los métodos del objeto Router de forma estática
 * - Router::$page_name //devuelve el nombre del controlador actual
 * - Router::$page_action //devuelve la función actual del controlador
 *
 * @category PageDispatcher
 * @package URLParser
 * @version 1.0.2
 * @copyright Fernando Merlo (ctrbts.dev@gmail.com)
 *
 */

class Router
{
    // Devuelve el nombre de la página
    public static $page_name = null;

    // Devuelve la función
    public static $page_action = null;

    // Devuelve el id de la página
    public static $page_id = null;

    // Devuelve el nombre del campo o la categoría
    public static $field_name = null;

    // Devuelve el valor del campo
    public static $field_value = null;

    // Devuelve la ruta relativa completa
    public static $page_url = null;

    // Devuelve el nombre del controlador de la página
    public static $controller_name = null;

    // "false" si se renderiza la vista como una vista parcial sin el marco
    public $is_partial_view = false;

    // Propiedades pasadas desde otra vista a la página actual
    public $page_props = array();

    // Anula el marco por defecto que se usará en la página
    public $force_layout = null;

    // Devuelve el nombre de la vista
    public $partial_view = null;

    // Solicitud de la página
    public $request = array();

    /**
     * Inicia el proceso de despliegue de la pagina desde la URL actual.
     * Este método se llama desde al inicio de la aplicación
     * @var string
     */
    function init()
    {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $page_url = substr($_SERVER['REQUEST_URI'], strlen($basepath));
        $path = parse_url($page_url, PHP_URL_PATH);
        $this->run($path);
    }

    /**
     * Despliega una página basado en la URL
     * Esta función se utiliza para despachar todas las páginas
     * @return string
     */
    function run($url)
    {
        self::$page_url = $url;
        $url_segment = array_map('urldecode', explode("/", rtrim($url, "/")));
        $page = strtolower(!empty($url_segment[0]) ? $url_segment[0] : DEFAULT_PAGE);

        // Los nombres de los métodos deben estar en lowercase
        $action     = strtolower((!empty($url_segment[1]) ? $url_segment[1] : DEFAULT_PAGE_ACTION));
        $fieldname  = (!empty($url_segment[2]) ? $url_segment[2] : null);
        $fieldvalue = (!empty($url_segment[3]) ? $url_segment[3] : null);

        // Elimina caracteres no deseados que puedan interactuar con la base de datos
        $page       = filter_var($page, FILTER_UNSAFE_RAW);
        $action     = filter_var($action, FILTER_UNSAFE_RAW);
        $fieldname  = filter_var($fieldname, FILTER_UNSAFE_RAW);
        $fieldvalue = filter_var($fieldvalue, FILTER_UNSAFE_RAW);

        // Si la funcion solictada es 'list' la cambiamos por 'index' (ej. users/list -> users/index)
        if ($action == "list") {
            $action = "index";
        }

        // Array de argumentos que se pasarán a la función del controlador
        $args = array_slice($url_segment, 2);
        $args = filter_var_array($args, FILTER_UNSAFE_RAW);

        $page_id = (!empty($args[0]) ? $args[0] : null);

        // Los nombres de los controladores deben estar en capital letter y terminar con la palabra 'Controller'
        $controller_name = ucfirst($page) . "Controller";

        if (class_exists($controller_name, true)) {
            // Asignamos las variables que pueden ser accedidas desde 'Router::$page_variable_name'
            self::$page_name       = $page;
            self::$page_action     = $action;
            self::$page_id         = $page_id;
            self::$field_name      = $fieldname;
            self::$field_value     = $fieldvalue;
            self::$controller_name = $controller_name;

            if (method_exists($controller_name, $action)) {
                // Inicializamos la clase del controlador
                $controller = new $controller_name;
                if ($this->is_partial_view == true) {
                    // Si es una vista parcial mostramos la página sin el marco
                    $controller->view->is_partial_view = $this->is_partial_view;
                    if (!empty($this->page_props) && is_array($this->page_props)) {
                        foreach ($this->page_props as $key => $val) {
                            $controller->view->$key = $val;
                        }
                    }
                    $controller->set_request($this->request);
                    $controller->view->page_props = $this->page_props;
                    $controller->view->partial_view = $this->partial_view;
                }
                // Forzamos el uso del marco si esta configurado
                $controller->view->force_layout = $this->force_layout;
                if (is_post_request()) {
                    // Pasamos el post como argumeto al metodo del controlador
                    // NOTA: la sanitización es manejada por el controlador
                    $args[] = $_POST;
                }
                if (is_callable(array($controller, $action))) {
                    $route = new stdClass;
                    $route->page_name = $page;
                    $route->page_action = $action;
                    $route->page_id = $page_id;
                    $route->page_url = $url;
                    $route->field_name = $fieldname;
                    $route->field_value = $fieldvalue;
                    $route->controller = $controller_name;
                    $route->params = $args;

                    $controller->set_route($route);

                    if ($controller->status == AUTHORIZED) {
                        // Llama a la clase del controlador y envia todos los argumentos al metodo del controlador
                        call_user_func_array(array($controller, $action), $args);
                    } elseif ($controller->status == UNAUTHORIZED) { // cuando el usuario no esta logueado
                        //$view->page_error="Not Logged In";
                        $current_url = get_current_url();
                        if (!empty($current_url)) {
                            set_session("login_redirect_url", $current_url);
                        }
                        $controller->render_view("index/login.php", null, "main_layout.php");
                    } elseif ($controller->status == FORBIDDEN) {
                        $controller->render_view("errors/forbidden.php", null, "info_layout.php");
                    } elseif ($controller->status == NOROLE) {
                        $controller->render_view("errors/error_no_permission.php", null, "info_layout.php");
                    }
                } else {
                    $this->page_not_found("$action Action  Was  Not Found In $controller_name");
                }
            } else {
                $this->page_not_found("$action Action  Was  Not Found In $controller_name");
            }
        } else {
            if ($this->is_partial_view == true) {
                echo "<div class='alert alert-danger'><b>$controller_name</b> Was  Not Found In Controller Directory. <b>Please Check </b>" . CONTROLLERS_DIR . "</div>";
            } else {
                $this->page_not_found("<b>$controller_name</b> Was  Not Found In Controller Directory. <b>Please Check </b>" . CONTROLLERS_DIR);
            }
        }
    }

    /**
     * Mostramos un error cuando la página o el controlador no se encuentran
     * @var string
     */
    function page_not_found($msg)
    {
        $view = new BaseView();
        $view->render("errors/error_404.php", $msg, "info_layout.php");
        exit;
    }
}
