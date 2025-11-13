<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'db_prova');   
define('DB_USER', 'root');
define('DB_PASS', '812009ca');               

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";port=3306;dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}