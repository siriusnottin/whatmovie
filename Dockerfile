# syntax=docker/dockerfile:1

FROM --platform=$BUILDPLATFORM php:8.4-apache AS build

ENV APACHE_DOCUMENT_ROOT /var/www/html
WORKDIR ${APACHE_DOCUMENT_ROOT}

# Update Apache configuration to use the new DocumentRoot
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' ${APACHE_CONFDIR}/sites-available/*.conf
RUN sed -ri -e 's!/var/www!${APACHE_DOCUMENT_ROOT}!g' ${APACHE_CONFDIR}/apache2.conf ${APACHE_CONFDIR}/conf-available/*.conf

# Copy configuration files
COPY configs/php/php-dev.ini /usr/local/etc/php/conf.d/dev.ini
COPY configs/apache/dev.conf /etc/apache2/conf-enabled/00-dev.conf

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set timezone
ENV TZ Europe/Paris
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && \
  echo $TZ > /etc/timezone

# Install required packages and Node.js
RUN apt-get update && apt-get install -y curl
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - && \
  apt-get update && \
  apt-get install -y nodejs

# Install Node.js dependencies
WORKDIR /var/www/html/vite
RUN npm install --no-audit --prefer-offline

# Start both npm and Apache processes
CMD ["sh", "-c", "npm run dev & exec apache2-foreground"]
