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
	<?php
require_once '../connection.php';
$link = mysqli_connect($host,$user,$password,$database) or die("Error" .mysqli_error($link));
		echo "Таблиця замовлень:<br>";
		$a = "SELECT orders.id_order, outlets.name, providers.provider, goods.goods, orders.amount, orders.price, orders.data FROM orders JOIN outlets ON outlets.id_outlets=orders.id_outlets JOIN providers ON providers.id_provider=orders.id_provider JOIN goods ON goods.id_goods=orders.id_goods ORDER BY(orders.id_order) " ;
		$result_n = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));

if($result_n)
{
	$num = mysqli_num_rows($result_n);
    echo "<table> <tr> <th> Id замовлення </th> <th> Назва торгової точки </th> <th> Постачальник </th><th>Товар </th><th>Кількість товару</th><th>Ціна</th><th>Дата</th><tr> " ;
    
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

mysqli_close($link);
?>
<a href="../input_orders.php" class="button21">Додати замовлення</a>
<a href="../delete_orders/first.php" class="button21">Видалити замовлення</a>
</body>
</html>