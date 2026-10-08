-- Run ONCE in existing TSA1 database. Do not run on fresh TSA2 import.
ALTER TABLE users ADD COLUMN password VARCHAR(255) NOT NULL DEFAULT '';
ALTER TABLE tasks ADD COLUMN is_archived TINYINT(1) NOT NULL DEFAULT 0;
