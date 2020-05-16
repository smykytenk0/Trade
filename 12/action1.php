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
	if(isset($_POST['number'])){
		$numberh = $_POST['number'];
		echo "Номер договору: $numberh<br>";
		$a = "SELECT outlets.name, providers.provider, goods.goods, orders.amount, orders.price, orders.data FROM orders JOIN outlets ON outlets.id_outlets=orders.id_outlets JOIN providers ON providers.id_provider=orders.id_provider JOIN goods ON goods.id_goods=orders.id_goods WHERE orders.id_order='$numberh'";
		$result_b = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));
	
if($result_b)
{
	$num = mysqli_num_rows($result_b);
    echo "<table > <tr> <th> Торгова точка </th><th> Постачальник </th><th> Товар </th><th> Кількість </th><th> Ціна </th><th> Дата </th><tr> " ;
     
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
</div>
</body>
</html>