<?php 

namespace system\database;

class config {


protected static $dbhost="localhost",$dbname="okuldeneme",$dbcharset="utf8",$dbuser="root",$dbpass="";










public function __toString(){

	return 	"veritabanı bağlantılarının yapıldığı sayfa";

}//end tostring

public function __call($name,$argument){


	echo  "'$name' adlı methot bu class ta bulunmamaktadır.";

}//end call


public function __set($name,$argument){



echo " Bu classa dışarıdan veri girmeniz yasaktır.<br> girdiğiniz değişken ismi= $name<br> girdiğiniz veri= $argument";

unset($name);
unset($argument);



}//end set




}//class end


