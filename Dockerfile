FROM php:8.2-apache
RUN a2enmod rewrite
RUN apt-get update \
  && apt-get install -y sqlite3 libsqlite3-dev \
  && docker-php-ext-install pdo_sqlite \
  && rm -rf /var/lib/apt/lists/*
WORKDIR /var/www/html
RUN mkdir -p /var/www/data \
  && chown -R www-data:www-data /var/www/data \
  && chmod -R 775 /var/www/data