<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .table {
            border-collapse: collapse;
        }

        .table tr:nth-child(odd) {
            background-color: #c1dce8;
        }

        .table td {
            padding: .5rem;
           
        }
    </style>
</head>

<body>

    <?php

    $mysqli = new mysqli('localhost', 'root', '', 'beispiel');
    if ($mysqli->connect_error) {
        echo 'Fehler bei der Verbindung: ' . mysqli_connect_error();
        exit();
    }
    if (!$mysqli->set_charset('utf8mb4')) {
        echo 'Fehler beim Zeichensatz: ' . $mysqli->error;
    }
    $sql = 'SELECT gerichte.name as gericht, 
                   gerichte.beschreibung as beschreibung, 
                   kategorien.name as gang 
            FROM gerichte, kategorien
            WHERE kategorien.kategorie_id = gerichte.kategorie_id';
    $ergebnis = $mysqli->query($sql);
    ?>

    <table class="table">
        <?php
        while ($zeile = $ergebnis->fetch_array(MYSQLI_ASSOC)) {
        ?>
            <tr>
                <td><?= htmlspecialchars($zeile['gericht']); ?></td>
                <td><?= htmlspecialchars($zeile['beschreibung']); ?></td>
                <td><?= htmlspecialchars($zeile['gang']); ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
<?php
$mysqli->close();
