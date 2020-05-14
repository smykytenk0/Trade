<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php
require_once 'connection.php';

$link = mysqli_connect($host,$user,$password,$database) 
	or die("Error" .mysqli_error($link));
$query1 = "CREATE Table customers
(
	id_purchase INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(200) NOT NULL,
	age INT(11) NOT NULL,
	sex VARCHAR(200) NOT NUll,
	id_staff INT(11) NOT NULL,
	id_goods INT(11) NOT NULL,
	amount_goods INT(11) NOT NULL,
	data VARCHAR(200) NOT NULL
)";
$result = mysqli_query($link, $query1) or die("Error" .mysqli_error($link));
if ($result)
{
	echo "Table customers was created<br>";
}
mysqli_close($link);
?>

</body>
</html>