<?php


    session_start();
    require("/DropTalk_API.php");

    if (isset($_GET)) {
        
        $user_id = $_SESSION["user_id"];

        echo $user_id;
        echo "<br>";
        echo $_GET["id"];

        $main = new dt("localhost","pain","pain","droptalk_tast_1");
        $main->add_user_to_channels([$user_id,$_GET["id"]]);
        print_r($main->get_sql_raw()); 

        $id = $_GET["id"];
        //$id = "{$id}";
         $id = (string) $id; 
         
        header("Location: ../channel_chat.php?id={$id}");
    }

?>