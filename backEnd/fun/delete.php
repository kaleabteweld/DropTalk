<?php 

require("./python_php.php");
require("./sql_include.php");

//$INIT = mysqli_connect("localhost","hotel_user","toor","data_hotel");
$INIT = mysqli_connect("localhost","pain","pain","datapstor");
if ((isset($_GET["ID"]))) {

$id = $_GET["ID"];
	# code...
	$temp = delete_from_table("allData",$id);
	echo $temp;
	echo "</br>";
	$output = mysqli_query( $INIT , $temp);
	echo $output;




}

 

// all set
?>