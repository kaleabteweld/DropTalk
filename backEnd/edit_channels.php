<?php




    require("/DropTalk_API.php");
    session_start();
    $main = new dt("localhost","pain","pain","droptalk_tast_1");
    $main->edit_channels([$_POST["name"],$_POST["bio"],$_SESSION["user_id"],$_GET["id"]]);
    //print_r($main->get_sql_raw());
    $id = $_GET["id"];
    $id = (string) $id; 
    if ((isset($main->get_sql_raw()[0])) && $main->get_sql_raw()[0] == 'repaet' ){
        
        //$id = "{$id}";
         
        // echo "<br>";
        // echo $id;
        // echo "<br>";
        // $id = urlencode($id);
        // echo $id;
        // echo "<br>";
        // echo "%242y%2410%245tF3PJvH%2FvputNrdRrESbO.yEhjonsudYqigWHc2CEVsi6rCxitNS";

        header("Location: ../channel_chat.php?id={$id}&error=repaet");

    }else{

        header("Location: ../channel_chat.php?id={$id}");
    }
 


?>