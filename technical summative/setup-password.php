<?php
// LOCAL CLI ONLY: php setup-password.php USERNAME
if (PHP_SAPI !== 'cli') { http_response_code(403); exit('CLI only'); }
if (! isset($argv[1]) || ! preg_match('/^[a-zA-Z0-9_.-]{1,50}$/', $argv[1])) { fwrite(STDERR,"Usage: php setup-password.php USERNAME\n"); exit(1); }
echo "Enter a strong password (input visible): ";
$password = trim((string)fgets(STDIN));
if (strlen($password) < 12) { fwrite(STDERR,"Password must be at least 12 characters.\n"); exit(1); }
echo "In phpMyAdmin select task_management > SQL and run:\n";
echo "UPDATE users SET password = '" . password_hash($password, PASSWORD_DEFAULT) . "' WHERE username = '" . $argv[1] . "';\n";
