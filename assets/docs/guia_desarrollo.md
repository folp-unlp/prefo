# Guía de desarrollo

(en contrucción)

## Contenido

- [Constantes globales](#constantes-globales)
- [Renderizando las vistas](#renderizando-las-vistas)
- [Funciones auxiliares](#funciones-auxiliares)
- [Configuración PHPMailer](#configuración-phpmailer)

## Constantes globales

- USER_ID: Devuelve el ID del usuario que inició sesión

- USER_NAME: Devuelve el nombre del usuario que inició sesión

- USER_PHOTO: Devuelve la foto del usuario que inició sesión

- USER_EMAIL: Devuelve el correo electrónico del usuario que inició sesión

- USER_ROLE: Devuelve el rol del usuario que inició sesión

- SITE_NAME: Devuleve el nombre del sitio

- SITE_ADDR: Dirección del sitio. Ej.: http://localhost/pulpa_framework/

- SITE_LOGO: Devuelve el path del logo del sitio. Ej.: http://localhost/pulpa_framework/assets/images/logo.png

- SITE_FAVICON: Devuelve el path del favicon del sitio. Ej.: http://localhost/pulpa_framework/assets/images/favicon.png

## Renderizando las vistas

```php
$this->render_page($page_path , $view_path=null);
```

Renderiza una página como una subpágina de contenido dentro de un marco (partials dentro de layouts). Los datos del modelo se transfieren a la vista automáticamente a travéz del controlador

Ejemplo:

```php
<div class="panel panel-body">
  //Renderiza una plantilla con un marco diferente
  $this->render_page('users/list' , 'report_layout.php');
  //Renderiza una plantilla con el marco por defecto
  $this->render_page('user/list');
</div>
```

```php
$this->load_view($view_path,$args=null);
```

Se puede usar para representar diferentes vistas al mismo tiempo en un marco. No se pasan datos del modelo, pero se puede acceder a los datos del modelo de la vista principal

Ejemplo:

```php
<div class="panel panel-body">
  <?php $this->load_view('users/list.php'); ?">
</div>
```

**Html::page_header();** Renderiza el encabezado de la página

**Html::page_footer();** Renderiza el pie de página

**Html::render_menu($arrMenu,$menu_class='nav navbar-nav');** Contruye y renderiza el menú de la página desde una lista de items

**Html::display_form_errors();** Renderiza los errores de un formulario, específicamente los errores de validación

**Html::export_component();** Renderiza la página de de componentes button

**Html::page_img($imgsrc,$resizewidth=null,$resizeheight=null,$link=null,$class=null,$attrs=null);** Muestra la etiqueta image de una página. Puede ser usada para mostrar multiples imágenes separadas por coma. También puede ser usada para redimensionar las imágenes via url.

## Funciones auxiliares

### users

- `get_active_user($field=null)` Get Logged In User Details From The Session. Get particular field value of the active user otherwise return array of active user fields. Return Value Type: array | string. echo get_active_user('user_city');

- `user_login_status()` Check if there is active User Logged In. Return Value Type: boolean

- `authenticate_user()` Authenticate And Check User Page Access Eligibility. Return Value Type: Redirect to Login Page Or Displays Error Message When user access control authorization Fails

### utils

- `is_mobile()` Check if current browser platform is a mobile browser. Can Be Used to Switch Layouts and Views on A Mobile Platform. Return Value Type: boolean

- `print_link($path=null)` Echo Absolute Url Address of a path. Example : <a href="<?php print_link('users/add'); ?>">Add Users</a>

- `set_url($path=null)` Return Absolute Url Address of a path

- `set_img_src($imgsrc,$width=null,$height=null)` Convinient Function To Resize Image Via Url of the Image Src if the src is from the same origin then image can be resize. Example : <img src="<?php echo set_img_src('app/uploads/img/89njdh4533.jpg',50,50); ?>" />;

### date and time functions

- `datetime_now()` will return current DateTime in Mysql Default Date Time Format (Y-m-d H:i:s). Example : 2017-02-13 03:15:00

- `time_now()` will return current Time in Mysql Default Date Time Format (H:i:s). Example : 03:15:00

- `date_now()` will return current Date in Mysql Default Date Time Format (Y-m-d). Example: 2017-02-13

- `relative_time($date=null)` Parse Date Or Timestamp Object into Relative Time. Example : 2 days ago 2 days from now

- `human_date($date=null)` Parse Date Or Timestamp Object into Human Readable Date. Example : 26th of March 2016

- `human_datetime($date=null)` Parse Date Or Timestamp Object into Human Readable Date. Example : 26th of March 2016 02:30 pm

### randomize

- `random_chars($limit=12,$context='...')` Generate a Random String and characters From Set Of supplied data context. Example : f#8Gt4!a@hdt

- `random_str($limit=12,$context='...')` Generate a Random String From Set Of supplied data context. Example : Ga89KJ67adf4

- `random_num($limit=6,$context='1234567890')` Generate a Random Number From Set Of Supplied Numbers. Example : 681423

- `random_color($alpha=1)` Generate a Random color String. Example : rgba(230,12,9,0.5)

### show message

- `set_flash_msg($msg,$type="success",$dismissable=true,$showduration=5000)` Set Msg that Will be Display to User in a Session. Can Be Displayed on Any View.

- `show_flash_msg()` Display The Message Set In MsgFlash Session On Any Page. Will Clear The Message Afterwards

### rediect to

- `redirect_to_page($path=null)` Convinient Function To Redirect to Another Page. Example : redirect_to_page("users/view/".USER_ID); Should not be use in view pages. Only in Controller page

- `redirect_to_action($action_name=null)` Convinient Function To Redirect to Page Action. Example redirect_to_action('add'); Should not be use in view pages. Only in Controller page

- `redirect($url)` Convinient Function To Redirect to External URL. Should not be use in view pages. Only in Controller page

### cast data types

- `approximate($val, $decimal_points=2)` Approximate to nearest decimal points. Example 3784.7466477 » 3784.75

- `to_currency($val, $lang = 'en-US')` Format string to country currency. Example 5000 » $5,000

- `to_number($val, $lang = 'en-US')` return a numerical representation of the string grouped in different units. Example 247704360 » 247,704,360

- `str_truncate($string, $length=50, $ellipse= '...')` Trucate string. Example This is an example of long string » This is an ex ..

- `number_to_words($val,$lang="en")` Convert numerical value to word representation. Example 247704360 » two hundred forty-seven million seven hundred four thousand three hundred sixty

### cookies

- `set_cookie($name,$value,$days=30)` Set a browser cookie

- `get_cookie($name)` Return a cookie value

- `clear_cookie($name)` Delete a cookie

### http

- `http_post($name)` Convenient function to retrieve content of from external Url Using CURL POST Request

- `http_get($name,$params=array())` Convenient function to retrieve content of from external Url Using CURL GET Request

## Configuración PHPMailer

### Configurar una cuenta de gmail para envío SMTP

#### Ir a

1. **Administrar tu cuenta de Google**
2. Pestaña **Seguridad**
3. Tarjeta **Acceso a Google**
4. Item **Contraseña de aplicaciones**
   - En **Seleccionar app** > _Correo electrónico_
   - En **Seleccionar dispositivo** > _Computadora con Windows_
   - Click en **Generar**

> La contraseña generada es la password del usuario SMTP del correo.


Changing the "cache" directory permission to 777
Deleting index.html file in the "cache" directory