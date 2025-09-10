# Planilla de Rendimiento Estadístico - Facultad de Odontología UNLP

Este proyecto proporciona una configuración de Docker lista para usar, con un servidor web **Apache** y un servicio **PHP-FPM**, configurados para conectarse a una base de datos **MariaDB/MySQL remota**.

## Requisitos

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Instalación y Uso

### Coloca tus archivos:

El directorio raíz del servidor web es `project/src/`. Coloca allí tu aplicación PHP.

### Configurar el entorno:

Copia el archivo de ejemplo `.env.example` a un nuevo archivo llamado `.env`.

```bash
cp .env.example .env
```

**Edita el archivo `.env`** y rellena las variables con los datos de tu base de datos remota y la configuración local que desees.

### Construir y levantar los contenedores:

Este comando construirá las imágenes y lanzará los servicios en segundo plano.

```bash
docker compose up -d --build
```

## Servicios

- **`apache`**: Servidor web basado en `httpd:2.4` que expone el puerto 80 (o el que definas en `.env`).
- **`php`**: Servicio PHP-FPM basado en `php:8.2-fpm` con la extensión `pdo_mysql` y `xdebug` instaladas.

## Gestión del Entorno

- **Detener los servicios:** `docker compose down`
- **Ver los logs:** `docker compose logs -f`
- **Acceder al contenedor de PHP:** `docker compose exec php bash`
