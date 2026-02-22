FROM php:8.2-apache

RUN apt-get update \
 && apt-get install -y --no-install-recommends libsqlite3-dev sqlite3 \
 && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_sqlite
RUN a2enmod rewrite
RUN mkdir -p /var/www/html/data \
 && chown -R www-data:www-data /var/www/html/data