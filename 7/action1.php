<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php
require_once '../connection.php';
$link = mysqli_connect($host,$user,$password,$database) or die("Error" .mysqli_error($link));
	if(isset($_POST['date_from'])&&isset($_POST['date_to'])&&isset($_POST['goods'])){
		$date_fromh= $_POST['date_from'];
		$date_toh = $_POST['date_to'];
		$goodsh = $_POST['goods'];
		echo "Мінімальна дата: $date_fromh<br>";
		echo "Максимальна дата: $date_toh<br>";
		echo "Товар: $goodsh<br>";
		$a = "SELECT goods.goods, SUM(customers.amount_goods) AS amount FROM customers JOIN goods ON goods.id_goods=customers.id_goods WHERE customers.data<='$date_toh' AND customers.data>='$data_fromh' AND goods.goods='$goodsh' GROUP BY(goods.goods)";
		$result_n = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));

if($result_n)
{
	$num = mysqli_num_rows($result_n);
	echo "Кількість результатів: $num";
    echo "<table> <tr> <th> Товар </th><th> Кількість товару </th> <tr> " ;
     
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