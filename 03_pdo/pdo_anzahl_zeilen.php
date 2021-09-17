<?php
include 'htmlhelfer.php';
htmlanfang();
try {
    //$db = new PDO('mysql:host=localhost;dbname=beispiel;charset=UTF8', 'root', '');
    //Pfad von sqlite anpassen!
    $db = new PDO('sqlite:C:\xampp_php_8\htdocs\lil_php_db\sqlite\beispiel.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $ergebnis = $db->query('SELECT * FROM gerichte');
    //nur, wenn das Datenbankmanagementsystem das auch unterstützt, sonst 0!
    $anzahl = $ergebnis->rowCount();
    echo 'Anzahl Datensätze: ' . $anzahl . '<br>';

    while ($zeile = $ergebnis->fetch()) {
        echo $zeile['name'] . '<br>';
    }
} catch (PDOException $e) {
    echo 'Hat nicht geklappt: ' . $e->getMessage();
}

htmlende();
