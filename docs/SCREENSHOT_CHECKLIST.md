# TFA2 Screenshot Checklist

Use a desktop browser at approximately 1440 x 900 unless a mobile size is specified. Hide bookmarks, personal tabs, passwords, and unrelated applications before capturing each image.

| Figure | Open | What must be visible | Caption | Short explanation |
| --- | --- | --- | --- | --- |
| 1 | `/` | Ledgerline POS navigation, TFA2 dashboard, total of 10 records, five customers, and five users | **Figure 1. Database-backed Ledgerline POS dashboard.** | The dashboard totals are calculated from the CustomerModel and UserModel instead of hard-coded arrays. |
| 2 | `/customers` | Page title, database description, record count, and all five customer rows | **Figure 2. Customer records retrieved from MySQL.** | CustomerModel retrieves the rows and the existing view displays each record with a `foreach` loop. |
| 3 | `/users` | Page title, database description, record count, usernames, names, and creation dates | **Figure 3. User records retrieved from MySQL.** | UserModel returns five staff records from the users table without a static controller array. |
| 4 | MySQL terminal | `SELECT * FROM customers;` result with five rows and column headings | **Figure 4. Customers table and sample records.** | The customers table follows the supplied schema and contains the required minimum of five records. |
| 5 | MySQL terminal | `SELECT * FROM users;` result with five rows and column headings | **Figure 5. Users table and sample records.** | The users table contains unique usernames, full names, and required creation timestamps. |
| 6 | `app/Models/CustomerModel.php` and `app/Models/UserModel.php` | Both Model classes, table names, primary keys, return types, and allowed fields | **Figure 6. CodeIgniter Models for both database tables.** | Each Model connects one PHP class to its matching MySQL table and defines which fields are allowed. |
| 7 | `app/Controllers/Customers.php` and `app/Controllers/Users.php` | Model imports and the `orderBy(...)->findAll()` calls | **Figure 7. Controllers retrieving records through Models.** | The controllers request database rows through CodeIgniter Query Builder and pass them to the views. |
| 8 | `.env` | Host, database, driver, and port; keep any password hidden | **Figure 8. Local CodeIgniter database configuration.** | The environment settings connect the project to the local `ledgerline_pos_tfa2` MySQL database. |
| 9 | `/customers` at 390 x 844 | Mobile navigation button and customer records reorganized into labelled cards | **Figure 9. Responsive customer accounts layout.** | The semantic table changes into readable record cards on a narrow screen without horizontal overflow. |
| 10 | GitHub repository home | Repository name, file list, README heading, Models, `database` folder, and latest commit | **Figure 10. Complete TFA2 GitHub repository.** | The repository contains the raw project files, setup guide, migration, seeder, and SQL export while excluding secrets. |
| 11 | Hosted `/customers` page | Browser address bar with public HTTPS URL and the five customer rows | **Figure 11. Hosted working application.** | The public deployment matches the submitted source and successfully reads its hosted MySQL database. |

## Commands for database evidence

```bash
mysql -h 127.0.0.1 -u root -D ledgerline_pos_tfa2
```

Inside MySQL:

```sql
SELECT * FROM customers;
SELECT * FROM users;
```

Do not include private credentials or an unredacted password in any screenshot.
