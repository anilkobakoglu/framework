<?php 
namespace app\controllers;

use app\models\users;
use system\session\session;
use app\controllers\maincontroller;

class loginislemler extends maincontroller{


public $parola;
public $okulno;

public function loginislemler(){


	$this->parola=$_POST["parola"];
	$this->okulno=$_POST["okulno"];
	
	$users=(new users())->select();

	foreach ($users as $row) {
		

			if($this->parola==$row["parola"] and $this->okulno==$row["okulno"]){

				(new session())->start("okulno",$this->okulno);

				header("location: profil");
				exit();
			}//end if
			


				
			

	}//end foreach

	echo"böyle bir kullanıcı kulunmamaktadır lütfen terkar deneyin";
				header("refresh:2, login");
				exit();







}//function end




}//class end



 ?>