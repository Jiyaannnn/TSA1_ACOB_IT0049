-- Ledgerline POS database export
-- Jian Edward A. Acob | TW32 | IT0049 Web System Technologies

-- Create the activity database with full Unicode character support.
CREATE DATABASE IF NOT EXISTS ledgerline_pos_tfa2
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE ledgerline_pos_tfa2;

-- Removing old copies makes this export safe to import again during setup.
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS customers;

-- Store customer contact details using the schema required by the activity.
CREATE TABLE customers (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    created_at DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- UNIQUE prevents duplicate staff usernames from being inserted.
CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Supply the five sample customer records required for assessment.
INSERT INTO customers (full_name, email, phone, created_at) VALUES
('Angelo Pineda', 'anpineda@fit.edu.ph', '09074144816', '2026-09-24 08:00:00'),
('Richmon Miguel', 'rbmiguel@fit.edu.ph', '09927918909', '2026-09-24 08:00:00'),
('Howard Callanta', 'hmcallanta@fit.edu.ph', '09084589753', '2026-09-24 08:00:00'),
('Gerard Doroja', 'gbdoroja@fit.edu.ph', '09615331576', '2026-09-24 08:00:00'),
('Tristan Cachapero', 'tbcachapero@fit.edu.ph', '09760997496', '2026-09-24 08:00:00');

-- Supply the five sample user records required for assessment.
INSERT INTO users (username, full_name, created_at) VALUES
('jacob', 'Jian Acob', '2026-09-24 08:00:00'),
('ivicencio', 'Isaiah Vicencio', '2026-09-24 08:00:00'),
('abarcelona', 'Aaron Barcelona', '2026-09-24 08:00:00'),
('ajamito', 'Amiel Jamito', '2026-09-24 08:00:00'),
('smacaldo', 'Sean Macaldo', '2026-09-24 08:00:00');
