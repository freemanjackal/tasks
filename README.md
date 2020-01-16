<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling.

Laravel is accessible, powerful, and provides tools required for large, robust applications.


# About Tasks test project
The project uses Laravel, Jquery and bootstrap.
Jquery and bootstrap are being used from their respective CDN.

## Requirements
 - php 7
 - mysql or another database supported by Laravel
 - php composer to install dependencies

## Install, Configure

- Download the project in a local directory
- Run: composer install
- Configure in .env file the following fields:
	- DB_DATABASE, the name of a clean existing database that will be used by the project, right now it is configured as "tasks".
	- DB_USERNAME, by default it is root. IMPORTANT, note that if it is going to be used mysql, root has no access to localhost by default, so configure another database user or make the needed changes to use root as user.
	- DB_PASSWORD: The password of the configured user.
	If needed in case you use another DB different from MySql
	- DB_PORT

With the console in the working directory write 
 - php artisan migrate, to create tables in the database 

In order to save time it was created a seeder to populate the task table of the database, execute this command
 - php artisan db:seed --class=TaskTableSeeder

Finally to run php development server:
 - php artisan serve

	It may be be configured Nginx or apache server.
## Aditional features, not implemented
To get projects to which assign the tasks can be done through a one-to-many relationship between projects and tasks. In the case that a task could belong to many projects would be a many-to-many relationship.
