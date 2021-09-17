<?php
include 'htmlhelfer.php';
htmlanfang();

$mysqli = new mysqli('localhost', 'root', '', 'beispiel');
if ($mysqli->connect_error) {
    echo 'Fehler bei der Verbindung: ' . mysqli_connect_error();
    exit();
}
if (!$mysqli->set_charset('utf8mb4')) {
    echo 'Fehler beim Zeichensatz: ' . $mysqli->error;
}
// $sql = 'CREATE TABLE IF NOT EXISTS gerichte  (
//         id INT(11) NOT NULL AUTO_INCREMENT,
//         name VARCHAR(255) NOT NULL,
//         beschreibung TEXT,
//         kategorie_id INT(11),
//         PRIMARY KEY (id)
//         )';
$sql = 'CREATE TABLE IF NOT EXISTS kategorien (
        kategorie_id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(255),
        PRIMARY KEY (kategorie_id)
        )';
if ($mysqli->query($sql)) {
    echo 'SQL-Befehl ausgeführt: ' . $sql;
} else {
    echo 'Fehler';
}


$mysqli->close();

htmlende();
