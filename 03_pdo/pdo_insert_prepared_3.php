<?php
include 'htmlhelfer.php';
htmlanfang();
try {
    $db = new PDO('mysql:host=localhost;dbname=beispiel;charset=utf8mb4', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'INSERT INTO gerichte 
            (name, beschreibung, kategorie_id)
            VALUES (:name, :beschreibung, :kategorie_id)';
    $stmt = $db->prepare($sql);
    $stmt->execute([
        'name' => 'Semmelknödel',
        'beschreibung' => 'aus Brot und Sojamilch',
        'kategorie_id' => 4
    ]);
    echo $stmt->rowCount() . ' Datensatz/Datensätze betroffen';
} catch (PDOException $e) {
    echo 'Hat nicht geklappt: ' . $e->getMessage();
}
htmlende();
