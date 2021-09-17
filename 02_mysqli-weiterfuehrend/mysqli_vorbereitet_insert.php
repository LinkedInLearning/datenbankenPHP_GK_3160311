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
$name = "O'Haras Kuchen";
$beschreibung = "mit Banane zum Binden, ohne Ei";
$sql = 'INSERT INTO gerichte (name, beschreibung) VALUE (?, ?)';
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param('ss', $name, $beschreibung);
    $stmt->execute();
    echo 'Anzahl der geänderten Datensätze: ' . $stmt->affected_rows;
    $stmt->close();
}


$mysqli->close();


htmlende();
