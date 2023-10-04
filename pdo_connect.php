<?php

$user = 'root';
$pass = ''; 
$dsn='mysql:host=localhost; dbname=ticket_system';
try {
    $db = new PDO($dsn, $user, $pass); //create a new PDO object instance
    $dbname = $db->query('SELECT database()')->fetchColumn();

} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br>";
    die();
}

?>