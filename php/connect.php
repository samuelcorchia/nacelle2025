<?php
const DBHOST = 'db';
const DBUSER = 'myuser';
const DBPASS = 'mypassword';
const DBNAME = 'mydatabase';

try {
    echo "Attempting database connection...\n";
    $pdo = new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "CONNECTE";
} catch (PDOException $e) {
    var_dump($e);
    die('Database connection failed: ' . $e->getMessage());
}