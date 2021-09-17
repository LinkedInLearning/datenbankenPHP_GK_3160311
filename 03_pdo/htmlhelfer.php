<?php
function htmlanfang($titel = "PHP") {
  echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
   
    <title>$titel</title>
</head>
<body>"	;
}
function htmlende() {
	echo "</body>
</html>";
}
?>