<?php
// ── Configuration ──────────────────────────────────────────────
define('DB_HOST', 'localhost');
define('DB_NAME', 'portfolio_db');
define('DB_USER', 'root');
define('DB_PASS', '');        
define('DB_CHARSET', 'utf8mb4');

// ── PDO Connection ─────────────────────────────────────────────
function getDB(): PDO
{
    static $pdo = null;

    if ($pdo === null) {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,   // throw exceptions
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,         // associative arrays
            PDO::ATTR_EMULATE_PREPARES   => false,                    // real prepared statements
            PDO::ATTR_PERSISTENT         => false,
        ];

        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            // In production you would log this instead of displaying it
            error_log("DB Connection Error: " . $e->getMessage());
            http_response_code(500);
            die(json_encode([
                'success' => false,
                'message' => 'A database error occurred. Please try again later.'
            ]));
        }
    }

    return $pdo;
}