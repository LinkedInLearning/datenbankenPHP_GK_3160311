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
$name = "O'Connors Coleslaw";
$beschreibung = "Coleslaw dieses Mal mit ...";
$sql = "INSERT INTO gerichte 
        (name, beschreibung, kategorie_id)
        VALUES ('$name', '$beschreibung', 4)";
echo $sql . "<br>\n";
if (!$mysqli->query($sql)) {
    printf("Fehlermeldung: %s<br>\n", $mysqli->error);
} else {
    echo 'Zeilen betroffen: ' . $mysqli->affected_rows . '<br>';
}
$mysqli->close();

htmlende();