<?php

namespace patterns;

class deneme {

private static $instance;

public function __construct(){



echo"merhaba burası deneme classı";

}

public function singletion(){



	if(!self::$instance){

		self::$instance=new self();
	}// end if

			return self::$instance

}//singletion end


public function bir(){


	return "bir";
}

public function iki(){

	return"iki";
}


}//class end


$a=deneme::singletion();
$a->bir();
$b->iki();
$a=deneme::singletion();
$c->bir();











?>