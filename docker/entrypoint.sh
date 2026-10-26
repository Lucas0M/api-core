#!/bin/sh
set -e
cd /var/www/html

# Cria o .env se não existir
[ -f .env ] || cp .env.example .env

# Instala dependências se necessário
if [ ! -f vendor/autoload.php ]; then
  composer install --no-interaction --prefer-dist
fi

# Permissões
mkdir -p storage/logs storage/framework/cache storage/framework/views bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# Migrations (o compose já espera o MySQL ficar saudável)
php artisan migrate --force

exec apache2-foreground