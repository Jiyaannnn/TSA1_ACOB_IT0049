# Ledgerline Refill

Ledgerline Refill extends the original Ledgerline CodeIgniter 4 project with daily shop tasks and a refill station themed interface. The existing customer and staff directory remains available. The new task system keeps refill station checks, customer orders, container returns, and stock work on a separate schedule.

**Developer:** Jian Edward A. Acob · **Section:** TW32 · **Course:** IT0049 Web System Technologies

## Pages

| Route | Purpose |
| --- | --- |
| `/` | Welcome dashboard with today's tasks and the original directory summary |
| `/customers` | Existing customer records |
| `/users` | Existing staff records |
| `/tasks` | Every task, ordered by date |
| `/profile` | One task-system demo user |
| `/about` | Refill shop concept and developer |

The interface includes a three-step refill cycle, a progress indicator calculated from today’s task statuses, and a light/dark toggle that saves the browser preference. The task pages are read-only. The assessment requires date filtering and display, but does not ask for task creation, editing, or deletion. The refill station illustration is a local SVG at `public/assets/images/refill-station.svg`.

## Data layout

The original `ledgerline_pos_tfa2` database remains the default connection and holds the existing `customers` and `users` tables. The `ledgerline_refill_tsa1` database is the `taskStore` connection and holds the activity's `tasks` and `users` tables. This keeps all five original customers and five original staff records while allowing the task system to have exactly one demo user.

## Local setup

Requires PHP 8.2+, Composer 2, MySQL 8+, and CodeIgniter's required PHP extensions (`intl`, `mysqli`, `mbstring`).

1. Run `composer install`.
2. Copy `env` to `.env`. Set `app.baseURL` to your local URL, and set the `database.default.*` values to your MySQL connection. Keep `.env` private.
3. In `.env`, set `database.default.database = ledgerline_pos_tfa2` and `database.taskStore.database = ledgerline_refill_tsa1`.
4. Create both databases:

   ```bash
   mysql -u root -e "CREATE DATABASE ledgerline_pos_tfa2 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci; CREATE DATABASE ledgerline_refill_tsa1 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
   ```

5. On a **fresh** setup, run:

   ```bash
   php spark migrate -g default
   php spark migrate -g taskStore
   php spark db:seed PosSeeder
   php spark db:seed TaskSystemSeeder
   ```

   The original database can alternatively be restored from `database/ledgerline_pos_tfa2.sql`. If it already contains the five customer and staff records, do not run `PosSeeder` again.

6. Start the app with `php spark serve --port 8080` and open <http://localhost:8080/>.

The task seeder inserts 9 realistic tasks across 4 dates relative to the day it runs, including today, plus one task-system user. Seed a fresh task database once; rerunning the seeder duplicates tasks and conflicts with its unique username.

## Code structure

- `CustomerModel` and `UserModel` still read the original database.
- `TaskModel` and `TaskUserModel` read the separate `taskStore` database.
- The task migration and seeder create the activity's exact table schema and demo records.
- Controllers pass database records to views, and views escape displayed values with `esc()`.

## Submission

- GitHub repository: <https://github.com/Jiyaannnn/TA2_ACOB_IT0049>
- Hosted application: no public deployment has been verified yet
