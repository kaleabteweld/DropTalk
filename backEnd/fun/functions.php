<?php

Function connect_sql(){

$host_name = "localhost";
$host_user_name = "pain";
$host_password = "pain";
$host_db_name = "word";
$connection = mysqli( $host_name, $host_user_name, $host_password, $host_db_name);
if(isset($connection)){

    // good to go
    return $connection;
}else{

    //error
    die("error ".mysql_error);
}

}





?>