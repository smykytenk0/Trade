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
	if(isset($_POST['name'])&&isset($_POST['date_from'])&&isset($_POST['date_to'])){
		$nameh = $_POST['name'];
		$date_fromh = $_POST['date_from'];
		$date_toh = $_POST['date_to'];
		echo "Торгова точка: $nameh<br>";
		$a = "SELECT goods.goods, orders.amount, orders.data FROM orders JOIN goods ON goods.id_goods=orders.id_goods  JOIN outlets ON outlets.id_outlets=orders.id_outlets WHERE outlets.name='$nameh' AND orders.data<='$date_toh' AND orders.data>='$date_fromh'" ;
		$result_b = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));
		$n = "SELECT goods.goods, customers.amount_goods, customers.data FROM customers JOIN goods ON goods.id_goods=customers.id_goods JOIN staff ON staff.id_staff=customers.id_staff JOIN outlets ON outlets.id_outlets=staff.id_outlets WHERE outlets.name='$nameh' AND customers.data<='$date_toh' AND customers.data>='$date_fromh'";
		$result_n = mysqli_query($link, $n) or die("Ошибка " . mysqli_error($link));
	
if($result_b)
{
	$num = mysqli_num_rows($result_b);
	echo "Список замовлень:";
    echo "<table > <tr> <th> Товар </th><th> Кількість товару </th><th> Дата </th><tr> " ;
     
    while ($row = mysqli_fetch_row ($result_b)) 
    {
    echo "<tr>";
        for ($j = 0 ; $j < 5; $j++)
         echo "<td> $row[$j] </td>";
    echo "</tr>";
    }

    echo " </table> ";
    echo "<br>";
    mysqli_free_result($result_b);
}
if($result_n)
{
	$num = mysqli_num_rows($result_n);
	echo "Список продажей:";
    echo "<table > <tr> <th> Товар </th><th> Кількість товару </th><th> Дата </th><tr> " ;
     
    while ($row = mysqli_fetch_row ($result_n)) 
    {
    echo "<tr>";
        for ($j = 0 ; $j < 5; $j++)
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