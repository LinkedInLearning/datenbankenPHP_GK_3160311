<?php

$host = htmlspecialchars($_SERVER['HTTP_HOST']);
$uri = rtrim(dirname(htmlspecialchars($_SERVER['PHP_SELF'])), "/\\");
$extra = 'anzeigen.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: http://$host$uri/$extra");
}


try {
    $id = $_GET['id'];
    $db = new PDO('mysql:host=localhost;dbname=beispiel;charset=utf8mb4', 'root', '');
    $sql = 'DELETE FROM begriffe WHERE id=?';
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
    header("Location: http://$host$uri/$extra");
} catch (PDOException $e) {
    echo 'Hat nicht geklappt: ' . $e->getMessage();
}
