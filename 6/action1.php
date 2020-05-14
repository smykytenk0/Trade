<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php
require_once '../connection.php';
$link = mysqli_connect($host,$user,$password,$database) or die("Error" .mysqli_error($link));
	if(isset($_POST['date_from'])&&isset($_POST['date_to'])&&isset($_POST['outlet'])&&isset($_POST['name'])){
		$date_fromh= $_POST['date_from'];
		$date_toh = $_POST['date_to'];
		$outleth = $_POST['outlet'];
		$nameh = $_POST['name'];
		echo "Мінімальна дата: $date_fromh<br>";
		echo "Максимальна дата: $date_toh<br>";
		echo "Назва торгової точки: $outleth<br>";
		echo "Продавець: $nameh<br>";
		$a = "SELECT staff.name, outlets.name, sum(customers.amount_goods) as sum FROM customers JOIN staff ON customers.id_staff=staff.id_staff JOIN outlets ON outlets.id_outlets=staff.id_outlets WHERE customers.data>='$date_fromh' AND customers.data<='$date_toh' AND outlets.name = '$outleth' AND staff.name='$nameh' GROUP BY(staff.name)";
		$result_n = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));

if($result_n)
{
	$num = mysqli_num_rows($result_n);
	echo "Кількість результатів: $num";
    echo "<table> <tr> <th> Продавець </th><th> Торгова точка </th><th> Продуктивність </th> <tr> " ;
     
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