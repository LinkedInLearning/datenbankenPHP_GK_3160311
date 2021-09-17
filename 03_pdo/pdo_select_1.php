<?php
include 'htmlhelfer.php';
htmlanfang();
try {
    $db = new PDO('mysql:host=localhost;dbname=beispiel;charset=utf8mb4', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM kategorien';
    echo '<pre>';
    foreach ($db->query($sql) as $zeile) {
        //print_r($zeile);
        echo "$zeile[0]: $zeile[1]<br>";
    }
    echo '</pre>';
} catch (PDOException $e) {
    echo 'Hat nicht geklappt: ' . $e->getMessage();
}

htmlende();
