<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php
require_once '../connection.php';
$link = mysqli_connect($host,$user,$password,$database) or die("Error" .mysqli_error($link));
	if(isset($_POST['provider'])&&isset($_POST['goods'])){
		$goodsh = $_POST['goods'];
		$providerh = $_POST['provider'];
		echo "Товар: $goodsh<br>";
		echo "Постачальник: $providerh<br>";
		$a = "SELECT outlets.name, providers.provider, goods.goods, orders.amount, orders.price, orders.data FROM orders JOIN outlets ON outlets.id_outlets=orders.id_outlets JOIN providers ON providers.id_provider=orders.id_provider JOIN goods ON goods.id_goods=orders.id_goods WHERE goods.goods='$goodsh' AND providers.provider='$providerh'";
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
</body>
</html>