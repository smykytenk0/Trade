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
	if(isset($_POST['name'])){
		$nameh = $_POST['name'];
		echo "Назва торгової точки: $nameh<br>";
		$a = "SELECT outlets.name, sum(customers.amount_goods)/(sum(staff.sallary)+outlets.rent+outlets.utilities) FROM customers JOIN staff ON staff.id_staff=customers.id_staff JOIN outlets ON outlets.id_outlets=staff.id_outlets WHERE outlets.name='$nameh' GROUP BY(outlets.name)";
		$result_b = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));
	
if($result_b)
{
	$num = mysqli_num_rows($result_b);
    echo "<table> <tr> <th> Торгова точка </th><th> Рентабельність </th><tr> " ;
     
    while ($row = mysqli_fetch_row ($result_b)) 
    {
    echo "<tr>";
        for ($j = 0 ; $j < 8; ++$j)
         echo "<td> $row[$j] </td>";
    echo "</tr>";
    }

    echo " </table> ";
    mysqli_free_result($result_b);
}
		}
mysqli_close($link);
?>
</body>
</html>