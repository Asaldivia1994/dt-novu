<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

# DT-Novu

## Requisitos previos

Antes de iniciar, asegúrate de tener instalado en tu máquina:

- [Docker Desktop](https://www.docker.com/products/docker-desktop/)

## Instalación y ejecución

Sigue los siguientes pasos para levantar el entorno de desarrollo:

1. **Levanta los contenedores:**

   ```bash
   docker compose up -d
   ```

2. **Instala las dependencias de PHP y Node.js:**

   ```bash
   docker compose exec app composer install
   docker compose exec app npm install
   ```

3. **Asigna permisos a las carpetas necesarias:**

   ```bash
   docker compose exec app chmod -R 777 storage bootstrap/cache
   ```

4. **Ejecuta las migraciones de base de datos:**

   ```bash
   docker compose exec app php artisan migrate
   ```

5. **Compila los assets del proyecto:**

   ```bash
   docker compose exec app npm run build
   ```

## Notas adicionales

- Todos los comandos deben ejecutarse desde la raíz del proyecto.
- Asegúrate de que los puertos necesarios estén libres antes de iniciar los contenedores.
- Si tienes configuraciones de entorno específicas, revisa y ajusta el archivo `.env` según tus necesidades.