#!/usr/bin/env bash
set -euo pipefail

# Ensure dependencies
composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader || true

# Generate APP_KEY if not set
php artisan key:generate --no-interaction || true

# Cache config/routes/views for performance
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Run migrations
php artisan migrate --force || true

# Ensure storage symlink exists
php artisan storage:link || true

# Build frontend assets if Node is available
if command -v npm >/dev/null 2>&1; then
  npm ci || npm install
  npm run build || true
fi

# Start PHP server bound to Railway $PORT
PORT=${PORT:-3000}
php -S 0.0.0.0:${PORT} -t public
