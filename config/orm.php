<?php

define('DB_DSN', 'mysql');
/*
define('DB_HOST', getenv('DB_HOST'));
define('DB_PORT', getenv('DB_PORT'));
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASS', getenv('DB_PASS'));
*/

define('DB_HOST', 'localhost');
define('DB_PORT', '');
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASS', '');
try {
    \ORM::configure([
        'connection_string' => sprintf('%s:host=%s;dbname=%s;port=%d', DB_DSN, DB_HOST, DB_NAME, DB_PORT),
        'username' => DB_USER,
        'password' => DB_PASS,
        'id_column_overrides' => array(
                'user' => 'idfv'
        )
    ]);
} catch (Exception $e) {
}
