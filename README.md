# Subscriber Lite

## Set up instructions

First install dependencies
```
composer install && npm install
```

**Database**

Fill out the following ENV variables with your database info:

```dotenv
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Run migrations

```
php artisan migrate
```

Seed initial data

```
php artisan db:seed
```

**Tests**

Set up a database called subscriber-lite_test, this is the database we'll use for tests.

Run 
```
phpunit
```

or

```
/vendor/bin/phpunit
```

**Viewing the UI**

Using `php artisan serve`:

1. `npm run production` to generate the css and js assets
2. php artisan serve
3. visit localhost:8000

Using laravel homestead:

Add a new site to homestead as outlined [here.](https://laravel.com/docs/6.x/homestead#adding-additional-sites)

You can also use `npm run watch`, just make sure to set the `APP_URL` env variable to the correct url so browserSync can proxy it.