### Laravel implementation of Bohemia Interactive assignment

This Laravel app is created by Pavel Zayats for Bohemia Interactive assignment
### How to run the API

Make sure you have PHP (^7.3|^8.0) and Composer installed globally on your computer.

Clone the repo and enter the project folder

```
git clone https://github.com/KYXT/bohemia-assignment.git
cd bohemia-assignment/
```

Install the app

```
cp .env.example .env
composer install
php artisan key:generate
php artisan l5-swagger:generate
php artisan migrate
php artisan passport:install
```

Configure your .env file, after that run the web server

```
php artisan serve
```

That's it. Now you can use the api. Link for documentation:

```
http://127.0.0.1:8000/api/doc
```