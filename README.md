# Fantasy Pool

Example Fantasy pool application for reality TV shows

## Requirements

- PHP >= 7.1.3
- MySQL

## Setup

Clone the repository

`git clone https://github.com/jacob-gardiner/fantasy-pool.git`

Switch to the repo folder

`cd fantasy-pool`

Copy env file then set credentials

`cp .env.example .env`

Install composer dependencies

`composer install`

Generate application key

`php artisan key:generate`

Install npm dependencies

`npm install`

Link storage

`php artisan storage:link`

Run migrations

`php artisan migrate`

Run seeders

`php artisan db:seed`

Build assets

`npm run watch`

Serve

`php artisan serve`

Login using the testing user

-   Email: admin@admin.com
-   Password: password

## License

Fantasy Pool is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
