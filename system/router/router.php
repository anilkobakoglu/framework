<?php
/*

Routing sisteminin gerçekleştiği kısım. 
Callbackler ile çalıştığımız sayfa url ile sayfalar arası yönlendirmeler yapmaya yarar.



*/

//include_once "vendor\autoload.php";


include_once"system/autoload.php";


class Router
{
    public static $dynUrl=[];
    private static $sayi=0;
    private static $explode;
    private static $joker;
    protected static $url;

    public static function __callStatic($name,$argument){

        echo" ' $name ' adlı methot ' router 'classında bulunmamaktadır!";



    }//callstatic end


    public function __construct($url)
    {
        self::$url = trim($url, "/");


        if (!function_exists('view')) { //view fonksiyonu yoksa oluşturuyoruz.
            function view($parametre, $vars = false)
            {
                restore_include_path();
                $vars ? extract($vars) : '';//gönderilen değişken varsa arraysa extract eder.
                include_once "app/views/$parametre.php";
            }

        }

    }





    protected static function mainRouter($url, $callback)
    {


        self::$sayi++;//url geldi yani var böylr bir url
        if(is_callable($callback)) //callbackse callbacki çalıştır
        {

            call_user_func($callback);
        }
        else
            {
            $classname = explode("@", $callback)[0];
            $methodname = explode("@", $callback)[1];
            $controlname="\\app\\controllers\\"."$classname"; // direkt classname yazınca aşağıda olmuyordu böyle bşir yol denedim

            if (class_exists($controlname))  // böyle bir clas varsa
            {
                // $b = new $controlname();

                return call_user_func_array(array(new $controlname(), $methodname), array(self::$url));
            }

            }
    }
    //get start
    public static function get($url, $callback)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') //url get ise
        {
            
            $url = ltrim($url, "/");//sol taraftaki slaşı siler

            if (array_filter(explode("/", self::$url)) == array_filter(explode("/", $url)))//url ile callback içindeli url slaşlardan temizlenip boşlukları kaldırılıp eşitmi diye bakılır
            {

                
                     Router::mainRouter($url, $callback);

            }
            else 
            {
                self::$explode = explode("/", $url);
                self::$joker = end(self::$explode);
                if (self::$joker == "*" && explode("/", $url)[0] == explode("/", self::$url)[0])
                {
          
                    Router::mainRouter($url, $callback);
                }
            }

            
        }



    }


    //post start
    public static function post($url,$callback){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $url=ltrim($url,"/");

            if(array_filter(explode("/",self::$url)) == array_filter(explode("/",$url))){


                Router::mainRouter($url, $callback);
            }
             else

            {
                self::$explode=explode("/",$url);
                self::$joker=end(self::$explode);
                if(self::$joker == "*" && explode("/",$url)[0]==explode("/",self::$url)[0]){

                    Router::mainRouter($url, $callback);
                }
            }
        }
    }
//post end


//error start
public static function error(){


  if(self::$sayi==0){

      return view("404");

   
  }
}

}