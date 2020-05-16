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
	if(isset($_POST['customers'])){
		$customersh = $_POST['customers'];
		$a = "SELECT customers.name, customers.age, customers.sex, SUM(customers.amount_goods) AS amount FROM customers GROUP BY(customers.name) ORDER BY amount DESC LIMIT $customersh" ;
		$result_b = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));
	
if($result_b)
{
	$num = mysqli_num_rows($result_b);
	if($num<$customersh){
		echo "Кількість покупців: $num<br>";
	}
	else{
		echo "Кількість покупців: $customersh<br>";
	}
    echo "<table > <tr> <th> Покупець </th><th> Вік </th><th> Стать </th><th> Кількість товару </th><tr> " ;
     
    while ($row = mysqli_fetch_row ($result_b)) 
    {
    echo "<tr>";
        for ($j = 0 ; $j < 5; $j++)
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