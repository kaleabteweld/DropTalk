<?php

    
    session_start();


    if (isset($_POST)) {
        


        $data = $_POST['email'];
        $pass = $_POST['pass'];

        require_once("/DropTalk_API.php");

        $main = new Ksql("localhost","pain","pain","droptalk_tast_1");
        $main->setTabel("accounts");

        $a = "select password from accounts where email = '{$data}'";
        $re = $main->sql($a);

        if(len($re) != 0){

            echo "email_ok,";

            $a = "select password from accounts where  email = '{$data}'; ";
            $re = $main->sql($a);

            if (password_verify($pass,$re[0][0])) {

                echo "pass_ok";    
                
                $a = "select user_id from accounts where password = '{$re[0][0]}' and email = '{$data}'; ";
                $re = $main->sql($a);


                $user_id = $re[0][0];
                $_SESSION["user_id"] = $user_id;

                if (!(isset($_POST["js"]))) {
                    header("Location: ../main.php");
                }
                
                //echo",ok";

            }else{

                echo "pass_error";  
            }


        }else{

            echo "email_error";
            
        }
        
    }else{

        echo "POST is not set";
    }


?>