# Base image
FROM php:8.2.4-fpm

# Install system dependencies
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

# Set working directory
WORKDIR /var/www

# Copy only Composer-related files first for caching
COPY composer.json composer.lock ./

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Clear Composer cache and install dependencies
RUN composer install --no-scripts --no-autoloader --prefer-dist --no-dev --optimize-autoloader \
    || (cat /var/www/composer.log && exit 1)

# Copy project files
COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Install Node.js and dependencies
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs

# Install npm dependencies and build assets
RUN npm install --legacy-peer-deps
RUN npm run build || echo "npm run build failed, check your configuration"

# Expose port
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
