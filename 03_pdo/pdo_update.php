<?php
include 'htmlhelfer.php';
htmlanfang();
try {
    $db = new PDO('mysql:host=localhost;dbname=beispiel;charset=utf8mb4', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE gerichte 
            SET beschreibung = 'aus leckeren getrockneten Tomaten'
            WHERE id = 10";
    $betroffeneZeilen = $db->exec($sql);
    echo $betroffeneZeilen . ' Datensatz/Datensätze geändert';
} catch (PDOException $e) {
    echo 'Hat nicht geklappt: ' . $e->getMessage();
}


htmlende();
