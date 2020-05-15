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
$query1 = "CREATE Table outlets
(
	id_outlets INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_of_type INT(11) NOT NULL,
	name VARCHAR(200) NOT NULL,
	number_of_sections INT(11) NOT NULL,
	manager VARCHAR(200) NOT NUll,
	number_of_counters INT(11) NOT NULL,
	rent INT(11) NOT NULL, 
	square INT(11) NOT NULL, 
	utilities INT(11) NOT NULL
)";
$result = mysqli_query($link, $query1) or die("Error" .mysqli_error($link));
if ($result)
{
	echo "Table outlets was created<br>";
}
mysqli_close($link);
?>

</body>
</html>