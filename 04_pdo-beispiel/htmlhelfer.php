<?php
function htmlanfang($titel = "PHP") {
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $titel; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
}
function htmlende() {
    ?>
	</body>
</html>
<?php
}
?>