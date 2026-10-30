#!/bin/sh
# Runs every time the app container starts.
set -e

[ -f .env ] || cp .env.example .env

composer install --no-interaction --no-progress

# Telescope stays off here because its tables do not exist yet
grep -q '^APP_KEY=base64:' .env || TELESCOPE_ENABLED=false php artisan key:generate

# stock Laravel tables and the Telescope tables
php artisan migrate --force

exec php artisan serve --host=0.0.0.0 --port=8000
