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
$query1 = "CREATE Table staff
(
	id_staff INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	position VARCHAR(200) NOT NULL,
	name VARCHAR(200) NOT NULL,
	id_outlets INT(11) NOT NULL,
	sallary INT(11) NOT NUll
)";
$result = mysqli_query($link, $query1) or die("Error" .mysqli_error($link));
if ($result)
{
	echo "Table staff was created<br>";
}
mysqli_close($link);
?>

</body>
</html>