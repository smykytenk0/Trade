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
	if(isset($_POST['search'])&&isset($_POST['date_to'])&&isset($_POST['date_from'])){
		$searchq= $_POST['search'];
		$date_toh=$_POST['date_to'];
		$date_fromh=$_POST['date_from'];
		echo "Пошуковий запит: $searchq<br>";
		$a = "SELECT customers.id_purchase, customers.name, customers.age, customers.sex, staff.name, goods.goods, customers.amount_goods, customers.data FROM customers, staff, goods WHERE customers.id_goods=(SELECT id_goods from goods WHERE goods='$searchq') AND customers.data<'$date_toh' AND customers.data>'$data_fromh' AND goods.id_goods=customers.id_goods AND customers.id_staff=staff.id_staff";	
		$result_n = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));

if($result_n)
{
	$num = mysqli_num_rows($result_n);
	echo "Кількість результатів: $num";
    echo "<table> <tr> <th> Id </th> <th> Ім'я покупця </th> <th> Вік </th><th>Стать </th><th>Продавець </th><th> Товар </th><th>Кількість товару </th><th>Дата </th><tr> " ;
    
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