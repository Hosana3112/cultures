#!/bin/bash
set -e

echo "🔄 Running migrations..."
php artisan migrate --force --isolated

echo "🌱 Running seeders..."
php artisan db:seed --force || echo "⚠️ Seeding failed (non-critical)"

echo "🔗 Creating storage link..."
php artisan storage:link 2>/dev/null || echo "Storage link already exists"

echo "✅ Application initialized successfully!"
echo "🚀 Starting Laravel server on 0.0.0.0:${PORT}"

# Start the server
exec php artisan serve --host=0.0.0.0 --port=${PORT} --no-reload