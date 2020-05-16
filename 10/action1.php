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
	if(isset($_POST['type'])){
		$typeh = $_POST['type'];
		echo "Тип торгової точки: $typeh<br>";
		$a = "SELECT outlets.name, sum(customers.amount_goods)/outlets.number_of_sections FROM customers JOIN staff ON staff.id_staff=customers.id_staff JOIN outlets ON outlets.id_outlets=staff.id_outlets JOIN type_of_outlets ON type_of_outlets.id_of_type=outlets.id_of_type WHERE type_of_outlets.type='$typeh' GROUP BY (outlets.name)";
		$result_b = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));
	
if($result_b)
{
	$num = mysqli_num_rows($result_b);
    echo "<table> <tr> <th> Торгова точка </th><th> Відношення* </th><tr> " ;
     
    while ($row = mysqli_fetch_row ($result_b)) 
    {
    echo "<tr>";
        for ($j = 0 ; $j < 8; ++$j)
         echo "<td> $row[$j] </td>";
    echo "</tr>";
    }

    echo " </table> ";
    echo"*Під відношенням мається на увазі відношення проданих товарів до кількості залів";
    mysqli_free_result($result_b);
}
		}
mysqli_close($link);
?>
</div>
</body>
</html>