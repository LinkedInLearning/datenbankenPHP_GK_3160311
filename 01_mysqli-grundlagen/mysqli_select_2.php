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
$sql = 'SELECT * FROM gerichte';
$ergebnis = $mysqli->query($sql);
while ($zeile = $ergebnis->fetch_array(MYSQLI_ASSOC)) {
    echo htmlspecialchars($zeile['name'])
        . ' '
        . htmlspecialchars($zeile['beschreibung'])
        . "<br>\n";
}

$mysqli->close();

htmlende();
