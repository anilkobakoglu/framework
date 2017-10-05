<?php 

namespace app\controllers;
use app\models\users;
use app\controllers\maincontroller;


class kisibilgileri{


		



public static function kisibilgileri($okulno,$baslik=false){






$users=(new users())->where("okulno",$okulno)->select();
if($users){

	return view("kisibilgileri",compact("users"));
}//end if
else {
	return view("404");

}//else end



}//function end


}//class end




?>