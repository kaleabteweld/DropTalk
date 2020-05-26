<?php

    require_once("/DropTalk_API.php");
    $main = new dt("localhost","pain","pain","droptalk_tast_1");


    if (isset($_POST)) {
       
        if (isset($_POST['type'])) {
        
            $name = $_POST['name'];
            $temp = $main->cheak_name_if_exists("channels_ref",$name,"channels_name");
    
            if ($temp == "1") {
                echo "channel_error";
            }else{
                echo "channel_ok";
            }
    
        }elseif(!(( isset($_POST['type'])))){
    

            $targetDir = "../uploads/users/channel/{$_POST['name']}/";
            echo $targetDir;
            if (is_dir($targetDir) ==FALSE) {
               
                mkdir($targetDir,0,TRUE);
            }



            $fileName = basename($_FILES["img"]["name"]);
            if (len($fileName) != 0) {
                
                $Dir = $targetDir . $fileName;

                $type = pathinfo($Dir,PATHINFO_EXTENSION);
    
    
                   
                $test = move_uploaded_file($_FILES["img"]["tmp_name"],$Dir);
                if ($test) {
                    
                    session_start();
                    $main->make_channels([$_POST['name'],$_POST['bio'],"../DropTalk/uploads/users/channel/{$_POST['name']}/{$fileName}",$_SESSION["user_id"]]);
                    echo "channel_ok";
                    header("Location: ../main.php?page=Channels");
        
                }else{
        
                    echo "img_error";
                    header("Location: ../main.php?page=Channels");
                }
            }else {
                
                session_start();
                $targetDir = "../DropTalk/uploads/users/channel/DEFAULT/user-192.png";
                $main->make_channels([$_POST['name'],$_POST['bio'],"{$targetDir}",$_SESSION["user_id"]]);
                echo "channel_ok";
                header("Location: ../main.php?page=Channels");
            }


            


        }

    }












?>