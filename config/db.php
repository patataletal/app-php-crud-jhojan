<?php
$host = "localhost";
$dbname = "php_crud";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Algo está mal en tu código weee, revisa: " . $e->getMessage();
}
?>