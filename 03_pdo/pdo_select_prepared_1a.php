<?php
include 'htmlhelfer.php';
htmlanfang();
try {
    $db = new PDO('mysql:host=localhost;dbname=beispiel;charset=utf8mb4', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT name, beschreibung, kategorie_id 
            FROM gerichte 
            WHERE kategorie_id = ?';
    $stmt = $db->prepare($sql);
    $stmt->execute([4]);
    echo '<pre>';
    while ($zeile = $stmt->fetch(PDO::FETCH_NUM)) {
        print_r($zeile);
    }
    echo '</pre>';
} catch (PDOException $e) {
    echo 'Hat nicht geklappt: ' . $e->getMessage();
}


htmlende();