# Folio Studio

A personal portfolio builder made with Laravel 9, PHP, Blade, and Laravel Mix. Add your projects, skills, experience, and contact links, then choose from five designs: **Forma, Noir, Editorial, Studio, and Terminal**. Preview before switching; your content stays intact.

Includes account settings, image uploads, and an administrator area. Portfolio previews currently require login.

## Run locally

Requires PHP 8.1+ with PDO SQLite, Composer, and Node.js with npm.

```sh
git clone https://github.com/anonymnd/portfolio-dynamique.git
cd portfolio-dynamique
composer install
npm install
```

Copy `.env.example` to `.env` (`copy .env.example .env` on Windows, or `cp .env.example .env` on macOS/Linux), then run:

```sh
php -r "touch('database/database.sqlite');"
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
npm run production
php artisan serve --host=127.0.0.1 --port=8000
```

Open [localhost:8000](http://127.0.0.1:8000) and register an account. Keep the server terminal running. SQLite needs no separate database server. Local password-reset emails are written to `storage/logs/laravel.log`.

Optional local demo: run `php artisan db:seed --class=LocalDemoSeeder`, then sign in with `demo@example.test` / `PortfolioDemo2026!`. Use these credentials only locally.

## Development

```sh
npm run watch
php artisan test
```

Tests use an isolated in-memory SQLite database. Keep `.env`, databases, uploads, and logs out of Git. Back up your database and `storage/app/public` to preserve portfolio data.
