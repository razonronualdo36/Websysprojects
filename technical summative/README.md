# Tasks for Today Management System — TSA2

Based on the original TSA1 project from Websysprojects-main.zip. Keeps the original landing page at `/` and Today's Tasks at `/welcome`.

## Requirements
- PHP 8.2+ and MySQL/MariaDB
- Composer (framework dependencies are NOT in this repository)

## Local setup
1. In the project root, run `composer install` to create `vendor/`.
2. Copy `.env.example` to `.env`. Configure database connection and base URL for your environment.
3. In phpMyAdmin, **select the `task_management` database** first, then use Import:
   - Existing TSA1 database: run `database/upgrade_TSA1_to_TSA2.sql` in its SQL tab **once**. Do not reimport the fresh SQL over your existing data.
   - New empty database: import `database/task_management_TSA2_fresh.sql`.
4. Run `php setup-password.php ronualdo` in a local terminal. Choose a unique 12+ character password. Copy the printed UPDATE SQL into phpMyAdmin's SQL tab for the correct database. Do not commit credentials.
5. Run `php spark serve`, visit http://localhost:8080/ and log in at `/login`.

## Routes
- Public GET: `/`, `/welcome`, `/tasks`, `/profile`, `/about`, `/login`
- Protected GET: `/tasks/new`, `/tasks/{id}/edit`
- Protected POST: `/tasks` (create), `/tasks/{id}/update`, `/tasks/{id}/archive`, `/logout`

## Security
Passwords use PHP `password_hash` and `password_verify`. Management routes use an auth filter, and all mutation routes use POST and CSRF tokens. Tasks are archived via `is_archived=1`; public listings exclude them. Use production environment and a strong password when deployed. Do not expose `.env` or place `app/`, `vendor/`, or `writable/` under a public web directory when possible.

## InfinityFree
For an existing hosted TSA1 installation, back up files and database first. Update app files, then run upgrade SQL against the hosted database (only if columns do not already exist). Keep the existing hosting-specific `.env` and working `.htaccess`. Install Composer dependencies locally and upload `vendor/` if the host does not run Composer. The secure recommended structure has `app/`, `vendor/`, and `writable/` outside public `htdocs`, with the **contents** of `public/` inside `htdocs`; adjust `index.php` paths accordingly. Never publish your `.env` or SQL backups.

## Verification
Test logged-out GET `/tasks/new` redirects to `/login`, successful login, create/update/archive, archived rows disappear from `/welcome` and `/tasks`, and logout. No live database or InfinityFree tests were performed in this package environment.
