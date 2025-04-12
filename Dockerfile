FROM php:8.2-cli

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libonig-dev libxml2-dev \
    zip unzip curl git nano libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Set file permissions
RUN chmod -R 775 storage bootstrap/cache

# Environment & Laravel setup
# NOTE: Jangan buat .env baru karena Railway inject dari dashboard
RUN php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear

# Laravel serve
EXPOSE 80
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
