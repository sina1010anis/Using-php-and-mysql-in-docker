FROM php:apache

WORKDIR /var/www/html

COPY . .

RUN docker-php-ext-install pdo_mysql

#CMD ["-p","8080:80"]

FROM mysql:latest

ENV MYSQL_DATABASE=php_docker
ENV MYSQL_PASSWORD=password
ENV MYSQL_ALLOW_EMPTY_PASSWORD=1
ENV MYSQL_ROOT_PASSWORD=password

#CMD ["-p","3306:3306"]

FROM phpmyadmin/phpmyadmin

ENV PMA_PORT=3306
ENV PMA_HOST=172.17.0.3

#CMD ["-p","8081:80"]
