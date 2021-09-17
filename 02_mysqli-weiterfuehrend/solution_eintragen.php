<?php
require_once 'db_verbinden.php';
require_once 'htmlhelfer.php';
$host = htmlspecialchars($_SERVER['HTTP_HOST']);
$uri = rtrim(dirname(htmlspecialchars($_SERVER['PHP_SELF'])), "/\\");
$extra = 'anzeigen.php';
if (empty($_POST['titel'])) {
    htmlanfang();
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="titel">Titel </label>
        <input type="text" name="titel" id="titel" maxlength="25">
        <label for="text">Text </label>
        <textarea name="text" id="text" rows="5" cols="30"></textarea>
        <input type="submit" value="Eintragen">
    </form>
    <?php
    htmlende();
} else {
    if ($stmt = $mysqli->prepare('INSERT INTO begriffe (titel, text) VALUES (?, ?)')) {
        $titel = $_POST['titel'];
        $text = $_POST['text'];
        $stmt->bind_param('ss', $titel, $text);
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
        header("Location: http://$host$uri/$extra");
    }
}
?>