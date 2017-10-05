<?php



namespace app\controllers;


class maincontroller
{


    public function __construct(){

         function view($file,$degisken=false){

            is_array($degisken) ? extract($degisken): ''; // değişken arraysa extract ediyor

            include_once "app/views/$file.php";

        }




    }

}