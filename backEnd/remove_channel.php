<?php

    session_start();

    require_once("/DropTalk_API.php");
    require_once("/fun/python_php.php");
    $main = new dt("localhost","pain","pain","droptalk_tast_1");

    $main->remove_channels([$_SESSION["user_id"],$_GET['id']]);
    print_r($main->get_sql_raw());
    header("Location: ../main.php?page=Channels");



?>