<?php
$host = 'localhost';
$dbname = 'reseau_social_db';
$username = 'root';
$password = 'baba123';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e.getMessage());
}
?>