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
	if(isset($_POST['date_from'])&&isset($_POST['date_to'])&&isset($_POST['goods'])&&isset($_POST['type'])){
		$date_fromh= $_POST['date_from'];
		$date_toh = $_POST['date_to'];
		$goodsh = $_POST['goods'];
		$typeh = $_POST['type'];
		echo "Мінімальна дата: $date_fromh<br>";
		echo "Максимальна дата: $date_toh<br>";
		echo "Товар: $goodsh<br>";
		echo "Тип торгової точки: $typeh<br>";
		$a = "SELECT goods.goods, type_of_outlets.type, SUM(customers.amount_goods) AS amount FROM customers JOIN goods ON goods.id_goods=customers.id_goods JOIN staff ON staff.id_staff = customers.id_staff JOIN outlets ON outlets.id_outlets=staff.id_outlets JOIN type_of_outlets ON type_of_outlets.id_of_type=outlets.id_of_type WHERE customers.data<='$date_toh' AND customers.data>='$data_fromh' AND goods.goods='$goodsh' AND type_of_outlets.type='$typeh' GROUP BY(goods.goods)";
		$result_n = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));

if($result_n)
{
	$num = mysqli_num_rows($result_n);
	echo "Кількість результатів: $num";
    echo "<table> <tr> <th> Товар </th><th> Тип торгової точки </th><th> Кількість</th> <tr> " ;
     
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
</div>
</body>
</html>