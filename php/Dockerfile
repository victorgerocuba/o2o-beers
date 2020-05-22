FROM  php:7.4-fpm

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev
    
RUN docker-php-ext-install mysqli pdo pdo_mysql zip

EXPOSE 9000