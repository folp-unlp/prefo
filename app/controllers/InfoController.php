<?php

/**
 * Info Contoller Class
 * @category  Controller
 */

class InfoController extends BaseController
{
    /**
     * Display About us page
     * @return Html View
     */
    function about()
    {
        $this->render_view("info/about.php", null, "info_layout.php");
    }

    /**
     * Display Help Page
     * @return Html View
     */
    function help()
    {
        $this->render_view("info/help.php", null, "info_layout.php");
    }

    /**
     * Display Features Page
     * @return Html View
     */
    function features()
    {
        $this->render_view("info/features.php", null, "info_layout.php");
    }

    /**
     * Display Privacy Policy Page
     * @return Html View
     */
    function privacy_policy()
    {
        $this->render_view("info/privacy_policy.php", null, "info_layout.php");
    }

    /**
     * Display Terms And Conditions Page
     * @return Html View
     */
    function terms_and_conditions()
    {
        $this->render_view("info/terms_and_conditions.php", null, "info_layout.php");
    }

    /**
     * Display Contact us Page
     * @return Html View
     */
    function contact()
    {
        if (is_post_request()) {
            $this->rules_array = array(
                'email' => 'required|valid_email',
                'name'  => 'required',
                'msg'   => 'required'
            );
            $this->sanitize_array = array(
                'email' => 'sanitize_string',
                'name'  => 'sanitize_string',
                'msg'   => 'sanitize_string'
            );

            // validate form data and pass any error to view page
            $modeldata = $this->modeldata = $this->validate_form($_POST);
            if (empty($this->view->page_error)) {
                $email            = $modeldata['email'];
                $name             = $modeldata['name'];
                $msg              = $modeldata['msg'];
                $title            = "New Contact us Message From $name";
                $mailer           = new Mailer;
                $mailer->From     = $email;
                $mailer->FromName = $name;
                $mailer->send_mail(DEFAULT_EMAIL, $title, $msg);
                return    $this->redirect("contact_sent");
            }
        }

        $this->render_view("info/contact.php", null, "info_layout.php");
    }

    /**
     * Display Contact Success Page After Sending Form
     * @return Html View
     */
    function contact_sent()
    {
        $this->render_view("info/contact_sent.php", null, "info_layout.php");
    }

    /**
     * Display Change default language page
     * @return Html View
     */
    function change_language($lang = null)
    {
        if (!empty($lang)) {
            set_cookie('lang', $lang);
            redirect_to_page(DEFAULT_PAGE);
        } else {
            $this->render_view("info/change_language.php", null, "info_layout.php");
        }
    }

    /**
     * Show the application info.
     * @return mixed
     */
    function get_info()
    {
        $db  = $this->GetModel();
        $arr = [
            'Versión del sistema'      => SITE_NAME . ' v' . SITE_VERSION,
            'Versión del framework'    => sprintf('CoreFramework v%s', CORE_VERSION),
            'ID del sistema'           => APP_ID,
            'Versión PHP'              => phpversion(),
            'Versión SO'               => php_uname(),
            'Versión RDBMS'            => $db->pdo()->getAttribute(\PDO::ATTR_SERVER_VERSION) . ' (' . $db->pdo()->getAttribute(\PDO::ATTR_DRIVER_NAME) . ')',
            'Información del servidor' => $db->pdo()->getAttribute(\PDO::ATTR_SERVER_INFO),
            'Estado de la conección'   => $db->pdo()->getAttribute(\PDO::ATTR_CONNECTION_STATUS),
            'Timezone'                 => DEFAULT_TIMEZONE,
        ];
        return $arr;
    }
}
