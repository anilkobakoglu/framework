<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>kişi bilgileri</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div align=center><h2>kişi bilgileri</h2></div>
<pre>
	<table border="1" align=center>
		
<?php 
$sayac=0;
foreach($users as $row){

$okulno= $row["okulno"];
$parola= $row["parola"];
$id= $row["ogrenci_id"];
$mail= $row["mail"];
$sayac++;

echo"<tr> <td align=Center>$sayac </td> </tr><tr><td>öğrenci okulnumarası=$okulno<br>öğrenciparolası=$parola<br>öğrenci id= $id<br>öğrenci mail adres= $mail</tr></td>";
}


?>



	</table>
</pre>
	<div align=center> <a href="<?= URL ?>"> ANASAYFA </a>
</body></div>
</html>