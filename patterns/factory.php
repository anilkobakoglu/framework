<?php 

namespace patterns;




class factory{

private static $classname;

 

	static function appload($class=false){

     $controlname="\\app\\controllers\\"."$class";
    
     if(class_exists($controlname)){


			self::$classname="app\\controllers\\$class";//namespace'i

			return new self::$classname;


     	}//end if


     else{

			echo "' <font color=red> $class </font> ' adlı class App klasoründe bulunmamaktadır. Class ismini gözden geçirin.Aşağıda class isimleri yazmaktadır";

			$dizin = opendir('app/controllers');
			
			while($dosya = readdir($dizin))
			{
   			
   			echo $dosya . ' <br/>';
   			
   			}//while end


		

   		 }//end else


	}//Appload function end


}//factroy class end


