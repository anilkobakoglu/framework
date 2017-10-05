<?php 

namespace app\controllers;

use app\models\users;
use system\session\session;




class kaydolislemler{


public $a;
private $okulno,$parola,$guvenlik;



	public function kaydolislemler(){
$this->a++;

echo $this->guvenlik;


		 $this->okulno=$_POST["okulno"];
		 $this->parola=$_POST["parola"];
	


		 $users=(new users())->select("okulno");

		foreach ($users as $row ) {
		
			if($this->okulno==$row["okulno"]){

				echo"Bu okulnumarası ile daha önce kayıt yapılmıştır lütfen yeni bir okul numarası deneyin";
				header("refresh:2 , kaydol");
				exit;

			}//end if

		}//end foreach

		 (new users())->insert(array("okulno"=>$this->okulno,"parola"=>$this->parola));

		 (new session())->start("okulno",$this->okulno);
		 echo"kaydınız başarı ile gerçekleştirilmiştir..";
		 header("refresh:2, profil");



	}//function end

}//class end