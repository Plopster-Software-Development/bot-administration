FROM php:8.2-apache

RUN apt-get update && apt-get install -y git zip libpq-dev openssl libgmp-dev libicu-dev libc-client-dev libkrb5-dev
RUN docker-php-ext-install gmp pdo pdo_pgsql pgsql intl

RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl
RUN docker-php-ext-install imap

### COPY CONTENT ###
COPY . /var/www/html/
WORKDIR /var/www/html/

### TIME ZONE ###
ENV TZ="America/Bogota"

ENV COMPOSER_ALLOW_SUPERUSER=1
COPY --from=composer /usr/bin/composer /usr/bin/composer

# RUN composer install
RUN composer install --optimize-autoloader --no-dev
RUN composer dump-autoload -o

### APACHE SET ROOT PATH ###
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN chown -R www-data:www-data /var/www /var/www/html/storage

### PHP SETUP ###
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN echo "extension=curl" > "$PHP_INI_DIR/php.ini"
RUN echo "extension=fileinfo" > "$PHP_INI_DIR/php.ini"
RUN echo "extension=gmp" > "$PHP_INI_DIR/php.ini"
RUN echo "extension=mbstring" > "$PHP_INI_DIR/php.ini"
RUN echo "extension=openssl" > "$PHP_INI_DIR/php.ini"
RUN echo "extension=pdo_pgsql" > "$PHP_INI_DIR/php.ini"
RUN echo "extension=pgsql" > "$PHP_INI_DIR/php.ini"
RUN echo "extension=intl" > "$PHP_INI_DIR/php.ini"
RUN echo "extension=imap" > "$PHP_INI_DIR/php.ini"
RUN echo "extension=soap" > "$PHP_INI_DIR/php.ini"

RUN a2enmod rewrite
RUN service apache2 restart

EXPOSE 80