FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git curl zip unzip libldap2-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql ldap

WORKDIR /var/www/html

COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install --no-dev --optimize-autoloader
