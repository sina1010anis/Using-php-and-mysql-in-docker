FROM php:apache

WORKDIR /var/www/html

COPY . .

RUN docker-php-ext-install pdo_mysql

