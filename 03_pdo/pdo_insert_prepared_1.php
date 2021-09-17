<?php
include 'htmlhelfer.php';
htmlanfang();
try {
    $db = new PDO('mysql:host=localhost;dbname=beispiel;charset=utf8mb4', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO gerichte 
    (name, beschreibung, kategorie_id)
    VALUES (?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute(['Bratlinge', 'aus roten Bohnen', 4]);
    echo $stmt->rowCount() . ' Datensatz/Datensätze betroffen';
} catch (PDOException $e) {
    echo 'Hat nicht geklappt: ' . $e->getMessage();
}

htmlende();
