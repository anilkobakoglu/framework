<?php 



include_once"system/autoload.php";

class mainRouter {

	protected static $sayi=0;
	protected static $sayi2;




public function __construct(){

	




			function view($file,$degisken=false){

			
				
				$degisken ? extract($degisken) : '';
				include_once"app/views/$file.php";


		


		}//end function
	}//end contruct


	public static function mainRouter($url,$callback){

	

		self::$sayi++;
			echo self::$sayi;

		if(is_callable($callback)){


				call_user_func($callback);


		}//end if

	

		else {


			$classname=explode("@",$callback)[0];
			$methodname=explode("@",$callback)[1];
			$controlname="app\\controllers\\$classname";

				if(class_exists($controlname)){

				
					return call_user_func(array(new $controlname(), $methodname));

				}//end if 

				else echo"böyle bir class yok";



		
			}//else end
	}//function end





}//class end