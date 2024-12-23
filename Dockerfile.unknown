FROM php:8.2.4-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql exif \
    && docker-php-ext-enable exif

WORKDIR /var/www

COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install --no-scripts --no-autoloader

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs

RUN npm install

RUN npm run build

EXPOSE 9000

CMD ["php-fpm"]
