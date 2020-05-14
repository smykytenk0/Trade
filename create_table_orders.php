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
$query1 = "CREATE Table orders
(
	id_order INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_outlets INT(11) NOT NULL,
	id_provider INT(11) NOT NULL,
	id_goods INT(11) NOT NULL,
	amount INT(11) NOT NUll,
	price INT(11) NOT NULL,
	data VARCHAR(200) NOT NULL
)";
$result = mysqli_query($link, $query1) or die("Error" .mysqli_error($link));
if ($result)
{
	echo "Table orders was created<br>";
}
mysqli_close($link);
?>

</body>
</html>