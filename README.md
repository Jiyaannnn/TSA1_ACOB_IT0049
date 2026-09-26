# Ledgerline Refill TSA1

Ledgerline Refill is a neighborhood refill shop concept built on the existing Ledgerline CodeIgniter 4 project. Its task system helps staff keep dispensers ready, prepare customer refills, record container returns, and plan stock work.

**Developer:** Jian Edward A. Acob · **Section:** TW32 · **Course:** IT0049 Web System Technologies

## Pages

| Route | Purpose |
| --- | --- |
| `/` | Welcome page showing only today's tasks |
| `/tasks` | Every task, ordered by date |
| `/profile` | The single demo user's information |
| `/about` | Concept and developer information |

## Requirements

PHP 8.2+, Composer 2, MySQL 8+, and the PHP extensions required by CodeIgniter (`intl`, `mysqli`, `mbstring`).

## Local setup

1. Run `composer install` in the project directory.
2. Copy `env` to `.env` and set `app.baseURL` to your local address and `database.default.*` to your MySQL connection. Keep `.env` private.
3. Create the database:

   ```bash
   mysql -u root -e "CREATE DATABASE ledgerline_refill_tsa1 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
   ```

4. Run the migration and seeder:

   ```bash
   php spark migrate
   php spark db:seed TaskSystemSeeder
   ```

5. Start the app with `php spark serve --port 8080`, then open <http://localhost:8080/>. Update `app.baseURL` if using another port.

The migration implements the required `tasks` and `users` tables. The seeder adds 9 realistic refill shop tasks across 4 dates relative to the day it runs, including today, plus exactly one demo user. Seed a fresh database once; running it again duplicates tasks and conflicts with the unique username.

## Implementation

- `app/Models/TaskModel.php` filters today's tasks in SQL and retrieves all tasks in date order.
- `app/Models/UserModel.php` retrieves the demo user.
- Controllers pass records to separate views; views escape database values with `esc()`.
- `app/Database/Migrations/2026-09-26-000001_CreateTaskSystem.php` and `app/Database/Seeds/TaskSystemSeeder.php` provide the submission database setup.

## Submission

- GitHub repository: pending publication
- Hosted application: pending deployment
