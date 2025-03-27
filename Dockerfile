# syntax=docker/dockerfile:1

FROM --platform=$BUILDPLATFORM php:8.4-apache

RUN mv /var/www/html /var/www/app
COPY app /var/www/app

COPY config/php/php-dev.ini /usr/local/etc/php/conf.d/dev.ini

COPY config/apache/dev.conf /etc/apache2/conf-enabled/00-dev.conf

# Set Apache DocumentRoot
ENV APACHE_DOCUMENT_ROOT /var/www/app/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' ${APACHE_CONFDIR}/sites-available/*.conf
RUN sed -ri -e 's!/var/www!${APACHE_DOCUMENT_ROOT}!g' ${APACHE_CONFDIR}/apache2.conf ${APACHE_CONFDIR}/conf-available/*.conf

RUN docker-php-ext-install pdo pdo_mysql

RUN a2enmod rewrite

ENV TZ Europe/Paris
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && \
  echo $TZ > /etc/timezone

WORKDIR /var/www/app

CMD ["apache2-foreground"]
