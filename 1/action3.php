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
	if(isset($_POST['data_from'])&&isset($_POST['data_to'])){
		$data_fromh= $_POST['data_from'];
		$data_toh= $_POST['data_to'];
		echo "Мінімальна дата:$data_fromh<br>";
		echo "Максимальна дата:$data_toh<br>";
		$a = "SELECT orders.id_order, outlets.name, providers.provider, goods.goods, orders.amount, orders.price, orders.data FROM orders, outlets, goods, providers WHERE orders.data<'$data_toh' AND orders.data>'$data_fromh' AND orders.id_provider=providers.id_provider AND goods.id_goods=orders.id_goods AND orders.id_outlets=outlets.id_outlets";
		$result_n = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));

if($result_n)
{
	$num = mysqli_num_rows($result_n);
	echo "Кількість результатів: $num";
    echo "<table> <tr> <th> Id </th> <th> Назва торгової точки </th> <th> Постачальник </th><th>Товар </th><th>Кількість товару</th><th>Ціна</th><th>Дата</th><tr> " ;    
    while ($row = mysqli_fetch_row ($result_n)) 
    {
    echo "<tr>";
        for ($j = 0 ; $j <10; ++$j)
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