## About Empaz

Empaz project was built in Laravel 5.4

## Configuring Project

### TL;DR

```sh
  git clone git@github.com:santimendoza/empaz.git
  composer install
  php artisan migrate
  php artisan db:seed
  php artisan serve
```

And then go to `localhost:8000`.

### Step by step

- You need MySQL, php >= 7.0, composer, and the corresponding php extensions needed by [Laravel](http://laravel.com/docs/5.4).
- Then clone the project.
- Install dependencies by running `composer install` in the root of the project.
- Configure the environment variables in the `.env` file (see `.env.example` file for more info).
- After creating and empty database with the name specified in the `.env` file, run `php artisan migrate` to create the MySQL Tables.
- If you want some example data, you can run `php artisan db:seed`.
- After all, you can run `php artisan serve` and go to `localhost:8000` to start seeing the project.
