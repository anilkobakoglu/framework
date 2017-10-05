<?php 

namespace system\session;

class session{



public function __construct(){


		session_start();


	}//construct end


public function start($name,$value){




$_SESSION[$name] = $value;





}//start end


public function kosul($name){



	if(!(isset($_SESSION[$name]))){


		echo"lütfen giriş yapın";
		header("refresh:2 , login");
		exit;

	}//end if


}//end kosul


public function end(){

	session_destroy();

}//end end



}//class end