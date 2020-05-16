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
		<form action="action3.php" method="post">
			<p>Вкажіть товар:<br> 
			<input type="text" name="goods"/></p>
			<p>Вкажіть мінімальну дату:<br> 
			<input type="text" name="date_from"/></p>
			<p>Вкажіть максимальну дату:<br> 
			<input type="text" name="date_to"/></p>
			<p>Вкажіть торгову точку:<br> 
			<input type="text" name="outlet"/></p>
			<p><input type="submit" value="Пошук" /></p>
		</form>
	</div>
</body>
</html>