<?php
session_start();

if(!(isset($_SESSION["user_id"]))){

    header("Location: index.html");
    
}
if(!(isset($_GET["id"]))){

    header("Location: index.html");
    
}

$user_id = $_GET["id"];


require_once("/backEnd/DropTalk_API.php");
$main = new dt("localhost","pain","pain","droptalk_tast_1");

require("/backEnd/put_php_in_html.php");
$phml = new phml();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../DropTalk/Thid Party/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../DropTalk/css/Settings.css" rel="stylesheet">
    <link href="../DropTalk/css/main/Group.css" rel="stylesheet">

    <title>info</title>

</head>
<body class="bg-dark">

    <!-- <nav id="nav">

        <p id="title">about</p>
    </nav> -->

    <div id="root">


        <div class="main">


            <div class="u">

                <div class="about container-fluid">

                    <img src="../DropTalk/img/main/user-192.png" class="us_img">
                    <div class="name">
                        <p class="Name"><?php  $main->get_user_name([$user_id]);print_r($main->get_sql_raw());   ?></p>
                        <p class="us_name">@<?php  $main->get_user_us_name([$user_id]);print_r($main->get_sql_raw());   ?></p>
                        <?php

                            $main->user_cheak_if_following([$_SESSION["user_id"],$user_id]);
                            // print_r($_SESSION["user_id"]);
                            // print_r($user_id);
                            // echo "<br>";
                            // print_r($main->get_sql_raw());

                            if ($user_id != $_SESSION["user_id"]) {
                                if ($main->get_sql_raw()[0] == "following") {

                                    echo "<a id=\"follow\" href=\"../DropTalk/backEnd/remove_follower.php?us={$_SESSION['user_id']}&to={$user_id}\">Unfollow</a>";
                                }elseif($main->get_sql_raw()[0] == "not_following"){
                                    echo "<a  id=\"follow\" href=\"../DropTalk/backEnd/add_follower.php?us={$_SESSION['user_id']}&to={$user_id}\">follow</a>";
                                }else{
                                    echo "<a id=\"follow\">followeing</a>";
                                }
                                
                                
                            }
                        ?>
                        
                    </div>
                    <div class="follow">

                        <div class="f" id="followers">
                            <p class="nu"><?php $main->get_user_followers_len([$user_id]); print_r($main->get_sql_raw());  ?></p>
                            <p class="text">followers</p>
                        </div>

                        <div class="f" id="following">
                            <p class="nu"><?php $main->get_user_following_len([$user_id]); print_r($main->get_sql_raw());  ?></p>
                            <p class="text">following</p>
                        </div>
                    </div>

                </div>

                <div class="post">

                    <div class="P">

                        <div class="Post">
    
                            <div id="head">
                                <img src="../DropTalk/img/main/user-192.png">
                                <a href="#">name</a>
                                <div id="add">
                                    <!-- <img src="../DropTalk/img/main/addapk.png"> -->
                                </div>
                            </div>
            
                            <div id="Data">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam illum nulla, asperiores rem accusantium aperiam.
                                </p>
                            </div>
                        </div>
    
                        <div class="Post">
        
                            <div id="head">
                                <img src="../DropTalk/img/main/user-192.png">
                                <a href="#">name</a>
                                <div id="add">
                                    <!-- <img src="../DropTalk/img/main/addapk.png"> -->
                                </div>
                            </div>
            
                            <div id="Data">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam illum nulla, asperiores rem accusantium aperiam.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="other" >

                        <div class="folloo" id="followerss" style="display: none;"> 
                            <?php

                                $phml->list_all_followers($user_id);

                            ?>
                        </div>
                        <div class="folloo" id="followings" style="display: none;">
                            
                            <?php

                                $phml->list_all_following($user_id);

                            ?>

                        </div>

                    </div>
                    
                </div>

            </div>

        </div>

    </div>

 

    <script src="../DropTalk/Thid Party/jquery-3.4.1.js"></script>
    <script src="../DropTalk/Thid Party/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <script src="../DropTalk/Thid Party/acc.js"></script>

    <script src="../DropTalk/js/settings.js"></script>
    
</body>
</html>