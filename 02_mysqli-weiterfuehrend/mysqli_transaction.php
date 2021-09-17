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
try {
    $betrag = 50;
    $zahler = 'Mia Maier';
    $empfaenger = 'Nora Nordpol';
    $soll =  'UPDATE konto SET kontostand = kontostand - ? WHERE name = ?';
    $haben = 'UPDATE konto SET kontostand = kontostand + ? WHERE name = ?';

    $zahlung = $mysqli->prepare($soll);
    $zahlung->bind_param('is', $betrag, $zahler);

    $gutschrift = $mysqli->prepare($haben);
    $gutschrift->bind_param('is', $betrag, $empfaenger);

    $mysqli->begin_transaction();
    $zahlung->execute();
    if (!$mysqli->affected_rows) {
        $mysqli->rollback();
        $fehler = 'Transaktion hat nicht geklappt - konnte nicht abbuchen.';
    } else {
        $gutschrift->execute();
        if (!$mysqli->affected_rows) {
            $mysqli->rollback();
            $fehler = 'Transaktion hat nicht geklappt - konnte nicht auf Konto buchen.';
        } else {
            $mysqli->commit();
        }
    }


    $kontostaende = $mysqli->query('SELECT name, kontostand FROM konto');
} catch (Exception $e) {
    $fehler = $e->getMessage();
}
if (isset($fehler)) {
    echo "<p>$fehler</p>";
}
?>
<table>
    <tbody>
        <?php
        while ($zeile = $kontostaende->fetch_array()) {
        ?>
            <tr>
                <td><?php echo htmlspecialchars($zeile['name']); ?></td>
                <td><?php echo htmlspecialchars($zeile['kontostand']); ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
$mysqli->close();
htmlende();
