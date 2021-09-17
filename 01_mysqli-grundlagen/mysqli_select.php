<?php
include 'htmlhelfer.php';
htmlanfang();

$mysqli = new mysqli('localhost', 'root', '', 'beispiel');
if ($mysqli->connect_error) {
    echo 'Fehler bei der Verbindung: ' . mysqli_connect_error();
    exit();
}
if (!$mysqli->set_charset('utf8mb4')) {
    echo 'Fehler beim Laden von UTF-8: ' . $mysqli->error;
}
$sql = 'SELECT * FROM gerichte';
$ergebnis = $mysqli->query($sql);
//print_r($ergebnis);
while ($zeile = $ergebnis->fetch_array()) {
    print_r($zeile);
}


$mysqli->close();

htmlende();
