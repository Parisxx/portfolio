<?php
$host = 'localhost'; 
$dbname = 'portfolio_ps';
$username = 'Examen';
$password = 'Pbc9sU~79xrrB^rw';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error connecting to database: " . $e->getMessage());
}
?>