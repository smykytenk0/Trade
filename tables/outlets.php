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
		echo "Таблиця торгових точок:<br>";
		$a = "SELECT outlets.id_outlets,type_of_outlets.type,outlets.name, outlets.number_of_sections, outlets.manager, outlets.number_of_counters, outlets.rent, outlets.square, outlets.utilities FROM outlets JOIN type_of_outlets ON type_of_outlets.id_of_type = outlets.id_of_type" ;
		$result_n = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));

if($result_n)
{
	$num = mysqli_num_rows($result_n);
    echo "<table> <tr> <th> Id  </th> <th> Тип </th> <th> Назва </th><th>Кількість секцій </th><th>Менеджер</th><th>Кількість продавців</th><th>Вартість оренди</th><th>Площа</th><th>Комунальні послуги</th><tr> " ;
    
    while ($row = mysqli_fetch_row ($result_n)) 
    {
    echo "<tr>";
        for ($j = 0 ; $j < 9; ++$j)
         echo "<td> $row[$j] </td>";
    echo "</tr>";
    }

    echo " </table> ";
    mysqli_free_result($result_n);
}

mysqli_close($link);
?>
<a href="../input_outlet.php" class="button21">Додати торгову точку</a>
<a href="../delete_outlets/first.php" class="button21">Видалити торгову точку</a>
</body>
</html>