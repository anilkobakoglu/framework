<?php 

include_once "fonksiyon.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>kisiler</title>
	<link rel="stylesheet" href="">
</head>
<body>

<h1> KİŞİ LİSTESİ</h1>
	<pre> 
	<?php 
	echo"<h4>  ögrenci numaraları</h4>";
	 foreach($kisiler as $row){



	$id=$row["okulno"];
	$baslik=seolink("bu örnek bir başlıktır yandaki de örnek bir id okulno olarak alındı");

	 	echo "<br> <a href='/kisibilgileri/$id/$baslik'> kişi bilgileri için tıkla </a>".$row[0];
	

	 }//end foreach


	 ?>



</body>
</html>