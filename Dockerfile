FROM wordpress:php8.2-apache

RUN apt-get update && apt-get install -y \
    sqlite3 \
    libsqlite3-dev

RUN docker-php-ext-install mysqli pdo pdo_sqlite

COPY . /var/www/html/

RUN mkdir -p /var/www/html/wp-content/database

EXPOSE 80