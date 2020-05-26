<?php
function len($a){

$type = "";
$len =0;

if (is_numeric($a)){
		$temp = (string) $a;
		
		$len = strlen($temp);
		 return $len;
		 
if (is_float($a)){
		$len = $len-1;
}
//$type = "numeric";
		return $len;
}
if (is_string($a)){
//$type = "string";
		$len = strlen($a);
		//echo $len;
		 return $len;
}
if (is_array($a)){
//$type="array";
		$len=count($a);
		 return $len;
}
//echo $type;
else{
	return null;
}
	return $len;

}


function  python_list($a){

$_list = [];


if (is_string($a)){

		$length = len($a);
	
		$n = 0;
while ($n != $length){

		
		array_push($_list,$a[$n]);
		$n++;


}


}
/*if (is_int($a)){
		echo "& "."\n";
		$length = len($a);
	     echo $a;
		$n = 0;
while ($n != $length){

		echo $a[$n];
		array_push($_list,$a[$n]);
		$n++;


}

}*/
else{

	return null;
}

	return  $_list;


}


function  str($a){

$res  = "";

if (is_numeric($a)){
		$res= (string) $a;
     	return $res;
		
}
if (is_string($a)){
//$type = "string";
		return  $a;
}
if (is_array($a)){
//$type="array";
	//	echo gettype(array_keys($a)[1]);
	
		$temp = "";
		$n  =  0;
		$key = array_keys($a);
		while(!($n===len($a))){
			
			$m = $key[$n];
			$t = $a[$m];
			//echo gettype($t);
			if(is_int($t)){
						$t = (string) $t;
			 			$temp .= $t;
						$n++;
			}
			if(is_string($t)){
			
			 			$temp .= $t;
			     		$n++;
			}
			

			} 			


		//$temp = implode($a," ");
		return $temp;
}
//echo $type;

	return $res;

}
function  redir($new_link)
{
				header("Location : {$new_link}");
				exit;

}


?>