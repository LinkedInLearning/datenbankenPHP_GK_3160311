<?php
include 'htmlhelfer.php';
htmlanfang();
try {
    $db = new PDO('mysql:host=localhost;dbname=beispiel;charset=utf8mb4', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT kategorie_id, name, beschreibung FROM gerichte';
    echo '<pre>';
    $zeile = $db->query($sql)->fetchAll(PDO::FETCH_GROUP);
    print_r($zeile);
    echo '</pre>';
} catch (PDOException $e) {
    echo 'Hat nicht geklappt: ' . $e->getMessage();
}

htmlende();
