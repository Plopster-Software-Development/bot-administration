FROM php:8.2-apache

# Instala dependencias del sistema y extensiones de PHP
RUN apt-get update && apt-get install -y \
    git \
    zip \
    libpq-dev \
    openssl \
    libgmp-dev \
    libicu-dev \
    libc-client-dev \
    libkrb5-dev \
    && docker-php-ext-install gmp pdo pdo_pgsql pgsql intl \
    && docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-install imap

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Copia el contenido del proyecto
COPY . /var/www/html/
WORKDIR /var/www/html/

# Configura la zona horaria
ENV TZ="America/Bogota"

# Instala dependencias de Composer
RUN composer install --optimize-autoloader --no-dev

# Instala dependencias de npm (si es necesario)
RUN npm install --production

# Configura Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN chown -R www-data:www-data /var/www /var/www/html/storage

# Configura PHP
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" \
    && echo "extension=curl" >> "$PHP_INI_DIR/php.ini" \
    && echo "extension=fileinfo" >> "$PHP_INI_DIR/php.ini" \
    && echo "extension=gmp" >> "$PHP_INI_DIR/php.ini" \
    && echo "extension=mbstring" >> "$PHP_INI_DIR/php.ini" \
    && echo "extension=openssl" >> "$PHP_INI_DIR/php.ini" \
    && echo "extension=pdo_pgsql" >> "$PHP_INI_DIR/php.ini" \
    && echo "extension=pgsql" >> "$PHP_INI_DIR/php.ini" \
    && echo "extension=intl" >> "$PHP_INI_DIR/php.ini" \
    && echo "extension=imap" >> "$PHP_INI_DIR/php.ini" \
    && echo "extension=soap" >> "$PHP_INI_DIR/php.ini"

RUN a2enmod rewrite

EXPOSE 80