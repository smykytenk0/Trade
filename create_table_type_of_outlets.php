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
$query1 = "CREATE Table type_of_outlets
(
	id_of_type INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	type VARCHAR(200) NOT NULL
)";
$result = mysqli_query($link, $query1) or die("Error" .mysqli_error($link));
if ($result)
{
	echo "Table type_of_outlets was created<br>";
}
mysqli_close($link);
?>

</body>
</html>