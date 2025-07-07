FROM php:8.3-apache

# Instala dependencias del sistema y libpq-dev para PostgreSQL
RUN apt-get update && apt-get install -y \
    git zip unzip curl libpq-dev

# Instala extensiones de PostgreSQL para PHP
RUN docker-php-ext-install pdo pdo_pgsql pgsql

# Instala Node.js y npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Instala Composer (última versión 2.x)
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Configura el DocumentRoot para Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

# Habilita mod_rewrite para Laravel
RUN a2enmod rewrite

WORKDIR /var/www/html

EXPOSE 80