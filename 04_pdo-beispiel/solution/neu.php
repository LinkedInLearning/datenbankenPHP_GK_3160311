<?php
require_once 'htmlhelfer.php';
$host = htmlspecialchars($_SERVER['HTTP_HOST']);
$uri = rtrim(dirname(htmlspecialchars($_SERVER['PHP_SELF'])), "/\\");
$extra = 'anzeigen.php';

if (empty($_POST['titel'])) {
    htmlanfang();
?>
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="titel">Titel </label>
        <input type="text" name="titel" id="titel" maxlength="25">
        <label for="text">Text </label>
        <textarea name="text" id="text" rows="5" cols="30"></textarea>
        <input type="submit" value="Eintragen">
    </form>
<?php
    htmlende();
} else {
    try {
        $db = new PDO('mysql:host=localhost;dbname=beispiel;charset=UTF8', 'root', '');
        $titel = $_POST["titel"];
        $text = $_POST["text"];
        $sql = 'INSERT INTO begriffe (titel, text)
                VALUES (?, ?)';
        $stmt = $db->prepare($sql);
        $stmt->execute([$titel, $text]);
        //echo 'funktioniert';
        //header("Location: anzeigen.php");
        header("Location: http://$host$uri/$extra");
    } catch (PDOException $e) {
        echo 'Hat nicht geklappt: ' . $e->getMessage();
    }
}
