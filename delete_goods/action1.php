<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css.css">
</head>
<body>
	<header>
		<div class='main'><a href="../index1.html">Головна</a></div>
		<div class='tables'><a href="../tables.html">Розділи</a></div>
		<div class='requests'><a href="../requests.html">Запити</a></div>
	</header>
	<div class="php">
	<?php
require_once '../connection.php';
$link = mysqli_connect($host,$user,$password,$database) or die("Error" .mysqli_error($link));
	if(isset($_POST['id'])){
		$idh= $_POST['id'];
		$a = "DELETE FROM goods WHERE id_goods='$idh'";
		$result_a = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));
echo "Товар № '$idh' та всі записи, де він використовується, успішно видалено";

		}
mysqli_close($link);
?>
</div>
</body>
</html>