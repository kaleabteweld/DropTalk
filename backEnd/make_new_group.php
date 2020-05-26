<?php

    require_once("/DropTalk_API.php");
    $main = new dt("localhost","pain","pain","droptalk_tast_1");


    if (isset($_POST)) {
       
        if (isset($_POST['type'])) {
        
            $name = $_POST['name'];
            $temp = $main->cheak_name_if_exists("group_ref",$name,"group_name");
    
            if ($temp == "1") {
                echo "name_error";
            }else{
                echo "name_ok";
            }
    
        }elseif(!(( isset($_POST['type'])))){
    

            $targetDir = "../uploads/users/groups/{$_POST['name']}/";
            $def = $targetDir;
            //echo $targetDir;
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
                    $main->make_group([$_POST['name'],$_POST['bio'],"../DropTalk/uploads/users/groups/{$_POST['name']}/{$fileName}",$_SESSION["user_id"]]);
                    echo "group_ok";
                    header("Location: ../main.php?page=Group");
        
                }else{
        
                    echo "img_error";
                    header("Location: ../main.php?page=Group");
                }
            }else {
                
                session_start();

                echo copy("../uploads/users/groups/DEFAULT/user-192.png","{$def}user-192.png");
                
                $def = "{$def}user-192.png";
                $def = str_replace("../","../DropTalk/",$def);
                
                $main->make_group([$_POST['name'],$_POST['bio'],"{$def}",$_SESSION["user_id"]]);
                echo "group_ok";
                header("Location: ../main.php?page=Group");
            }


            


        }

    }












?>