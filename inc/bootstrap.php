<?php

spl_autoload_register('app_autoload');


function app_autoload($class){

    require "/opt/lampp/htdocs/PGI_Project/classes/$class.php";

}
