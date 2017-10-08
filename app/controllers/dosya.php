<?php 


namespace app\controllers;

use system\session\session;
use app\models\resimler;



class dosya{



public function resim(){


	if(isset($_FILES['dosya']))
	{


		(new session())->kosul("okulno");
		$kim=$_SESSION['okulno'];

		


		/*


			$_FILES["file"]["error"]
			Dosya yüklenmesinde eğer bir sorun ile karşılaşıldıysa karşılaşılan sorunu varsa  1 yoksa 0 
			$_FILES["file"]["name"]
			Yüklediğimiz dosyanın adını..örnek: resim.jpg
			$_FILES["file"]["type"]
			Yüklenilen dosyanın türünü
			$_FILES["file"]["size"]
			Yüklediğimiz dosyanın büyüklüğünü
			$_FILES["file"]["tmp_name"]
			Yüklediğimiz dosyanın sunucu tarafından oluşturulan geçici kopyasının adını bizlere vermektedir.

		*/

	     $isim= $_FILES['dosya']['name'];
		 $tip= $_FILES['dosya']['type'];
		 $boyut=$_FILES['dosya']['size'];
		 $hata=$_FILES['dosya']['error'];


		$a=explode(".",$isim); //son karakteri alıyoruz jpeg mi diye
		$uzanti=end($a);


		$harf=array('ad','po','iu','ax','ir','xs','gk','zq','wy','fi','mr','cv','do','re','mi','lp','si');
		$sayi=rand(1,100000);
	    $son=substr($isim,-4,4);//son dört karakteri alır
	    $yeniad="public/images/".$harf[array_rand($harf,1)].$sayi.$harf[array_rand($harf,1)].$sayi.$son;//rastgele isim oluşturdurk çakışma olmasın diye 
	    //örnek: ir95561ax95561.jpg
	   
	

		







		if($hata!=0){

			echo"dosya yüklenirken bir hata oluştu"; die();
		}

		else{

				if($boyut>(1024*1024*3)){
					echo"dosya boyutu 3 mb den fazla"; die();
				}


			else {
			

					if($uzanti!='jpg' || $tip!='image/jpeg'){
						echo"Dosya türü JPEG olmalı"; die();
					}

					else{

						$dosya = $_FILES['dosya']['tmp_name'];

					
						if(move_uploaded_file($_FILES["dosya"]["tmp_name"],$yeniad))


						(new resimler())->insert(array("kimden"=>$kim,"resim_adi"=>$yeniad));
						echo 'Dosyanız upload edildi!';
						header("refresh:2 anasayfa");



					}

			}
		}
	
		


	}//end first if

	else 
	{
		echo"gelmedi";
	}



}//resim  function end






}//class end


?>