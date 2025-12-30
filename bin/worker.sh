#!/usr/bin/env bash
set -euo pipefail

# Ensure dependencies
composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader || true

# Run migrations (safe to ensure tables exist)
php artisan migrate --force || true

# Start the queue worker
php artisan queue:work --sleep=3 --tries=3
