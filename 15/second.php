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
		<form action="action2.php" method="post">
			<p>Вкажіть тип торгової точки:<br> 
			<input type="text" name="type"/></p>
			<p>Вкажіть мінімальну дату:<br> 
			<input type="text" name="date_from"/></p>
			<p>Вкажіть максимальну дату:<br> 
			<input type="text" name="date_to"/></p>
			<p><input type="submit" value="Пошук" /></p>
		</form>
	</div>
</body>
</html>