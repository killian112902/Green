# Green Store (local)

A small PHP + Bootstrap demo storefront. This README explains how to run the project locally, create a test user, and use the login modal + session welcome page.

**Project structure (relevant files)**

- `index.php` — Main entry, includes the navbar and home sections
- `components/navbar.php` — Navbar + login modal
- `navigations/home.php` — Hero section
- `css/` — Styles (`index.css`, `home.css`, `navbar.css`)
- `auth/login.php` — Login handler
- `auth/logout.php` — Logout handler
- `config/db.php` — Database connection helper (edit credentials here)
- `create_user.php` — Small helper script that prints a `password_hash()` for a given password
- `welcome.php` — Simple protected page that displays "Welcome, <name>"

Requirements
- XAMPP (Apache + MySQL) on Windows
- PHP (bundled with XAMPP) — recommended to use `C:\xampp\php\php.exe` or add `C:\xampp\php` to PATH
- A MySQL database (instructions below)

Quick start — run locally
1. Start Apache and MySQL using the XAMPP control panel.
2. Open the project in a browser:

```powershell
Start-Process "http://localhost/Green/"
```

Database setup

1. Create the database and `users` table. Use phpMyAdmin or the MySQL CLI and run these SQL statements (adjust DB name in `config/db.php` if needed):

```sql
CREATE DATABASE IF NOT EXISTS `green_store` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `green_store`;

CREATE TABLE `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(150) DEFAULT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `password_hash` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

2. Create a test user. You can generate a password hash and then INSERT it manually (explained next).

Generate a password hash

- Option A — Use the provided script (recommended):

If `php` is available via full path (no need to add to PATH):

```powershell
cd C:\xampp\htdocs\Green
C:\xampp\php\php.exe create_user.php
```

This prints a hashed password (the script currently uses `secret123` — edit the file to change the password). Copy the printed hash.

- Option B — One-liner to generate directly:

```powershell
C:\xampp\php\php.exe -r "echo password_hash('secret123', PASSWORD_DEFAULT).PHP_EOL;"
```

Insert the test user (using the generated hash):

```sql
INSERT INTO users (name, email, password_hash) VALUES
('Test User', 'test@example.com', '<PASTE_HASH_HERE>');
```

Login flow
- Click the "Login" button in the navbar to open the modal.
- Enter the test user's email and password (e.g., `test@example.com` / `secret123`).
- On success you are redirected to `welcome.php`.
- Click "Log out" on the welcome page to destroy the session.

Database credentials
- Edit `config/db.php` to match your MySQL credentials and database name:

```php
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'green_store';
```

If `php` is not recognized in PowerShell
- Temporary session-only fix:

```powershell
$env:Path = "C:\xampp\php;" + $env:Path
php -v
```

- Permanent (GUI):
  1. Start → "Edit the system environment variables" → Environment Variables.
  2. Under System Variables select `Path` → Edit → New → add `C:\xampp\php` → OK.
  3. Re-open PowerShell and run `php -v`.

Security notes
- This demo is intended for local testing only. Before using in production:
  - Serve over HTTPS.
  - Harden `config/db.php` (don't commit DB credentials to public repos).
  - Add CSRF protection on forms.
  - Limit login attempts and use account lockout or rate limiting.
  - Validate and sanitize inputs more strictly depending on features.

Troubleshooting
- If you get a "Database connection failed" message, verify `config/db.php` credentials and that MySQL is running.
- If your modal does not show server-side errors after a failed login, refresh the page and try again; the modal auto-opens only when the server sets `$_SESSION['login_error']`.

Next improvements (ideas)
- Add a CLI `create_user.php` that accepts arguments (email, password, name) and inserts the user into the DB.
- Add registration and password reset flows.
- Replace session auth with a more complete auth layer and CSRF tokens.

If you want, I can implement the CLI `create_user.php` that inserts a user into the DB and accepts command-line args. Reply with (A) implement CLI insert, (B) add web admin form, or (C) nothing else for now.
