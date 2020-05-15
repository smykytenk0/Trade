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
	if(isset($_POST['date_from'])&&isset($_POST['date_to'])&&isset($_POST['type'])){
		$date_fromh= $_POST['date_from'];
		$typeh= $_POST['type'];
		$date_toh = $_POST['date_to'];
		echo "Мінімальна дата: $date_fromh<br>";
		echo "Максимальна дата: $date_toh<br>";
		echo "Вказаний тип: $typeh<br>";
		$a = "SELECT customers.name, sum(customers.amount_goods) AS amount, type_of_outlets.type FROM customers JOIN staff ON staff.id_staff=customers.id_staff JOIN outlets ON outlets.id_outlets=staff.id_outlets JOIN type_of_outlets ON type_of_outlets.id_of_type=outlets.id_of_type WHERE customers.data<'$date_toh' AND customers.data>'$date_fromh' AND type_of_outlets.type='$typeh' GROUP BY(name)";
		$result_n = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));

if($result_n)
{
	$num = mysqli_num_rows($result_n);
	echo "Кількість результатів: $num";
    echo "<table> <tr> <th> Продавець </th><th> Продуктивність </th><th> Тип торгової точки </th> <tr> " ;
     
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