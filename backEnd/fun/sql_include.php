<?php
		require_once ("python_php.php");
		function  read($colom, $table_name,$order = ""){
		
		//echo "read";
	 		$read  =  "SELECT {$colom} FROM {$table_name}";
	 		if(len($order) >0){
	 		
	 			 		$read  =  "SELECT {$colom} FROM {$table_name} ORDER BY {$order} ";
	 			 				return mysql_real_escape_string($read);
	 		
	 		}
	 				//return mysql_real_escape_string($read);
	 		return $read;
	
	
}

		function  read_where($colom, $table_name ,$order = "" ,$where = ""){
			
			 		if($where  === ""){
	 				
	 				
	 				$read = read($colom,$table_name,$order);
	 				return mysql_real_escape_string($read);
	 			 
	 		
	 				}
			$read  =  "SELECT {$colom} FROM {$table_name} WHERE {$where}";
			 		if(len($order) >0){
	 		
	 			 		$read  =  "SELECT {$colom} FROM {$table_name} WHERE {$where} ORDER BY {$order} ";
				return mysql_real_escape_string($read);
	 		
	 		}
		
		
		
		}

		function  create_database($name){
		
		
				$read  =  "CREATE DATABASE IF NOT EXISTS {$name} DEFAULT CHARSET = utf8"; 
				return mysql_real_escape_string($read);
		}
		 		function  create_table($name,$colom_data,$id=1){
		
		
				if($id ===1){
				$n  =  0;
				$k  =  0;
				$read  =  "CREATE TABLE  {$name} (id int(11) NOT NULL AUTO_INCREMENT, ";
				while(!(len($colom_data===$n) )){
				
						$main = $colom_data[$n];
						$shit = $main[$k];
						$shit2 = $main[$k+1];
  						$read = $read."{$shit}  {$shit2} DEFAULT NULL, ";
 						$n++;
							if($n  === len($colom_data)){
									$read=$read. " PRIMARY KEY (id)) "; 
									break;
							}
				}
				}
				
				 				if($id ===0){
				$n  =  0;
				$k  =  0;
				$read  =  "CREATE TABLE  {$name}  ";
				while(!(len($colom_data===$n) )){
				
						$main = $colom_data[$n];
						$shit = $main[$k];
						$shit2 = $main[$k+1];
  						$read = $read."{$shit}  {$shit2} DEFAULT NULL, ";
 						$n++;
							if($n  === len($colom_data)){
								
									break;
							}
				}
				}
				return mysql_real_escape_string($read);
		}
		
		function insert($table,$value,$Row = null ){
		
				$read  =  "INSERT INTO {$table} VALUES (";
		
				$n  =  0;
		
				while(true)		
				{
				
						if(is_int($value[$n])){
						
								$read = $read."{$value[$n]}";
						
						}
						if(is_string($value[$n])){
						
								$read = $read."'{$value[$n]}'";
						
						}
						if(!($n===len($value)-1)){
						
							$read = $read.",";
							
						}
						$n++;
						if($n===len($value)){
							
							$read = $read.");";
							break;
						}
						
					}

				return  $read;
				}
				
				
		function update($table,$key,$value,$loc){
		
		 				
				$read  =  "UPDATE {$table} SET " ;

				$c = 0;
				while ($c != len($key)) {

					$s = "{$key[$c]} = '{$value[$c]}' ";
					$read = $read.$s;
					if($c == len($key)-1){
							$read = $read;

							//continue;

					}else{

							
							$read = $read." , ";

					}

					$c++;

				}


				$read = $read."WHERE ID = {$loc}";

				//$n = 0;
				//foreach($key_value as $a => $b){
				
				
					//	$read = $read."{$a} = '{$b}' ";
				
			//	}
				//$read  =  $read."{$loc}";
				return $read;
				
		
		}

	function delete_from_table($table,$loc = ""){
	
			$read  =  "DELETE FROM {$table} WHERE ID = {$loc}";
			if(len($loc)===0){
			
			 			$read  =  "DROP TABLE IF EXISTS {$table} LIMLT 1";
			 			return $read;
			 			
			}
			return  $read;
	}
	
	
 	function create_db($name){
	
	return "CREATE DATABASE {$name}";
	
	}
	
	function descrbe($tabel){
	
	return "DESCRIBE {$tabel}";
	
	}

	function list_tabel($tabel){
	
	return "SHOW TABEL STATUS";
	
	}
	function alter($mode = "a",$table,$name){
	
	if($mode === "a"){
	
			if(is_string($name)){
			
					$read = "ALTER TABLE {$table} ADD {$name};";
					return $read;
			
			}
			if(is_array($name)){
			
			$read = "ALTER TABLE {$table} ADD ";
			$n = 0;
			while($n >= 0){
			
					$shit = $name[$n];
					$read = $read.$shit." ";
					 $n = $n+1;

					if(len($name)===$n){
					
							break;
					
					}

			}
			 			return $read;
			}
	
	}
	if($mode === "d"){
			if(is_string($name)){
	
					$read = "ALTER TABLE {$table} DROP COLUMN {$name};";
					return $read;
					
			}else{
			
			return " ";
			}
	
	
	}
	if($mode === "c"){
	
			if(is_array($name)){
			 
			
			
							$read = "ALTER TABLE {$table} CHANGE ";
							$n = 0;
							while($n>=0){
							
									$shit = $name[$n];
									$n++;
									$read .= $shit." ";
									if(len($name)===$n){
									
											return $read;
											break;
									}
							}

					}
					}

			
		
	
	
	
	
	}
	function crlate_view_my($name,$data){
	
			$read = "CREATE VIEW {$name} AS SELECT ";
			if(is_array($data)){
			
					$n = 0;
					$column = [];
					$table = [];
					while($n>=0){
				
				
							$o = $data[$n];
							$temp = python_list($o[0]);
				            array_push($column, $o[1].".". $o[0]);
				            array_push($table,$o[1]);
							//$shit  = "SELECT {$o} FROM {$t} ";
							//$read .= $shit;
							$n++;
							if(len($data)===$n){
							
									$columns  =  implode(",",$column);
									$tables = implode(",", $table );
									$read .= $columns." FROM ".$tables.";";
									return $read;
									break;
							}
					
					}
			
			}
	
	
	
	
	}
	
	 	/*$colom = "Name,SurfaceArea,Population,LifeExpectancy";
		$table_name  =  "contury";
		$order = "Name";
		$where  =  "pop<10000";
		$name = "new_db";
		 $colom_data = [["name","TEXT"],["titel","TEXT"]];
		echo read( $colom, $table_name);
	 	echo "</br>";
		echo read( $colom, $table_name,$order);
		echo "</br>";
		echo read_where($colom, $table_name,$order,$where );
		echo "</br>";
		echo create_database($name);
		 echo "</br>";*/
		 //$colom_data = [["name","TEXT"],["titel","TEXT"]];
		// 		$name = "new_db";
	//	print  create_table($name,$colom_data);
		//echo len($colom_data);
	//	 echo "</br>";
	//print_r(update("kolo000","id = 3","id  = 1"));
		
 ?>