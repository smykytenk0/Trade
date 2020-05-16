<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="css.css">
</head>
<body>
	<header>
		<div class='main'><a href="index1.html">Головна</a></div>
		<div class='tables'><a href="tables.html">Розділи</a></div>
		<div class='requests'><a href="requests.html">Запити</a></div>
	</header>
	<div class="php">
<?php

require_once 'connection.php';
if(isset($_POST['name'])&&isset($_POST['age'])&&isset($_POST['sex'])&&isset($_POST['id_staff'])&&isset($_POST['id_goods'])&&isset($_POST['amount_goods'])&&isset($_POST['data']))
{
	$link = mysqli_connect($host,$user,$password,$database)
		or die("Error" .mysqli_error($link));
	
	$name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
	$age = htmlentities(mysqli_real_escape_string($link, $_POST['age']));
	$sex = htmlentities(mysqli_real_escape_string($link, $_POST['sex']));
	$id_staff = htmlentities(mysqli_real_escape_string($link, $_POST['id_staff']));
	$id_goods = htmlentities(mysqli_real_escape_string($link, $_POST['id_goods']));
	$amount_goods = htmlentities(mysqli_real_escape_string($link, $_POST['amount_goods']));
	$data = htmlentities(mysqli_real_escape_string($link, $_POST['data']));

	$query = "INSERT INTO customers VALUES(NULL, '$name','$age','$sex','$id_staff','$id_goods','$amount_goods','$data')";
	
	$result = mysqli_query($link, $query) or die ("Error" .mysqli_error($link));
	if($result)
	{
		echo"<span style='color:blue;'>Data was putted into table</span>";
	}
	mysqli_close($link);
}
?>
</div>
<h2 class="input">Вкажіть покупця</h2>
<form method="POST">
<p>Введіть ім'я:<br>
<input type="text" name="name"/></p>
<p>Введіть вік:<br>
<input type="text" name="age"/></p>
<p>Введіть стать:<br>
<input type="text" name="sex"/></p>
<p>Введіть id персоналу:<br>
<input type="text" name="id_staff"/></p>
<p>Введіть id товару:<br>
<input type="text" name="id_goods"/></p>
<p>Введіть кількість товарів:<br>
<input type="text" name="amount_goods"/></p>
<p>Введіть дату:<br>
<input type="text" name="data"/></p>
<input type = "submit" value = "Input">
</form>
</body>
</html>


