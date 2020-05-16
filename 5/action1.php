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
	if(isset($_POST['date_from'])&&isset($_POST['date_to'])){
		$date_fromh= $_POST['date_from'];
		$date_toh = $_POST['date_to'];
		echo "Мінімальна дата: $date_fromh<br>";
		echo "Максимальна дата: $date_toh<br>";
		$a = "SELECT staff.name, sum(customers.amount_goods) FROM customers JOIN staff ON staff.id_staff=customers.id_staff WHERE data<='$date_toh' AND data>='$date_fromh' GROUP BY(staff.name)";
		$result_n = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));

if($result_n)
{
	$num = mysqli_num_rows($result_n);
	echo "Кількість результатів: $num";
    echo "<table> <tr> <th> Продавець </th><th> Продуктивність </th> <tr> " ;
     
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