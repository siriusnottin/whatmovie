# syntax=docker/dockerfile:1.4

FROM --platform=$BUILDPLATFORM php:8.4-apache as builder

WORKDIR /var/www/html

# Install PHP extensions
RUN docker-php-ext-install -j$(nproc) opcache pdo_mysql
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
COPY raw/php/php-dev.ini $PHP_INI_DIR/conf.d/99-app.ini

# Apache configuration
COPY raw/apache/errors /errors
COPY raw/apache/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY raw/apache/apache-dev.conf /etc/apache2/conf-available/app.conf

COPY --chown=www-data:www-data . /var/www/html

# Install Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get update && \
    apt-get install -y --no-install-recommends nodejs && \
    rm -rf /var/lib/apt/lists/* && \
    npm install --production

# Enable Apache modules and configuration
RUN a2enmod rewrite && \
    a2enconf app

# Copy database schema for initialization
COPY app/database/schema.sql /docker-entrypoint-initdb.d/

CMD ["apache2-foreground"]
