# Changelog

## [1.4.0]

- El framework ahora es totalmente compatible con PHP8
- Corregido un bug que devolvía error cuando intentaba agregar contenido a un archivo de log.
- Corregida la función que devolvía error, cuando no se encontgraba un adjunto al enviar un correo.
- Se eliminó la función `str_contains`, ahora presente en php8
- Se elimino `libxml_disable_entity_loader()` que [ya no es necesario](https://www.php.net/manual/es/function.libxml-disable-entity-loader.php) en php8.
- Se eliminaron las llamadas a `FILTER_SANITIZE_STRING` por estar en desuso y ser de dudosa eficacia. 

## [1.3.1]

- Actualizadoción de librerias para mejorar la transición a PHP 8
  - DomPDF 2.0
  - PHPMailer 6.6.5
  - GUMP 2.0
  - XLSXWriter 0.38

## [1.2.4]

- Se separo el código de inicialización de la aplicación en un archivo **Core.php** dentro de la carpeta _system_ para aislarla de la path de inicio.
- Se agregaron distintos estilos css que se pueden elegir como _themes_ dentro de la aplicación.

## [1.2.0]

- Actualizada la librería TimThumb a la versión 2.8.14
- Se agregó la clase Lang para el manejo de idiomas.
- Se agregó la libreria `qrcode.js` para generar códigos QR.
- Se agregó la opción de usar una tabla de la base de datos para el registro de eventos.
- Ahora los usuarios pueden elegir entre varios estilos CSS para mostrar la aplicación.

## [1.1.5]

- Corregidos algunos estilos para mejorar la visualización
- Se reordenaron las constantes para que sean más legibles.
- Se corrigieron algunos nombres de funciones para que sean más descriptivos.

## [1.1.0]

- Se eliminó la duplicidad de funciones entre roles y perfiles. Ahora las restricciones se manejan solamente a travéz de roles de usuario.
- Se movieron las capetas 'uploads' y 'logs' a la carpeta 'app' para que existan en el ámbito de la aplicacion y no del framework.
- Se agregaron nuevas constantes al framework para redefinir la estructura de carpetas.

---

Todos los cambios importantes en este proyecto se documentarán en este archivo.
El formato está basado en [Keep a Changelog](https://keepachangelog.com/en/1.0.0/) y se adhiere a [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

Los números de versión se incrementan de la siguiente manera:

- **Principal . Característica . Parche** _(por ej.: v1.1.5)_:
  - _Principal_ cuando realiza cambios de API incompatibles con versiones anteriores.
  - _Característica_ cuando agrega funcionalidad de manera compatible con versiones anteriores.
  - _Parche_ cuando realiza correcciones de errores compatibles con versiones anteriores.

Puede agregar además etiquetas adicionales para prelanzamiento y metadata de compilaciónpara, por ej.: **_1.1.0-beta+20210405_**
