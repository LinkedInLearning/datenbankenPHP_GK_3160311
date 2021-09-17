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
$suche = '%kichererbsen%';
$sql = 'SELECT name, beschreibung
        FROM gerichte
		WHERE beschreibung LIKE ?';

if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param('s', $suche);
    $stmt->execute();
    $stmt->bind_result($name, $beschreibung);
?>
    <table>

        <?php
        while ($stmt->fetch()) {
        ?>
            <tr>
                <td><?= htmlspecialchars($name); ?></td>
                <td><?= htmlspecialchars($beschreibung); ?></td>
            </tr>
        <?php
        }
        ?>

    </table>
<?php
    $stmt->close();
}
$mysqli->close();


htmlende();
