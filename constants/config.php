<?php
session_start();


// create constants to store non repeating values
define('SETURL','http://localhost/food/');
define('LOCALHOST','localhost');

define('DB_USERNAME' ,'root');

define('DB_PASSWORD','');

define('DB_NAME','food');

$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

if(!$conn){

	echo 'Error connecting to the server';
}

?>

