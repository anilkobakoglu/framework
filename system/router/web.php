<?php
/**

Hangi url de hangi sınıfın hangi fonksiyonunu kullanacağımızı seçiyoruz bir bakıma hangi url ile hangi sayfa..
 */







use app\controllers\kisibilgileri;	





Router::get("/anasayfa/","mycontrol@anasayfa");
Router::get("/","mycontrol@anasayfa");

router::get("login/","mycontrol@login");
router::get("profil/","mycontrol@profil");
router::get("kaydol/","mycontrol@kaydol");

router::get("kisiler/","mycontrol@kisiler");
//router::get("kisibilgileri/*","kisibilgileri@kisibilgileri");



router::get("kisibilgileri/*",function(){


$url= $_SERVER['REQUEST_URI'];
@$classname=explode("/",$url)[1];
@$parametre=explode("/",$url)[2];
@$methodname=explode("/",$url)[3];



(new kisibilgileri())->kisibilgileri($parametre,$methodname);

});




router::post("loginislemler/","loginislemler@loginislemler");
router::post("kaydol/","mycontrol@kaydol");
router::post("kaydolislemler/","kaydolislemler@kaydolislemler");









router::error();// en sonda olması lazım.. sebebi hiç biri gelmezse bu devreye girecek.







