# da288a-assignment3

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
php artisan migrate
php artisan db:seed
```

### Start the application

```
cd public
php -S localhost:8000 -t public
```
