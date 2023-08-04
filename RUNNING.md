# Run the portfolio builder locally

This Laravel 9 application offers five portfolio templates: Forma, Noir, Editorial, Studio, and Terminal. Users manage their profile, projects, skills, languages, interests, education, experience, services, and contact links. Admins manage users and template preview metadata.

## Current local setup

- URL: http://127.0.0.1:8000
- Database: `database/local.sqlite` (separate from the original MySQL database)
- Demo login: `demo@example.test` / `PortfolioDemo2026!`
- Register your own account at `/register`.
- Local email is written to `storage/logs/laravel.log`, including password-reset links. SMTP delivery is not configured.
- Preview your portfolio from the dashboard. The bundled renderers use template IDs 1–5; uploading a template preview does not install a new renderer.
- CV downloads are not implemented.

## Restart

Run from this project directory:

```powershell
php artisan serve --host=127.0.0.1 --port=8000
```

Leave that terminal running. A server is already running in the background; its output is in `storage/logs/local-server.out.log` and `storage/logs/local-server.err.log`.

## Fresh local database or optional demo

```powershell
php artisan migrate --seed
php artisan db:seed --class=LocalDemoSeeder
```

The demo seeder runs only in the local environment. Do not use its known credentials for a public deployment.

## Assets and tests

```powershell
npm.cmd run production
php artisan test
```

Tests use a separate in-memory SQLite database.

## Original settings

The original `.env` and the initially repaired source files were backed up under `storage/app/repair-backup-20261014`. The original MySQL database was not modified. To return to MySQL, restore or update the original database settings in `.env`, supply working credentials, and run `php artisan config:clear`.

Keep `database/local.sqlite` and `storage/app/public` when preserving local portfolio data and uploads. Use migrations without `migrate:fresh` to preserve existing data.
