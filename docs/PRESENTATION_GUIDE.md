# TFA2 Presentation Guide

## Short project explanation

I extended my TFA1 project into Ledgerline POS by replacing the static customer and user arrays with a real MySQL database. The application still uses the same four routes and responsive views, but the Customers and Users controllers now create their respective Models and call `findAll()` through CodeIgniter Query Builder. The Models connect the application to the `customers` and `users` tables, while the views remain responsible only for safely displaying each record.

## Demonstration order

1. Open the dashboard and point out that the totals come from the database Models.
2. Open Customer Accounts and show the five customer records.
3. Open User Accounts and show the five user records.
4. Resize the browser or use device mode to show the mobile record-card layout.
5. Open MySQL and run `SELECT * FROM customers;` and `SELECT * FROM users;`.
6. Open `CustomerModel.php` and `UserModel.php` and explain their table mappings.
7. Open both controllers and identify the `findAll()` calls.
8. Open one view and explain that `foreach` repeats the rows while `esc()` protects displayed values.
9. Show the migration, seeder, and `database/ledgerline_pos_tfa2.sql` export.
10. Show the README, GitHub repository, and hosted URL.

## Points to explain clearly

- **Why use a database?** Static arrays disappear when the code changes or the application restarts. MySQL stores records persistently and can support future create, update, and delete features.
- **What does a Model do?** It represents a database table and provides CodeIgniter methods for querying it.
- **What is Query Builder?** It is CodeIgniter's structured way of building and running database queries without placing raw SQL throughout the controllers.
- **What does `findAll()` do?** It retrieves all records from the Model's configured table and returns them as arrays.
- **Why keep queries out of views?** MVC separation makes the application easier to understand, test, and maintain. Views should present data rather than decide how it is retrieved.
- **Why use `esc()`?** It converts special characters before output, reducing the risk that stored text is interpreted as unwanted HTML or script code.
- **Why use migrations and seeders?** A migration recreates the table structure consistently, while a seeder inserts repeatable sample data.
- **Why include an SQL export?** It satisfies the submission requirement and lets another person reproduce the database directly.

## Likely instructor questions

**Where did the static arrays go?**  
They were removed from `Customers.php` and `Users.php`. Both controllers now retrieve records from Models.

**Did you write raw SQL in the controllers?**  
No. The controllers call Model methods backed by CodeIgniter Query Builder.

**How many records are required?**  
At least five per table. This project contains five customers and five users.

**What happens if MySQL is stopped?**  
The pages that use Models cannot retrieve their records, so the database service and correct `.env` settings are required.

**Does GitHub contain your database password?**  
No. `.env` is ignored by Git, and the README only shows placeholder/local setup values.

## Commands to know

```bash
brew services start mysql
php spark migrate
php spark db:seed PosSeeder
php spark serve
vendor/bin/phpunit --testdox
```
