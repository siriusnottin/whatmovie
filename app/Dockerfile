# syntax=docker/dockerfile:1.4

FROM --platform=$BUILDPLATFORM php:8.4-apache as builder

WORKDIR /var/www/html

RUN docker-php-ext-install -j$(nproc) opcache pdo_mysql
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
COPY raw/php/php-dev.ini $PHP_INI_DIR/conf.d/99-app.ini

# Apache
COPY raw/apache/errors /errors
COPY raw/apache/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY raw/apache/apache-dev.conf /etc/apache2/conf-available/app.conf

COPY . /var/www/html

# Install nodejs and npm
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get update && \
    apt-get install -y --no-install-recommends nodejs && \
    rm -rf /var/lib/apt/lists/* && \
    npm install

RUN a2enmod rewrite && \
    a2enconf app

CMD ["apache2-foreground"]
