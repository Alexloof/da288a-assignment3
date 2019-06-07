# da288a-assignment3

[![Build Status](https://dev.azure.com/ag8190/molnbutiken/_apis/build/status/Alexloof.da288a-assignment3?branchName=master)](https://dev.azure.com/ag8190/molnbutiken/_build/latest?definitionId=1&branchName=master)

### This project was built using XAMPP 7.3.5 and Composer 1.8.4

Open XAMPP and start the modules Apache and MySQL

Open a browser window and visit localhost/phpmyadmin/
Create a database called da_ass3 (or whatever you want to call it)
Create a .env file (or rename .env.example to .env)
Make sure the database name of the database you created matches the DB_DATABASE env.

Open a terminal and navigate to the project folder and run the following commands.

### Install dependencies

```
composer install
```

### Create the database tables and seed data

```
php artisan migrate:refresh --seed
```

### Start the application

```
php -S localhost:8000 -t public
```
