#!/bin/bash

echo "🔧 Running Laravel setup..."
composer install --no-dev --optimize-autoloader
if [ ! -f .env ]; then
  cp .env.production .env
fi
php artisan key:generate
php artisan config:cache
php artisan route:cache
php artisan view:cache
chmod -R 775 storage bootstrap/cache

echo "🚀 Starting Laravel on port ${PORT:-8080}..."
php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
