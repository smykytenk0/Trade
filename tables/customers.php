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
		$searchq= $_POST['search'];
		echo "Таблиця покупців:<br>";
		$a = "SELECT customers.id_purchase, customers.name, customers.age, customers.sex, staff.name, goods.goods, customers.amount_goods, customers.data FROM customers JOIN staff ON staff.id_staff=customers.id_staff JOIN goods ON goods.id_goods=customers.id_goods ORDER BY(customers.id_purchase)  " ;
		$result_n = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));

if($result_n)
{
	$num = mysqli_num_rows($result_n);
    echo "<table> <tr> <th> Id покупця </th> <th> Ім'я покупця </th> <th> Вік </th><th>Стать </th><th>Продавець</th><th>Товар</th><th>Кількість товару</th><th>Дата</th><tr> " ;
    
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
<a href="../input_customers.php" class="button21">Додати покупку</a>
<a href="../delete_customers/first.php" class="button21">Видалити покупку</a>

</body>
</html>