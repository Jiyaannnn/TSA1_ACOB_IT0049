# Ledgerline Refill — Tasks for Today

Ledgerline Refill is a CodeIgniter 4 project for **IT0049 Technical Summative Assessment 1: Tasks for Today Management System**. It extends the existing Ledgerline project with a refill-shop work schedule. The original customer and staff directories remain available, while the new pages read task and profile records from a separate MySQL database.

## Student information

- **Name:** Jian Edward A. Acob
- **Section:** TW32
- **Course:** IT0049 - Web System Technologies
- **Assessment:** Technical Summative Assessment 1

## Project concept

The system represents a neighborhood refill shop. Its daily work includes cleaning dispensers, checking bulk soap and detergent, preparing customer orders, and recording returned containers. The interface uses a refill-station illustration, a three-step refill cycle, progress based on today's task statuses, responsive layouts, and a light/dark toggle saved in the browser.

The task pages are read-only because the activity asks for retrieval, date filtering, and display. It does not require create, edit, update, or delete controls.

## Application pages

| Route | Purpose |
| --- | --- |
| `/` | Welcome page with only today's tasks and a summary of the preserved directories |
| `/tasks` | Complete task list ordered by task date and ID |
| `/profile` | Profile of the one demo task-system user |
| `/about` | Refill-shop concept and developer information |
| `/customers` | Original customer records from the TFA2 database |
| `/users` | Original staff records from the TFA2 database |

## Requirements and sample records

- PHP 8.2 or newer, Composer 2, MySQL 8 or newer, and the CodeIgniter PHP extensions `intl`, `mysqli`, and `mbstring`.
- The task database has `tasks` and `users` tables with the columns and constraints specified in the TSA1 activity.
- `TaskSystemSeeder` inserts **nine tasks across four dates**, including four tasks dated today, and **one demo user**.
- The original TFA2 database retains **five customers and five staff users**.
- Dates in the task seeder are relative to the day it runs, so a fresh setup has tasks for its current day.

## Database layout

| Connection group | Database | Tables used here |
| --- | --- | --- |
| `default` | `ledgerline_pos_tfa2` | Original `customers` and `users` |
| `taskStore` | `ledgerline_refill_tsa1` | New `tasks` and single-user `users` |

The separate `taskStore` group prevents the TSA1 `users` table from replacing the earlier staff table. `CustomerModel` and `UserModel` still use `default`; `TaskModel` and `TaskUserModel` use `taskStore`.

## Local setup

1. Clone this repository and install dependencies.

   ```bash
   git clone https://github.com/Jiyaannnn/TSA1_ACOB_IT0049.git
   cd TSA1_ACOB_IT0049
   composer install
   ```

2. Copy `env` to `.env` and configure the local MySQL connection. Set your own username and password if they differ.

   ```bash
   cp env .env
   ```

   ```ini
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost:8080/'

   database.default.hostname = 127.0.0.1
   database.default.database = ledgerline_pos_tfa2
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   database.default.port = 3306

   database.taskStore.database = ledgerline_refill_tsa1
   ```

   `taskStore` inherits the default host, credentials, driver, and port in `app/Config/Database.php`; only its database name differs.

3. Create both databases.

   ```bash
   mysql -u root -e "CREATE DATABASE ledgerline_pos_tfa2 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci; CREATE DATABASE ledgerline_refill_tsa1 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
   ```

4. On a **fresh** setup, create tables and seed records.

   ```bash
   php spark migrate -g default
   php spark migrate -g taskStore
   php spark db:seed PosSeeder
   php spark db:seed TaskSystemSeeder
   ```

   To restore the original TFA2 data from its SQL export instead, run `mysql -u root < database/ledgerline_pos_tfa2.sql` and skip the original database migration and `PosSeeder`. Do not reseed either database after records already exist: the task seeder would duplicate tasks and conflict with its unique demo username.

5. Run the application on its original port and open <http://localhost:8080/>.

   ```bash
   php spark serve --port 8080
   ```

## How task retrieval works

1. Routes send requests to the corresponding controllers.
2. The Welcome controller passes today's date to `TaskModel::forDate()`, which filters `task_date` in MySQL.
3. The Task List controller calls `TaskModel::allByDate()`, which orders every record by `task_date` and then `id`.
4. The Profile controller reads the one task-system user through `TaskUserModel`.
5. Controllers pass database results to views. Views escape displayed fields with CodeIgniter's `esc()` helper.

## Important project files

| File | Responsibility |
| --- | --- |
| `app/Config/Routes.php` | Routes for the required task pages and preserved directories |
| `app/Config/Database.php` | Default and `taskStore` connection groups |
| `app/Database/Migrations/2026-09-26-000001_CreateTaskSystem.php` | Creates the task-system tables |
| `app/Database/Seeds/TaskSystemSeeder.php` | Inserts nine tasks and one demo user |
| `app/Models/TaskModel.php` | Today's filter and complete date-ordered query |
| `app/Models/TaskUserModel.php` | Reads the demo profile from `taskStore` |
| `app/Controllers/Pages.php`, `Tasks.php`, `Profile.php` | Retrieve records for the required pages |
| `app/Views/tasks/today.php`, `tasks/index.php`, `pages/profile.php`, `pages/about.php` | Render the four required views |
| `app/Views/layouts/main.php` | Shared navigation, responsive layout, and theme toggle |
| `public/assets/images/refill-station.svg` | Refill-shop illustration |
| `database/ledgerline_pos_tfa2.sql` | Export of the preserved TFA2 records |

## Security and repository notes

- `.env` is excluded from Git; keep database passwords and hosting credentials there.
- Views call `esc()` for displayed database fields.
- Composer's `vendor` directory, logs, sessions, caches, and temporary files are excluded from Git.
- Migrations and seeders reproduce the new task database without publishing local credentials.

## Submission

- **GitHub repository:** <https://github.com/Jiyaannnn/TSA1_ACOB_IT0049>
- **Hosted application:** Not included in this GitHub-only submission.
