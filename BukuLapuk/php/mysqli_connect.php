<?php

//define constant vars
define('DB_NAME','BukuLapukdb');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_HOST','localhost');

try{

    //connection var
    $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    //encoded language
    mysqli_set_charset($con, 'utf8');

    
}
catch(Exception $ex){
    //if try error
    print "An Exception occured. Message".$ex->getMessage();
}
//misal mau nampilin error lagi
catch(Exception $e){
    print "The system is busy please try again later";
}