FROM php:8.0.16-fpm

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

COPY . /var/www/html/

RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev \
        unzip \
		zip \
        git;

RUN apt-get update && apt-get install -y libpq-dev procps \
    && pecl install xdebug-3.1.2 \
    && docker-php-ext-install sockets bcmath pdo pdo_pgsql pgsql opcache \
    && docker-php-ext-enable xdebug;
