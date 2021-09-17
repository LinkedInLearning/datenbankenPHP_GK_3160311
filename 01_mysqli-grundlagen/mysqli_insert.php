<?php
include 'htmlhelfer.php';
htmlanfang();

$mysqli = new mysqli('localhost', 'root', '', 'beispiel');
if($mysqli->connect_error) {
    echo 'Fehler bei der Verbindung: ' . mysqli_connect_error();
    exit();
}
if (!$mysqli->set_charset('utf8mb4')) {
    echo 'Fehler beim Zeichensatz: ' . $mysqli->error;
}
$sql = 'INSERT INTO gerichte 
        (name, beschreibung, kategorie_id)
        VALUES ("Rosmarinkartoffeln", "Im Ofen gebacken ", 4)';
$mysqli->query($sql);
echo 'Zeilen betroffen: ' . $mysqli->affected_rows . '<br>';
echo 'Vergebene ID: '  . $mysqli->insert_id;

$mysqli->close();

htmlende();