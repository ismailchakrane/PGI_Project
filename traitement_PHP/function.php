<?php 

//pour tester :
function debug($variable){
	
	echo '<pre>'. print_r($variable,true) . '</pre>';
}
//pour le token:
function str_random($length){

	$alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";

	return substr(str_shuffle(str_repeat($alphabet,$length)), 0, $length);
}



 


 
