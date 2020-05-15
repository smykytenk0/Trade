<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css.css">
</head>
<body>
	<?php
require_once '../connection.php';
$link = mysqli_connect($host,$user,$password,$database) or die("Error" .mysqli_error($link));
	if(isset($_POST['type'])){
		$typeh = $_POST['type'];
		echo "Тип торгової точки: $typeh<br>";
		$a = "SELECT staff.position,staff.name,staff.sallary FROM staff JOIN outlets ON outlets.id_outlets=staff.id_outlets JOIN type_of_outlets ON type_of_outlets.id_of_type=outlets.id_of_type WHERE type_of_outlets.type='$typeh'";
		$result_n = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));

if($result_n)
{
	$num = mysqli_num_rows($result_n);
	echo "Кількість результатів: $num";
    echo "<table> <tr> <th> Посада </th><th> Ім'я </th><th> Заробітна плата </th> <tr> " ;
     
    while ($row = mysqli_fetch_row ($result_n)) 
    {
    echo "<tr>";
        for ($j = 0 ; $j < 8; ++$j)
         echo "<td> $row[$j] </td>";
    echo "</tr>";
    }

    echo " </table> ";
    mysqli_free_result($result_n);
}

		}
mysqli_close($link);
?>
</body>
</html>