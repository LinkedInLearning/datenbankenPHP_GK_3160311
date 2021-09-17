<?php
include 'htmlhelfer.php';
htmlanfang();
try {
    $db = new PDO('mysql:host=localhost;dbname=beispiel;charset=UTF8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT name, beschreibung, kategorie_id 
            FROM gerichte 
            WHERE kategorie_id = :kategorie_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue('kategorie_id', 4);
    $stmt->execute();
    echo '<pre>';
    while ($zeile = $stmt->fetch(PDO::FETCH_NUM)) {
        print_r($zeile);
    }
    echo 'und noch mal<br>';
    $stmt->bindValue('kategorie_id', 2);
    $stmt->execute();
    while ($zeile = $stmt->fetch(PDO::FETCH_NUM)) {
        print_r($zeile);
    }
    echo '</pre>';
} catch (PDOException $e) {
    echo 'Hat nicht geklappt: ' . $e->getMessage();
}


htmlende();