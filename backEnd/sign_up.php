<?php

session_start();

    function signUp ($name,$us_name,$email,$phon,$pass,$main){


        $pass = password_hash($pass,PASSWORD_BCRYPT);
        $string = "{$name}_{$us_name}_{$phon}_{$email}";
        $id = password_hash($string,PASSWORD_BCRYPT);

        $targetDir = "../uploads/users/users/{$name}/";

        if (is_dir($targetDir) ==FALSE) {
               
            mkdir($targetDir,0,TRUE);
        }


        copy("../uploads/users/users/DEFAULT/user-192.png","{$targetDir}user-192.png");
            
        $def = "{$targetDir}user-192.png";
        $def = str_replace("../","../DropTalk/",$def);

        $a = "insert into accounts (`user_id`,`name`,`us_name`,`password`,`phon_number`,`email`,`porfile_pic`) values ('{$id}','{$name}','{$us_name}','{$pass}','{$phon}','{$email}','{$def}');";
        $re = $main->sql_no_output($a);

        print_r($re);
       if((string) $re == "1"){

            $_SESSION["user_id"] = $id;
           
        }else{

             header("Location: ../index.html");
        }
        

    }
    



    if (isset($_POST)) {
        


        $name = $_POST['name'];
        $us_name = $_POST['us_name'];
        $email = $_POST['emaill'];
        $phon = $_POST['phon'];
        $pass = $_POST['pass'];


        require_once("/DropTalk_API.php");

        $main = new Ksql("localhost","pain","pain","droptalk_tast_1");
        signUp ($name,$us_name,$email,$phon,$pass,$main);
        header("Location: ../main.php");


    }else{

        echo "POST is not set";
    }


?>