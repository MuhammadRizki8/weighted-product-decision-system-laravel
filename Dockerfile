# PHP 8.2 with Apache
FROM php:8.2-apache

# System dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Node.js 20 for Vite build
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Composer (from official image)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# App working directory
WORKDIR /var/www/html

# Copy application source
COPY . .

# Install PHP and build frontend assets
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# Permissions for storage and cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Apache DocumentRoot -> public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Enable URL rewriting
RUN a2enmod rewrite

# Runtime: cache config, migrate, then start Apache
CMD php artisan config:cache && php artisan migrate --force && apache2-foreground
