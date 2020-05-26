<?php


require("./python_php.php");
require("./sql_include.php");

//$INIT = mysqli_connect("localhost","hotel_user","toor","data_hotel");
$INIT = mysqli_connect("localhost","pain","pain","LinkUp");
//$temp = insert("hotels",["1","A1","21,13,142,222"]);
//echo $temp;
//$output = mysqli_query( $INIT , $temp);
//echo $output;
if ((isset($_POST["event_name"]))) {


		$Q = "SELECT * FROM main_events ";
		$t = mysqli_query($INIT,$Q);
		$t = mysqli_fetch_assoc($t);
		$key = array_keys($t);
		$c = 1;
		$TEMP = [];
		while ($c != len($key)) {


			// $temp = $_POST[$key[$c]];
			$temp = str_replace(" ","_",$_POST[$key[$c]]);
			//print_r($temp);
			array_push($TEMP, $temp);
			$c++;
		}

		if ((isset($TEMP))) {
			# code...
			print_r($TEMP);
			$temp = insert("main_events (`event_name`, `event_date`, `event_time`, `event_loc`, `event_info`) ",$TEMP);
			echo $temp;
			echo "</br>";
			$output = mysqli_query( $INIT , $temp);
			//echo $output;

		}
}
else{


	echo "nooooo";
}

 

// all set
?>




<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<title> hotel website booing ADD </title>
	</head>


<body>

	<dir id="into_text">
		<h1>  lk ADD</h1>
		</br>
	</dir>




<dir class="form">
<form action="add.php" method = "post">

<label>
	<?php 


			$Q = "SELECT * FROM main_events ";
			$t = mysqli_query($INIT,$Q);
			$t = mysqli_fetch_assoc($t);
			$key = array_keys($t);
			//print_r($key);
			$c = 1;
			while ($c != len($key)) {

	 ?>

	<?php 

		echo $key[$c];
	 ?>
	 	
	 </label>
	</br>
	<input type="text" name=

	<?php 

		echo "{$key[$c]}";

	 ?> 
	 /> 
	</br>


	<?php 
	$c = $c + 1;
		}
	 ?>

	 </br>
	<input type="submit" name="submit" value="submit"/>
	
	

</form>
</dir>




</body>




<?php


mysqli_close($INIT);

?>


</html>