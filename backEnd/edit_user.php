<?php

    require("/DropTalk_API.php");
    require_once("/fun/python_php.php");
    session_start();
    $main = new dt("localhost","pain","pain","droptalk_tast_1");


   


    if (isset($_POST)) {

        print_r($_POST);
        
        $user_new_name = $_POST["name"];
        $user_new_us_name = $_POST["us_name"];
        $user_new_email = $_POST["emaill"];
        $user_new_phon_number = $_POST["phon"];
        $bio = $_POST["bio"];
        $user_old_password = $_POST["old_pass"];
        $user_new_password = $_POST["passs"];

        $main->edit_user([$user_new_name,$user_new_us_name,$user_new_email,$user_new_phon_number,$bio,$user_old_password,$user_new_password,$_SESSION["user_id"]]);
        print_r($main->get_sql_raw());
        $temp = $main->get_sql_raw();
        
        if( len($temp) != 0 ){
           
           //$temp[0] = "";
           echo $temp;
           $temp = (string) $temp;
           $link = "../settings.php?error={$temp}";
           echo $link;
           header("Location: {$link}");

        }else{

            header("Location: ../settings.php");
            echo "ok";

        }




    } else {
        
    }
    



    


?>