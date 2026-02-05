#!/bin/bash

# Run Laravel migrations and seeders
php artisan migrate --force
php artisan db:seed --force

# Clear and cache configs/routes/views
php artisan config:cache
php artisan route:cache
php artisan view:cache
