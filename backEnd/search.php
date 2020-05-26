<?php


    require("/DropTalk_API.php");
    



    if (isset($_POST)) {
        
        session_start();

        $main = new dt("localhost","pain","pain","droptalk_tast_1");
        if ($_POST["type"] == "Group") {
            
            $main->search_group([$_SESSION["user_id"],$_POST["data"]]);
            //print_r($main->get_sql_raw());
            
            $templat = "";
            //echo "<br>";
    
    
            foreach ($main->get_sql_raw() as $key => $value) {
                
                
                $value = $value[0];
                //echo $value;
                //echo "<br>";
                $tr = $main->cheak_id_if_exists("group_ref",$value,"group_id");
    
                if ($tr == 1) {
    
                    $name = $main->get_user_groups_name(["",$value]);
                    $name = $main->get_sql_raw();
        
                    $img = $main->get_user_groups_porfile_pic($value);
                    $img = $main->get_sql_raw();
        
                    $main->get_groups_members_len($value);
                    $last_text = $main->get_sql_raw();
                    $last_text = "{$last_text} members";
                    
                    $valuee = urlencode($value);
                    $main->cheak_user_partOF_group([$_SESSION["user_id"],$value]);
                    if ($main->get_sql_raw() == "out") {
    
                        $link = "../DropTalk/group_chat.php?id={$valuee}&new=true";
                    }else{
                        $link = "../DropTalk/group_chat.php?id={$valuee}";
                    }
                    
                    $temp = "
                    <a class=\"Glist\" href=\"{$link}\">
                        <div id=\"data\">
                            <img src=\"{$img}\">
                            <div id=\"text\">
                                <p>{$name}</p>
                                <p id=\"sub\">{$last_text}</p>
                            </div>
                        
                        </div>
        
                        <hr class=\"divider\" id=\"break\">
                    </a>
                    ";
    
                    // $f = " <img src=\"../DropTalk/img/main/XDevice.MoreDevices.png\" id=\"more\">";
        
        
                    //$templat = $templat . $temp;
                    echo $temp;
                }
    
                
        
                
            }
        }
        elseif($_POST["type"] == "Channels"){
            
            $main->search_channels([$_SESSION["user_id"],$_POST["data"]]);
            
            //print_r($main->get_sql_raw());
            
            $templat = "";
            //echo "<br>";
    
    
            foreach ($main->get_sql_raw() as $key => $value) {
                
                
                $value = $value[0];
                //echo $value;
                //echo "<br>";
                $tr = $main->cheak_id_if_exists("channels_ref",$value,"channels_id");
    
                if ($tr == 1) {
    
                    $name = $main->get_user_channels_name(["",$value]);
                    $name = $main->get_sql_raw();
        
                    $img = $main->get_user_channels_porfile_pic($value);
                    $img = $main->get_sql_raw();
        
                    $main->get_channels_members_len($value);
                    $last_text = $main->get_sql_raw();
                    $last_text = "{$last_text} members";
                    
                    $valuee = urlencode($value);
                    $main->cheak_user_partOF_channel([$_SESSION["user_id"],$value]);
                    if ($main->get_sql_raw() == "out") {
    
                        $link = "../DropTalk/channel_chat.php?id={$valuee}&new=true";
                    }else{
                        $link = "../DropTalk/channel_chat.php?id={$valuee}";
                    }
                    
                    $temp = "
                    <a class=\"Glist\" href=\"{$link}\">
                        <div id=\"data\">
                            <img src=\"{$img}\">
                            <div id=\"text\">
                                <p>{$name}</p>
                                <p id=\"sub\">{$last_text}</p>
                            </div>
                        
                        </div>
        
                        <hr class=\"divider\" id=\"break\">
                    </a>
                    ";
    
                    // $f = " <img src=\"../DropTalk/img/main/XDevice.MoreDevices.png\" id=\"more\">";
        
        
                    //$templat = $templat . $temp;
                    echo $temp;
                }
    
                
        
                
            }
    
        }
        elseif($_POST["type"] == "Chat"){
            
            $main->search_user([$_SESSION["user_id"],$_POST["data"]]);
            
            $templat = "";
            $last_text = "VYAEVYKUYKUEWYUCVWEYVGHWE";
    
    
            foreach ($main->get_sql_raw() as $key => $value) {
                
                
                $value = $value[0];
                //echo $value;
                //echo "<br>";
                $tr = $main->cheak_id_if_exists("accounts",$value,"user_id");
    
                if ($tr == 1) {
    
                    $name = $main->get_user_name([$value]);
                    $name = $main->get_sql_raw();
        
                    $img = $main->get_user_porfile_pic([$value]);
                    $img = $main->get_sql_raw();
                    if ($img[0] == 'null') {
                        $img = "../DropTalk/img/main/user-192.png";
                    }
                    
                    $valuee = urlencode($value);
                    
                    $temp = "
                    <a class=\"Glist\" href=\"../DropTalk/user_chat.php?id={$value}\">
                        <div id=\"data\">
                            <img src=\"{$img}\">
                            <div id=\"text\">
                                <p>{$name}</p>
                                <p id=\"sub\">{$last_text}</p>
                            </div>
                        
                        </div>
        
                        <hr class=\"divider\" id=\"break\">
                    </a>
                    ";
                    echo $temp;
                }
    
                
        
                
            }
    
        }


        
        


    }


?>