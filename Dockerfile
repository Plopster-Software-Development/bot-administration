FROM composer:2.7 AS vendor

WORKDIR /app

COPY composer.json composer.lock /app/

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

FROM php:8.2-fpm-alpine

RUN apk update && apk add --no-cache \
    curl \
    build-base \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql

COPY --from=vendor /app/vendor /var/www/html/vendor

COPY . /var/www/html

COPY nginx.conf /etc/nginx/nginx.conf

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

COPY ./supervisord.conf /etc/supervisord.conf

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
