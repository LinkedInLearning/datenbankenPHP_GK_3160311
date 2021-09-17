<?php
include 'htmlhelfer.php';
htmlanfang();
try {
    $db = new PDO('mysql:host=localhost;dbname=beispiel;charset=utf8mb4', 'root', '');
} catch (PDOException $e) {
    echo 'Hat nicht geklappt: ' . $e->getMessage();
}
$abfrage = $db->query('SELECT * FROM katgorien');
echo '<pre>';
if ($abfrage !== false) {
    while ($zeile = $abfrage->fetch(PDO::FETCH_NUM)) {
        print_r($zeile);
    }
} else {
    print_r($db->errorInfo());
}
echo '</pre>';
htmlende();
