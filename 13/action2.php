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
	if(isset($_POST['goods'])&&isset($_POST['date_from'])&&isset($_POST['date_to'])&&isset($_POST['type'])){
		$goodsh = $_POST['goods'];
		$date_fromh = $_POST['date_from'];
		$date_toh = $_POST['date_to'];
		$typeh = $_POST['type'];
		echo "Товар: $goodsh<br>";
		echo "Тип торгової точки: $typeh<br>";
		echo "Мінімальна дата: $date_fromh<br>";
		echo "Максимальна дата: $date_toh<br>";
		$a = "SELECT customers.name, customers.age, customers.sex, staff.name, goods.goods, customers.amount_goods, customers.data FROM customers JOIN staff ON staff.id_staff=customers.id_staff JOIN goods ON goods.id_goods=customers.id_goods JOIN outlets ON outlets.id_outlets=staff.id_outlets JOIN type_of_outlets ON type_of_outlets.id_of_type=outlets.id_of_type WHERE customers.data<='$date_toh' AND customers.data>='$date_fromh' AND goods.goods='$goodsh' AND type_of_outlets.type='$typeh'";
		$result_b = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));
	
if($result_b)
{
	$num = mysqli_num_rows($result_b);
    echo "<table > <tr> <th> Покупець </th><th> Вік </th><th> Стать </th><th> Персонал </th><th> Товар </th><th> Кількість товару </th><th> Дата </th><tr> " ;
     
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
</body>
</html>