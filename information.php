<?php
$link = mysqli_connect('127.0.0.1', 'root', 'mariadb');
if (!$link) {
	die('Error: ' . mysqli_error());
}
echo 'Good!';
mysqli_close($link); 
?>
