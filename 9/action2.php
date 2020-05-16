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
	if(isset($_POST['provider'])&&isset($_POST['goods'])&&isset($_POST['date_to'])&&isset($_POST['date_from'])){
		$goodsh = $_POST['goods'];
		$providerh = $_POST['provider'];
		$date_toh = $_POST['date_to'];
		$date_fromh = $_POST['date_from'];
		echo "Товар: $goodsh<br>";
		echo "Постачальник: $providerh<br>";
		echo "Мінімальна дата: $date_fromh<br>";
		echo "Максимальна дата: $date_toh<br>";
		$a = "SELECT outlets.name, providers.provider, goods.goods, orders.amount, orders.price, orders.data FROM orders JOIN outlets ON outlets.id_outlets=orders.id_outlets JOIN providers ON providers.id_provider=orders.id_provider JOIN goods ON goods.id_goods=orders.id_goods WHERE goods.goods='$goodsh' AND providers.provider='$providerh' AND orders.data<='$date_toh' AND orders.data>='$date_fromh'";
		$result_n = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));

if($result_n)
{
	$num = mysqli_num_rows($result_n);
	echo "Кількість результатів: $num";
    echo "<table> <tr> <th> Торгова точка </th><th> Постачальник </th><th> Товар </th><th> Кількість товару </th> <th> Ціна </th><th> Дата </th><tr> " ;
     
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