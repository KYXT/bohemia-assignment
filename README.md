# Laravel implementation of Bohemia Interactive assignment

This Laravel app is created by Pavel Zayats for Bohemia Interactive assignment
# How to run the API

Make sure you have PHP (^7.3|^8.0) and Composer installed globally on your computer.

### Clone the repo and enter the project folder

```
git clone https://github.com/KYXT/bohemia-assignment.git
cd bohemia-assignment/
```

### Environment configuration

Configure your .env file. Don't forget to change default data in .env

```
cp .env.example .env
```

### Install the app

```
composer install
php artisan key:generate
php artisan l5-swagger:generate
php artisan migrate
php artisan passport:install
```

### Start server

Run the web server

```
cp .env.example .env
php artisan serve
```

### Using

That's it. Now you can use the api. Link for documentation:

```
{{domain}}/api/doc
```

If you want to use postman, import collection file from this folder:
```
postman/Bohemia assignment.postman_collection
```

# Fake data
To create fake data for testing you can use
```
php artisan db:seed
```

### User credentials
```
userSurnameuse
useruser
```

### Moderator credentials
```
moderSurnamemod
modermoder
```

### Admin credentials
```
adminSurnameadm
adminadmin
```

# Unit tests
After installing an application, execute
```
php artisan test
```
command to run tests.