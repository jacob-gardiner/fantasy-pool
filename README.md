## Setup

Clone the repository

`git clone git@bitbucket.org:Pempdisimo/fantasy-pool.git`

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
