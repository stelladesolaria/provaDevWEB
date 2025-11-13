<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'db_prova');   // <-- nome do banco
define('DB_USER', 'root');
define('DB_PASS', '812009ca');               // se estiver usando XAMPP, a senha é vazia

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}
