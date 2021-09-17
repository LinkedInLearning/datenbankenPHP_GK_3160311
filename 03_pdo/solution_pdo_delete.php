<?php
include 'htmlhelfer.php';
htmlanfang();
try {
    $db = new PDO('mysql:host=localhost;dbname=beispiel;charset=utf8mb4', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = 1;
    $sql = 'DELETE FROM gerichte 
            WHERE id=?';
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
    echo $stmt->rowCount() . ' Datensatz/Datensätze geändert';
} catch (PDOException $e) {
    echo 'Hat nicht geklappt: ' . $e->getMessage();
}

htmlende();
