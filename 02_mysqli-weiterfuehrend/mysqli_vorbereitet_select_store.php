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
$suche = '%kichererbsen%';
$sql = 'SELECT name, beschreibung
        FROM gerichte
		WHERE beschreibung LIKE ?';

if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param('s', $suche);
    $stmt->execute();
    $stmt->store_result();
    $anzahl = $stmt->num_rows();

    $stmt->bind_result($name, $beschreibung);
    
?>
    <h2>insgesamt <?php echo $anzahl; ?> Ergebnisse</h2>
<table>
    <tbody>
    <?php
    while ($stmt->fetch()) {
        ?>
        <tr>
            <td><?php echo htmlspecialchars($name); ?></td>
            <td><?php echo htmlspecialchars($beschreibung); ?></td>
        </tr>
        <?php
    }
    ?>
</tbody>
</table>
<?php
    $stmt->free_result();
    $stmt->close();
}
$mysqli->close();


htmlende();