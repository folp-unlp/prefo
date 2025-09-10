# Stage 1: Build stage with dev dependencies
FROM php:8.2-fpm AS build

# Instalar dependencias para compilar extensiones y Composer
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libmariadb-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensiones de PHP comunes
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


# Stage 2: Final production stage
FROM php:8.2-fpm

# Argumentos que se pueden pasar durante la construcción
ARG TIMEZONE

# Copiar extensiones compiladas y binarios esenciales desde la etapa 'build'
COPY --from=build /usr/local/lib/php/extensions/ /usr/local/lib/php/extensions/
COPY --from=build /usr/bin/composer /usr/bin/composer

# Instalar solo las dependencias de sistema necesarias en tiempo de ejecución
RUN apt-get update && apt-get install -y libmariadb-dev libzip-dev libpng-dev \
    && rm -rf /var/lib/apt/lists/*

# Habilitar las extensiones copiadas
RUN docker-php-ext-enable pdo pdo_mysql zip gd

# Instalar y habilitar Xdebug (solo para entornos de desarrollo)
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Copiar configuraciones personalizadas de PHP y Xdebug
COPY php.ini /usr/local/etc/php/conf.d/custom-php.ini
COPY xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Configurar la zona horaria
RUN ln -snf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime && echo ${TIMEZONE} > /etc/timezone

# Crear un usuario no-root para seguridad
RUN useradd -ms /bin/bash -u 1000 www
USER www

# Establecer el directorio de trabajo
WORKDIR /var/www/html













