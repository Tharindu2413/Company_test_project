<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel Ecommerce Platform

This is a simple crud application  I made for parallax company Interview using Laravel ^10.4.1

| [Features][] | [Requirements][] | [Install][] | [How to setting][] | [License][] |


## Features 
- User Management Section (CRUD)
- Categories Management section (CRUD)
- Products Management section (CRUD) 

## Requirements

	PHP = ^8.1
    laravel-ui = ^4.2

## Install

Clone repo

```
git clone https://github.com/Tharindu2413/Company_test_project.git
```

Install Composer


[Download Composer](https://getcomposer.org/download/)


composer update/install 

```
composer install
```

Install Nodejs


[Download Node.js](https://nodejs.org/en/download/)


NPM dependencies
```
npm install
```

Using Laravel Mix 

```
npm run dev
```

## How to setting 


Go into MYSQL/ HEIDI SQL and create database "abc_test"
```
Go into .env file and change Database name

```
php artisan migrate
```

```
php artisan db:seed --class=PermissionTableSeeder
php artisan db:seed --class=CreateAdminUserSeeder
```
	
Generating a New Application Key
```
php artisan key:generate
```

Run the application 
```
php artisan serve
```