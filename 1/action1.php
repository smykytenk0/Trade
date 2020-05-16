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
	<div class="php"><?php
require_once '../connection.php';
$link = mysqli_connect($host,$user,$password,$database) or die("Error" .mysqli_error($link));
	if(isset($_POST['search'])){
		$searchq= $_POST['search'];
		echo "Пошуковий запит: $searchq<br>";
		$a = "SELECT orders.id_order, outlets.name, providers.provider, goods.goods, orders.amount, orders.price, orders.data FROM orders,providers,outlets, goods  WHERE orders.id_goods=(SELECT id_goods FROM goods WHERE goods='$searchq' AND orders.id_provider=providers.id_provider)AND goods.id_goods=orders.id_goods AND outlets.id_outlets = orders.id_outlets";
		$result_n = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));

if($result_n)
{
	$num = mysqli_num_rows($result_n);
	echo "Кількість результатів: $num";
    echo "<table> <tr> <th> Id </th> <th> Назва торгової точки </th> <th> Постачальник </th><th>Товар </th><th>Кількість товару</th><th>Ціна</th><th>Дата</th><tr> " ;
    
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
?></div>
</body>
</html>