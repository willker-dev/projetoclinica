<?php
if (!defined('HOST')) {
    define('HOST', 'localhost');
}
if (!defined('USER')) {
    define('USER', 'root');
}
if (!defined('PASS')) {
    define('PASS', '');
}
if (!defined('BASE')) {
    define('BASE', 'clinica2'); 
}

try {
    $conn = new PDO('mysql:host=' . HOST . ';dbname=' . BASE, USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Conexão falhou: ' . $e->getMessage();
}
?>
