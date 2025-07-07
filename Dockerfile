FROM php:8.3-apache

# Instala dependencias del sistema y PostgreSQL
RUN apt-get update && apt-get install -y \
    git zip unzip curl libpq-dev \
    libpng-dev libonig-dev libxml2-dev \
    npm nodejs

# Instala extensiones necesarias
RUN docker-php-ext-install pdo pdo_pgsql pgsql

# Instala Node.js (v20) y npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Instala Composer (versión 2.x)
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Configura Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN a2enmod rewrite

WORKDIR /var/www/html

EXPOSE 80