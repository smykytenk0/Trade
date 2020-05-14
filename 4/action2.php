<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php
require_once '../connection.php';
$link = mysqli_connect($host,$user,$password,$database) or die("Error" .mysqli_error($link));
	if(isset($_POST['goods'])&&isset($_POST['type'])){
		$searchq= $_POST['goods'];
		$typeh= $_POST['type'];
		echo "Пошуковий запит товару: $searchq<br>";
		echo "Пошуковий запит типу торгової точки: $typeh<br>";
		$a = "SELECT goods.goods, SUM(orders.amount) as amount, orders.price, type_of_outlets.type FROM orders JOIN goods ON goods.id_goods = orders.id_goods  JOIN outlets ON outlets.id_outlets=orders.id_outlets JOIN type_of_outlets ON type_of_outlets.id_of_type=outlets.id_of_type WHERE orders.id_goods=(SELECT id_goods FROM goods WHERE goods='$searchq') AND type_of_outlets.type='$typeh'  GROUP BY(goods.goods)";
		$result_n = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));

if($result_n)
{
	$num = mysqli_num_rows($result_n);
	echo "Кількість результатів: $num";
    echo "<table> <tr> <th> Залишок </th> <th> Ціна </th> <th> Товар </th><th> Тип торгової точки </th><tr> " ;
     
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