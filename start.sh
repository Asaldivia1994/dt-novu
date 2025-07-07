#!/bin/bash
set -e

# Inicia PostgreSQL en background
pg_ctl -D $REPL_HOME/pgdata -l $REPL_HOME/pg.log start || true

# Espera a que PostgreSQL esté disponible
sleep 2

# Crea base de datos y usuario si no existen
psql -U postgres -tc "SELECT 1 FROM pg_database WHERE datname = 'laravel'" | grep -q 1 || psql -U postgres -c "CREATE DATABASE laravel;"
psql -U postgres -tc "SELECT 1 FROM pg_roles WHERE rolname = 'laravel'" | grep -q 1 || psql -U postgres -c "CREATE USER laravel WITH PASSWORD 'secret';"
psql -U postgres -c "GRANT ALL PRIVILEGES ON DATABASE laravel TO laravel;"

# Instala dependencias de PHP y Node si es necesario
[ -d vendor ] || composer install
[ -d node_modules ] || npm install

# Ejecuta migraciones
php artisan migrate --force || true

# Compila assets de Vite (puedes cambiar a npm run dev si lo prefieres)
npm run build

# Inicia servidor Laravel
php -S 0.0.0.0:3000 -t public