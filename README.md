# Entorno de Desarrollo Docker (Apache + PHP)

Este proyecto proporciona una configuración de Docker lista para usar, ideal para el desarrollo de aplicaciones PHP. Incluye un servidor web **Apache** y un servicio **PHP-FPM**, configurados para conectarse a una base de datos **MariaDB/MySQL remota**.

## Requisitos

*   [Docker](https://www.docker.com/get-started)
*   [Docker Compose](https://docs.docker.com/compose/install/)

## Instalación y Uso

1.  **Clonar el repositorio:**
    ```bash
    git clone https://github.com/ctrbts/docker_lamp_init.git
    cd docker_lamp_init
    ```

2.  **Configurar el entorno:**
    Copia el archivo de ejemplo `.env.example` a un nuevo archivo llamado `.env`.
    ```bash
    cp .env.example .env
    ```
    **Edita el archivo `.env`** y rellena las variables con los datos de tu base de datos remota y la configuración local que desees.

3.  **Construir y levantar los contenedores:**
    Este comando construirá las imágenes y lanzará los servicios en segundo plano.
    ```bash
    docker compose up -d --build
    ```

4.  **Coloca tus archivos:**
    El directorio raíz del servidor web es `project/var/www/`. Coloca allí tu aplicación PHP.

5.  **Verificar la conexión a la base de datos:**
    Abre tu navegador y visita [http://localhost/test_db.php](http://localhost/test_db.php) (o el puerto que hayas configurado en `APACHE_PORT`). Esta página te indicará si la conexión con tu base de datos remota ha sido exitosa.

## Servicios

*   **`apache`**: Servidor web basado en `httpd:2.4` que expone el puerto 80 (o el que definas en `.env`).
*   **`php`**: Servicio PHP-FPM basado en `php:8.2-fpm` con la extensión `pdo_mysql` y `xdebug` instaladas.

## Gestión del Entorno

*   **Detener los servicios:** `docker compose down`
*   **Ver los logs:** `docker compose logs -f`
*   **Acceder al contenedor de PHP:** `docker compose exec php bash`
