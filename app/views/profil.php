<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>profile</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1> MERHABA BURASI PROFİL SAYFASI</h1><br> <br>

	"<?php echo "$okulno"; ?>" nolu öğrenci giriş yapmıştır<br><br> <br>


<form action="resimgonder" method="post" enctype="multipart/form-data">
   <input type="file" name="dosya" />
   <input type="submit" value="Gönder" />
  
</form>


	<h3> <a href="<?= URL ?>/system/session/session_end.php">ÇIKIŞ YAP</a></h3>




</body>
</html>