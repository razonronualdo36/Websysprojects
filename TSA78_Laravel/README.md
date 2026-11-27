# TSA4 Tasks for Today

This is a SEPARATE copy built from the supplied Laravel 12 POS skeleton. Earlier TSA3 source was not provided. Task fields are title, description, due date, priority, status, and is_archived. Original POS files remain but are not routed.

## Required first-run setup on Windows

PHP 8.2+, Composer, Node.js/npm and MySQL are required. Extract to a NEW folder, not over your existing project.

1. Start XAMPP Apache/MySQL. Create an EMPTY database named tsa4_tasks.
2. Copy .env.example to .env. Set DB_CONNECTION=mysql, DB_HOST=127.0.0.1, DB_PORT=3306, DB_DATABASE=tsa4_tasks, DB_USERNAME=root, DB_PASSWORD= (or your real password). Uncomment the DB lines as needed.
3. Set SESSION_DRIVER=file, CACHE_STORE=file, QUEUE_CONNECTION=sync, MAIL_MAILER=log, MAIL_FROM_ADDRESS=tasks@example.com, MAIL_FROM_NAME="Tasks for Today", TASK_NOTIFICATION_RECIPIENT=teacher@example.com.
4. In PowerShell in this folder: `powershell -ExecutionPolicy Bypass -File .\SETUP-TSA4.ps1`
5. Once successful run `php artisan serve`. Visit http://127.0.0.1:8000 and REGISTER your own account. There are no preset credentials.

Setup installs the official Laravel Breeze Blade stack, restores task routes after scaffolding, builds assets, runs migrations/seeders (without dropping tables), and runs TaskWorkflowTest. Composer updates the original skeleton lockfile when installing Breeze. Commit those updated composer files and generated Breeze auth files after setup. No npm dev server is necessary after the build.

IMPORTANT: PHP/Composer were unavailable during authoring and package downloads were blocked. Breeze installation and runtime tests must be completed on your PC using this script. This ZIP is source plus a first-run installer, not a preinstalled/verified application. If a command fails, stop and fix that error. Do not run the setup on a live deployment: it regenerates APP_KEY. The uploaded private .env, logs, vendor and caches are excluded.

## Features and checks

Welcome /, Tasks /tasks, Profile /profile, About /about are public. Profile is a public project page, not the private Breeze account editor. Creating, editing, and archiving require login on the server, not just hidden buttons. Any logged-in user manages the shared classroom task list.

Required fields: title (max 150), due_date (YYYY-MM-DD), priority (low/medium/high), status (pending/in_progress/done). Description optional/max 5000. Forms use CSRF, method spoofing, escaped output, error summaries, old input. Archive sets is_archived=true without deleting rows; archived tasks cannot be edited.

On UPDATE from non-done to done, TaskCompleted Mailable sends to config/tasks.php's recipient. Updating an already-done task does not resend. Reopening then completing is a new transition. Creating an initially-done task does not send. Row locking serializes updates. Mail is sent after commit; failures preserve the task and display a warning, with an error log. No automatic retry/outbox is implemented.

Run `php artisan test --filter=TaskWorkflowTest` (PDO SQLite required for in-memory tests). Tests cover public pages, guest access restrictions, required validation, create/edit/update/archive, recipient, and no duplicate already-done email. These tests have NOT been executed in the authoring environment.

Manual checks: browse as guest; register/login; create a task; edit pending to done; check storage/logs/laravel.log for `Task completed:` and recipient. Update the title while keeping done; confirm no second mail entry. Archive and confirm the database row remains. Five pending sample tasks are seeded. Test invalid forms and logout.

## Hosting and submission

Not deployed by this ZIP. Use a Laravel-capable PHP 8.2+ host with document root public/. Install dependencies, build assets (npm ci then npm run build), configure private production .env with hosted database credentials, APP_ENV=production, APP_DEBUG=false, APP_URL with real HTTPS domain and a unique APP_KEY. Make storage/bootstrap/cache writable. Run php artisan migrate --force. Seed only when appropriate. NEVER migrate:fresh on a live database. Use log mail or safe test SMTP as required; do not publish a log viewer.

After local setup, upload/commit generated Breeze files and updated composer.lock along with this source, migrations, seeders and instructions. Exclude .env, vendor, node_modules, logs and database files. Submit GitHub plus a tested live URL. Do not rerun breeze:install afterward (it overwrites web routes); if needed restore routes/tasks-web.php to routes/web.php.
