<?php
require_once 'htmlhelfer.php';
htmlanfang();

try {
    $db = new PDO('mysql:host=localhost;dbname=beispiel;charset=UTF8', 'root', '');
    $sql = 'SELECT id, titel, text FROM begriffe';
    echo '<table>';
    foreach ($db->query($sql) as $zeile) {
?>
        <tr>
            <td><?= $zeile[1]; ?></td>
            <td><?= $zeile[2]; ?></td>
            <td><a href="bearbeiten.php?id=<?= $zeile[0]; ?>">Bearbeiten</a></td>
            <td><a href="loeschen.php?id=<?= $zeile[0]; ?>" onclick="return confirm('wirklich löschen?')">Löschen</a></td>


        </tr>
<?php
    }
    echo '</table>';
} catch (PDOException $e) {
    echo 'Hat nicht geklappt: ' . $e->getMessage();
}
?>
<p><a href="neu.php">Neuen Begriff eintragen</a></p>
<?php
htmlende();
