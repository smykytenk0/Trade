<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php
require_once '../connection.php';
$link = mysqli_connect($host,$user,$password,$database) or die("Error" .mysqli_error($link));
	if(isset($_POST['amount'])){
		$amounth= $_POST['amount'];
		echo "Мінімальна кількість:$amounth<br>";
		$a = "SELECT customers.id_purchase, customers.name, customers.age, customers.sex, staff.name, goods.goods, customers.amount_goods, customers.data FROM customers, staff, goods WHERE goods.id_goods=customers.id_goods AND customers.id_staff=staff.id_staff AND customers.amount_goods>='$amounth'";	
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