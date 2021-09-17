<?php
include 'htmlhelfer.php';
htmlanfang();
try {
    $db = new PDO('mysql:host=localhost;dbname=beispiel;charset=utf8mb4', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Hat nicht geklappt: ' . $e->getMessage();
}
$abfrage = $db->query('SELECT * FROM katgorien');
echo '<pre>';
while ($zeile = $abfrage->fetch(PDO::FETCH_NUM)) {
    print_r($zeile);
}
echo '</pre>';
htmlende();
