<?php
include 'htmlhelfer.php';
htmlanfang();
$mysqli = new mysqli('localhost', 'root', '', 'beispiel');
if ($mysqli->connect_error) {
    die('Fehler bei der Verbindung: ' . mysqli_connect_error());
}
echo 'Verbindung hat geklappt';
$mysqli->close();


htmlende();
