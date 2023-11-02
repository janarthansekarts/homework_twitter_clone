<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Homework Twitter Sample 

Prerequisites:

Make sure you have Composer installed on your local machine.
Ensure you have PHP and a web server (e.g., Apache or Nginx) set up.
You may need a database server like MySQL or SQLite, depending on the project's requirements.
Open a Terminal or Command Prompt:

Navigate to the directory where you want to store your local copy of the Laravel project.
Clone the Repository:

* Use the git clone command to clone the project's Git repository. Replace <repository_url> with the actual URL of the Git repository:

git clone <repository_url>

* Change Directory:

Move into the project directory:

cd <project_directory>

* Install Composer Dependencies:

Run the following command to install the project's dependencies using Composer:

composer install

* Copy the Environment File:

Laravel uses a .env file for environment-specific configuration. You should copy the .env.example file to create your own .env file:

cp .env.example .env


* Generate an Application Key:

Run the following command to generate a unique application key for your Laravel project. This key is used for encrypting session and other data:

php artisan key:generate


* Configure the .env File:

Open the .env file and configure it with your database and other environment-specific settings.

* Migrate the Database:

Run the database migrations to create the necessary tables in your database:

php artisan migrate

or

php artisan migrate --seed 


--seed loads the Factory Seeders Data along with the Migration Tables.



* Start the Development Server:

You can use the built-in development server provided by Laravel to run your application. Run the following command:
bash
Copy code
php artisan serve



* File System Symbolic Link

By default, the public disk in laravel `config/filesystems.php` uses the local driver and stores its files in `storage/app/public`.

To make these files accessible from the web, you should create a symbolic link from `public/storage` to `storage/app/public`. Utilizing this folder convention will keep your publicly accessible files in one directory that can be easily shared across deployments when using zero down-time deployment systems like Envoyer.

To create the symbolic link, you may use the storage:link Artisan command:

php artisan storage:link

