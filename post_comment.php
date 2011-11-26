<?php

$name = isset($_POST['name']) ? $_POST['name'] : false;
$message = isset($_POST['message']) ? $_POST['message'] : false;

$name = htmlspecialchars(stripslashes(trim($name)));
$message = htmlspecialchars(stripslashes(trim($message)));

$content = "<i>$name said: </i>$message<br />";

file_put_contents('comments.php', $content . file_get_contents('comments.php'));

?>