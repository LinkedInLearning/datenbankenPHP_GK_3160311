<?php
include 'htmlhelfer.php';
htmlanfang();
try {
    $db = new PDO('mysql:host=localhost;dbname=beispiel;charset=utf8mb4', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $abfrage = $db->query('SELECT * FROM kategorien');
    echo '<pre>';
    while ($zeile = $abfrage->fetch()) {
        echo "$zeile[0]: $zeile[1] <br>";
        //print_r($zeile);
    }
    echo '</pre>';
} catch (PDOException $e) {
    echo 'Hat nicht geklappt: ' . $e->getMessage();
}

htmlende();
