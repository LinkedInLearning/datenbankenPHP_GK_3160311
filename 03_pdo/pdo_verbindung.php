<?php
include 'htmlhelfer.php';
htmlanfang();
try {
    $db = new PDO('mysql:host=localhost;dbname=beispiel;charset=utf8mb4', 'root', '');
} catch (PDOException $e) {
    echo 'Konnte Verbindung nicht erstellen: ' . $e->getMessage();
}


htmlende();
