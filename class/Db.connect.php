<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'ccgim');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

/*define('DB_HOST', '185.98.131.160');
define('DB_NAME', 'cabin2049018');
define('DB_USERNAME', 'cabin2049018');
define('DB_PASSWORD', 'fmpsf6wf9y');*/

function bdd(){
    try{
        $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USERNAME,DB_PASSWORD,array(
            PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'UTF8'",
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        ));
    }  catch (Exception $ex){
        die("Erreur :".$ex->getMessage());
        exit();
    }
    return $db;
}