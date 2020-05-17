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
		echo "Таблиця товарів:<br>";
		$a = "SELECT * from goods ORDER BY(id_goods)  " ;
		$result_n = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));

if($result_n)
{
	$num = mysqli_num_rows($result_n);
    echo "<table> <tr> <th> Id товару </th> <th> Товар </th> <tr> " ;
    
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
<a href="../input_goods.php" class="button21">Додати товар</a>
<a href="../delete_goods/first.php" class="button21">Видалити товар</a>
</body>
</html>