<?php


if (isset($_GET['us']) and isset($_GET['to'])){


    
    //print_r($_GET);
    
    require("/DropTalk_API.php");
    session_start();
    $main = new dt("localhost","pain","pain","droptalk_tast_1");
    $main->add_user_followers([$_SESSION["user_id"],$_GET['to']]);
    header("Location: ../user_info.php?id={$_GET['to']}");
}



?>