<?php 

	


include_once"vendor/autoload.php";


define("URL", "http://localhost/");


include_once"system/router/router.php";
@new router($_GET["url"]);



include_once"system/router/web.php";

/*use patterns\factory;

$ako=factory::appload("ako");
echo $ako->ako();
*/


?>

