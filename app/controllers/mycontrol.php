<?php 



namespace app\controllers;

use app\controllers\maincontroller;

use app\models\users;
use system\session\session;





class mycontrol extends maincontroller
{


    public function anasayfa($routerurl = false)
    {
     
  
   		
        return view("anasayfa",compact("a"));
        
    }//anasayfa end




    public function login(){


	return view("login");

    }//login end




    public function profil(){

		(new session())->kosul("okulno");

		$okulno=$_SESSION["okulno"];

		return view("profil",compact("okulno"));

    }//profil end


   public function kaydol(){


       
   

        return view("kaydol");

    }//kaydol end

 public function kisiler(){


       
        (new session())->end();
        
         echo"<pre>";
         $kisiler=(new users())->select("okulno");
   

        return view("kisiler",compact("kisiler"));

    }//kaydol end

 function form(Request $request){

echo"<pre>";
echo "merhaba";

}//form end
   




}//class end