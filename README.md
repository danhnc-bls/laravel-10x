<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel v10.18.0

### Technology
1. Laravel v10.18.0 (PHP v8.1.13)
2. Bootstrap v5.3.1 (https://getbootstrap.com/)
3. Icons Bootstrap v1.11.0 (https://icons.getbootstrap.com/)

### SETUP PROJECT
- Step 1: Run command line to install vendor
    ```
    composer install
    ```
- Step 2: Run command line to generate key
    ```
    php artisan key:generate
    ```
- Step 3: Run command line to jwt secret key
    ```
    php artisan jwt:secret
    ```
- Step 4: Run command line to run migrate to create DB
    ```
    php artisan migrate --force
    ```
- Step 5: Run command line to add default DB
    ```
    php artisan db:seed
    ```
- Step 6: Run command line to add storage link
    ```
    php artisan storage:link
    ```
- Step 7: Run command line to install npm dependencies
    ```
    npm install
    ```
- Step 8: Run command line to npm
    ```
    npm run build
    ```
    OR
    ```
    npm run dev
    ```

### Login
Username: user1@gmail.com  
Password: 12345678