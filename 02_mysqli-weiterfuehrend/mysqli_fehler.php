<?php
include 'htmlhelfer.php';
htmlanfang();
mysqli_report(MYSQLI_REPORT_ALL);
// $treiber = new mysqli_driver();
// $treiber->report_mode = MYSQLI_REPORT_ALL;

$mysqli = new mysqli('localhost', 'root', '', 'beispiel');
if ($mysqli->connect_error) {
    echo 'Fehler bei der Verbindung: ' . mysqli_connect_error();
    exit();
}
if (!$mysqli->set_charset('utf8mb4')) {
    echo 'Fehler beim Zeichensatz: ' . $mysqli->error;
}
$sql = 'SELECT * FROM grichte';
$ergebnis = $mysqli->query($sql);


while ($zeile = $ergebnis->fetch_array()) {
    print_r($zeile);
}

// if (!$mysqli->query($sql)) {
//     printf("Fehlermeldung: %s<br>\n", $mysqli->error);
// } else {
//     while ($zeile = $ergebnis->fetch_array()) {
//         print_r($zeile);
//     }
// }
$mysqli->close();

htmlende();
