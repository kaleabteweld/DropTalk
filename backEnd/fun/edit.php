<?php

require("./functions.php");
require("./python_php.php");
require("./sql_include.php");

//$INIT = mysqli_connect("localhost","hotel_user","toor","data_hotel");
$INIT = mysqli_connect("localhost","pain","pain","LinkUp");

/*if ((isset($_GET["ID"]))) {*/


	

	if ((isset($_POST["ID"]))) {


		$Q = "SELECT * FROM main_events ";
		$t = mysqli_query($INIT,$Q);
		$t = mysqli_fetch_assoc($t);
		$key = array_keys($t);
		$c = 0;
		$TEMP = [];
		while ($c != len($key)) {


			// $temp = $_POST[$key[$c]];
			$temp = str_replace(" ","_",$_POST[$key[$c]]);
			print_r($temp);
			array_push($TEMP, $temp);
			$c++;
		}





		# code...


		//$temp  =  "UPDATE hotels SET Name = '{$name_P}', Rooms = '{$room_P}' WHERE ID = {$id_p}";
		$temp = update("main_events",$key,$TEMP,$TEMP[0]);
		echo $temp;
		echo "</br>";
		$output = mysqli_query( $INIT , $temp);
		echo $output;




}




/*}else{


			echo "no";
		}*/


 

// all set
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<title> hotel website booing edit </title>
	</head>


<body>

	<dir id="into_text">
		<h1>  hotel website booing edit</h1>
		</br>
	</dir>




<dir class="form">
<form action="edit.php" method = "post">

<label>
	<?php 


			$Q = "SELECT * FROM main_events ";
			$t = mysqli_query($INIT,$Q);
			$t = mysqli_fetch_assoc($t);
			$key = array_keys($t);
			//print_r($key);
			$c = 0;
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
	 

	 value=


	 <?php 

	 	if (isset($_GET["ID"])) {
	 		echo "{$_GET[$key[$c]]}";
	 	}

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