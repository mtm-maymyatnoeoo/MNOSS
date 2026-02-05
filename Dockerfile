# Use PHP 8.2 FPM
FROM php:8.2-fpm

# Install system dependencies, PostgreSQL extension, and build tools
RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    zip \
    unzip \
    curl \
    build-essential \
    && docker-php-ext-install pdo_pgsql

# Install Node 18 + npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && node -v \
    && npm -v

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy package.json and package-lock.json first (for caching)
COPY package*.json ./

# Install Node dev dependencies (needed for build)
RUN npm ci --legacy-peer-deps

# Copy the rest of the project
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Build frontend
ENV NODE_ENV=production
RUN npm run build

# Expose port
EXPOSE 8000

# Copy deploy script and make it executable
COPY deploy.sh /deploy.sh
RUN chmod +x /deploy.sh

# Start container
CMD ["/bin/sh", "-c", "/deploy.sh && php artisan serve --host=0.0.0.0 --port=8000"]
