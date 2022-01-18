# courses-app

Simple Courses Application with Laravel

## To Run The Application

### 1.Make Clone

```
git clone https://github.com/Elsayed93/courses-app.git
```

### 2.Install Composer Dependencies

```
composer install
```

### 3.Create a copy of your .env file

```
cp .env.example .env
```

### 4.Generate an app encryption key

```
php artisan key:generate
```

### 5.Create an empty database for our application

### 6.In the .env file, add database information to allow Laravel to connect to the database

<p>
    We will want to allow Laravel to connect to the database that you just created in the previous step. To do this, we must add the connection credentials in the .env file and Laravel will handle the connection from there.

In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created. This will allow us to run migrations and seed the database in the next step.

</p>

### 7.Migrate the database

```
php artisan migrate
```

### 8.[Optional]: Seed the database

```
php artisan db:seed
```

<p>
If you did step numer 9 , you don't need to register to login to the application.
You can login to the application using the following credentials:

email:    admin@example.com <br>
password: 123456789

</p>
