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
$sql = 'DELETE FROM gerichte
        WHERE id = 2';
$mysqli->query($sql);
echo 'Zeilen betroffen: ' . $mysqli->affected_rows . '<br>';

$mysqli->close();

htmlende();