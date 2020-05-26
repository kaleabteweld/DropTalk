<?php

session_start();

    if (isset($_POST)) {
        


        $name = $_POST['name'];
        $us_name = $_POST['us_name'];
        $email = $_POST['email'];
        $phon = $_POST['phon'];
        $pass = $_POST['pass'];


        require_once("/DropTalk_API.php");

        $main = new Ksql("localhost","pain","pain","droptalk_tast_1");
        $main->setTabel("accounts");

        $a = "select us_name from accounts where us_name = '{$us_name}'";
        $re = $main->sql($a);

        if(len($re) == 0){

            echo "us_name_ok,";

            $a = "select email from accounts where email = '{$email}'";
            $re = $main->sql($a);

            if(len($re) == 0){

                echo "email_ok,";

                $a = "select phon_number from accounts where phon_number = '{$phon}'";
                $re = $main->sql($a);

                if(len($re) == 0){

                    echo "phon_ok,";
                    echo "1";
                    
                
                }else{

                    echo "phon_error,";
                }


            }else{ echo "email_error,"; }


        }else{ echo "us_name_error,"; }
        






    }else{

        echo "POST is not set";
    }


?>