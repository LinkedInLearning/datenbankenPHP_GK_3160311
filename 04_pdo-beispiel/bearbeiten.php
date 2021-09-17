<?php

require_once 'htmlhelfer.php';
$host = htmlspecialchars($_SERVER['HTTP_HOST']);
$uri = rtrim(dirname(htmlspecialchars($_SERVER['PHP_SELF'])), "/\\");
$extra = 'anzeigen.php';

try {
    $db = new PDO('mysql:host=localhost;dbname=beispiel;charset=UTF8', 'root', '');
} catch (PDOException $e) {
    die('Hat nicht geklappt: ' . $e->getMessage());
}

if (empty($_POST['titel'])) {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header("Location: http://$host$uri/$extra");
    }
    htmlanfang();


    $id = $_GET['id'];
    $sql = 'SELECT id, titel, text FROM begriffe WHERE id=?';
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
    $zeile = $stmt->fetch(PDO::FETCH_NUM);
    $titel = htmlspecialchars($zeile[1]);
    $text = htmlspecialchars($zeile[2]);

?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="titel">Titel </label>
        <input type="text" name="titel" id="titel" maxlength="25" value="<?= $titel; ?>">
        <label for="text">Text </label>
        <textarea name="text" id="text" rows="5" cols="30"><?= $text; ?></textarea>
        <input type="hidden" name="id" value="<?= $id; ?>">
        <input type="submit" value="Eintragen">
    </form>
<?php
    htmlende();
} else {
    $id = $_POST['id'];
    $titel = $_POST['titel'];
    $text = $_POST['text'];
    $sql = 'UPDATE begriffe SET titel=?, text=? WHERE id=?';
    $stmt = $db->prepare($sql);
    $stmt->execute([$titel, $text, $id]);
    header("Location: http://$host$uri/$extra");
}
