FROM php:apache
COPY ./src /var/www/html
RUN apt-get update && apt-get install -y libpq-dev
RUN docker-php-ext-install pdo pdo_pgsql