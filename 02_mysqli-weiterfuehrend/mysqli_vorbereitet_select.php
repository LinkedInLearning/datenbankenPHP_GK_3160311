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
$id = 5;
$sql = 'SELECT name, beschreibung
        FROM gerichte
		WHERE id = ?';

if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($name, $beschreibung);
    $stmt->fetch();
    echo htmlspecialchars($name)
        . ': ' . htmlspecialchars($beschreibung);
    $stmt->close();
}
$mysqli->close();


htmlende();
