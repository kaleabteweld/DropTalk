<?php


// session_start();

class phml{

    protected $main;

    public function __construct(){

        require_once("/DropTalk_API.php");
        require_once("/fun/python_php.php");
        $this->main = new dt("localhost","pain","pain","droptalk_tast_1");

    }   
    public function put_group($user_id){


        $name = "Name";
        $img = "../DropTalk/img/main/user-192.png";
        $last_text = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel eum incidunt asperiores eveniet dignissimos accusantium facilis";
        $templat = "";

        $group_id = $this->main->get_user_groups_id([$user_id]);
        $group_id = $this->main->get_sql_raw();

        $cont = 0;

        if (!(is_array($group_id))) {

            
            $group_id = explode(",",$group_id);
    
    
            foreach ($group_id as $key => $value) {
                
                $tr = $this->main->cheak_id_if_exists("group_ref",$value,"group_id");

                if ($tr == 1) {

                    $name = $this->main->get_user_groups_name(["",$value]);
                    $name = $this->main->get_sql_raw();
        
                    $img = $this->main->get_user_groups_porfile_pic($value);
                    $img = $this->main->get_sql_raw();
        
                    
                    $value = urlencode($value);
                    $temp = "
                    <a class=\"Glist\" href=\"../DropTalk/group_chat.php?id={$value}\">
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
        
        
    
                    echo $temp;
                    $cont++;
                   
                }
                
    
            }
    
           
        }
        if ($cont == 0) {
            
            $templat = "
                <div class=\"none\"> <p> no Group's Make One?</p> </div>
            ";
            echo $templat;
        }

                   

            
    }
    
    public function put_channel($user_id){


        $name = "Name";
        $img = "../DropTalk/img/main/user-192.png";
        $last_text = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel eum incidunt asperiores eveniet dignissimos accusantium facilis";
        $templat = "";

        $channel_id = $this->main->get_user_channels_id([$user_id]);
        $channel_id = $this->main->get_sql_raw();

        $cont = 0;

        // if (len($channel_id) <= 10) {

        //     $templat = "
        //     <div class=\"none\"> <p> no channel's Make One?</p> </div>
        //     ";
        //      echo $templat;
        // }

        if (!(is_array($channel_id))) {

            
            $channel_id = explode(",",$channel_id);
    
    
            foreach ($channel_id as $key => $value) {
                
                $tr = $this->main->cheak_id_if_exists("channels_ref",$value,"channels_id");
                //echo "\t {$tr}";
                if ($tr == 1) {
                    
                    $name = $this->main->get_user_channels_name(["",$value]);
                    $name = $this->main->get_sql_raw();
        
                    $img = $this->main->get_user_channels_porfile_pic($value);
                    $img = $this->main->get_sql_raw();
    
        
                    
                    $value = urlencode($value);
                    $temp = "
                    <a class=\"Glist\" href=\"../DropTalk/channel_chat.php?id={$value}\">
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
        
        
                    echo $temp;
                    $cont++;
                }


    
            }
    
        } 
        if ($cont == 0){
            $templat = "
                <div class=\"none\"> <p> no channel's Make One?</p> </div>
            ";
            echo $templat;
        }

                   

            
    }
    public function put_chat($user_id){
        
        $chat_id = $this->main->get_user_chat_id([$user_id]);
        $chat_id = $this->main->get_sql_raw();
        //print_r($chat_id);
        $cont = 0;
        $last_text = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel eum incidunt asperiores eveniet dignissimos accusantium facilis";
        
        // echo len($chat_id);
        if (is_string($chat_id)) {
           
            $chat_id = explode(",",$chat_id);
    
            foreach ($chat_id as $key => $value) {
                
                $tr = $this->main->cheak_id_if_exists("chat_ref",$value,"chat_id");
                if ($tr = 1) {
    
                    $this->main->choose_dispaly_chat([$user_id,$value]);
                    $value = $this->main->get_sql_raw();
    
    
                    $name = $this->main->get_user_name([$value]);
                    $name = $this->main->get_sql_raw();
        
                    $img = $this->main->get_user_porfile_pic([$value]);
                    $img = $this->main->get_sql_raw();
                    if ($img[0] == 'null') {
                        $img = "../DropTalk/img/main/user-192.png";
                    }
    
    
                    
        
                    
                    $value = urlencode($value);
                    $temp = "
                    <a class=\"Glist\" href=\"../DropTalk/user_chat.php?id={$value}\">
                         <div id=\"data\">
                            <img src=\"{$img}\">
                            <div id=\"text\">
                                <p>{$name}</p>
                                <p id=\"sub\">{$last_text}</p>
                            </div>
                           
                        </div>
    
                    </a>
                    ";
    
                    // $f = " <img src=\"../DropTalk/img/main/XDevice.MoreDevices.png\" id=\"more\">";
        
                    echo $temp;
                    $cont++;
    
                }
                
    
            }
        }


        if ($cont == 0){
            $templat = "
                <div class=\"none\"> <p> no Chat's Make One?</p> </div>
            ";
            echo $templat;
        }

    }



    public function list_all_channel_members($channel_id){



        $this->main->list_all_channel_members([$channel_id]);
        //print_r($this->main->get_sql_raw());

        $last_text = "Member";

        foreach ($this->main->get_sql_raw() as $key => $value) {
            
            $value = $value[0];
            //echo $value;
        //  echo "<br>";
            $tr = $this->main->cheak_id_if_exists("accounts",$value,"user_id");
            $remove = "";

            if ($tr == 1) {
                    
                $name = $this->main->get_user_name([$value]);
                $name = $this->main->get_sql_raw();
    
                $img = $this->main->get_user_porfile_pic([$value]);
                $img = $this->main->get_sql_raw();
                if ($img[0] == 'null') {
                    $img = "../DropTalk/img/main/user-192.png";
                }



                $yu = $this->main->channel_cheak_if_admin([$_SESSION["user_id"],$channel_id]);
                if ($this->main->get_sql_raw()[0] == 'TRUE') {

                    $yu = $this->main->channel_cheak_if_admin([$value,$channel_id]);
                    if ($this->main->get_sql_raw()[0] == 'TRUE') {
                        $last_text = "Admin";
     
                    }else{
    
                        //$value = urlencode($value);
                        $last_text = "Member";
                        $remove = $remove . "
                        <a class=\"remove\" href=\"../DropTalk/backEnd/remove_user_from_channel.php?us={$value}&id={$channel_id}\">
                            <img src=\"../DropTalk/img/main/(delete).png\" id=\"more\">
                        </a>
                        
                        ";
                    }
                } else {
                                   $yu = $this->main->channel_cheak_if_admin([$value,$channel_id]);
                if ($this->main->get_sql_raw()[0] == 'TRUE') {
                    $last_text = "Admin";
 
                }else{

                    //$value = urlencode($value);
                    $last_text = "Member";
                }
                }
                


                
    
                $remove =  $remove . "
                <a class=\"remove\" href=\"../DropTalk/user_info.php?id={$value}\">
                <img src=\"../DropTalk/img/main/Information_RGB_blue_NT.png\" id=\"more\">
            </a>";
                
                $value = urlencode($value);
                $temp = "
                <div class=\"con\">
                <a class=\"Glist\" href=\"../DropTalk/user_chat.php?id={$value}\">
                     <div id=\"data\">
                        <img src=\"{$img}\">
                        <div id=\"text\">
                            <p>{$name}</p>
                            <p id=\"sub\">{$last_text}</p>
                        </div>
                        
                    </div>
                </a>
                {$remove}
                </div>
                ";

                // $f = " <img src=\"../DropTalk/img/main/XDevice.MoreDevices.png\" id=\"more\">";
    
                echo $temp;
            }
         }
    }
    public function list_all_group_members($group_id){


        $this->main->list_all_group_members([$group_id]);

        $last_text = "Member";

        foreach ($this->main->get_sql_raw() as $key => $value) {
            
            $value = $value[0];
            //echo $value;
            echo "<br>";
            $tr = $this->main->cheak_id_if_exists("accounts",$value,"user_id");
            $remove = "";

            if ($tr == 1) {
                    
                $name = $this->main->get_user_name([$value]);
                $name = $this->main->get_sql_raw();
    
                $img = $this->main->get_user_porfile_pic([$value]);
                $img = $this->main->get_sql_raw();
                if ($img[0] == 'null') {
                    $img = "../DropTalk/img/main/user-192.png";
                }


                $yu = $this->main->group_cheak_if_admin([$_SESSION["user_id"],$group_id]);
                if ($this->main->get_sql_raw()[0] == 'TRUE') {
                    
                    $yu = $this->main->group_cheak_if_admin([$value,$group_id]);
                    if ($this->main->get_sql_raw()[0] == 'TRUE') {
                            $last_text = "Admin";
                    }else{
        
                        //$value = urlencode($value);
                        
                        $last_text = "Member";
        
                        $remove = "
                        <a class=\"remove\" href=\"../DropTalk/backEnd/remove_user_from_group.php?us={$value}&id={$group_id}\">
                            <img src=\"../DropTalk/img/main/(delete).png\" id=\"more\">
                        </a>";
                    }

                }else{

                    $yu = $this->main->group_cheak_if_admin([$value,$group_id]);
                    if ($this->main->get_sql_raw()[0] == 'TRUE') {
                            $last_text = "Admin";
                    }else{
        
                        //$value = urlencode($value);
                        
                        $last_text = "Member";
    
                    }

                }


                
            $remove =  $remove . "
            <a class=\"remove\" href=\"../DropTalk/user_info.php?id={$value}\">
            <img src=\"../DropTalk/img/main/Information_RGB_blue_NT.png\" id=\"more\">
        </a>";
    
                
                $value = urlencode($value);
                $temp = "
                <div class=\"con\">
                <a class=\"Glist\" href=\"../DropTalk/user_chat.php?id={$value}\">
                     <div id=\"data\">
                        <img src=\"{$img}\">
                        <div id=\"text\">
                            <p>{$name}</p>
                            <p id=\"sub\">{$last_text}</p>
                        </div>
                        
                    </div>
                </a>
                {$remove}
                </div>
                ";
                
    
                echo $temp;
            }

        
        }

        

    }




    public function list_all_following($user_id){


        $this->main->get_user_following_id([$user_id]);
        //print_r($this->main->get_sql_raw());

        $cont = 0;

        foreach ($this->main->get_sql_raw() as $key => $value) {
            
            //$value = $value[0];
            //echo $value;
            echo "<br>";
            $tr = $this->main->cheak_id_if_exists("accounts",$value,"user_id");
            $remove = "";

            if ($tr == 1) {
                    
                $name = $this->main->get_user_name([$value]);
                $name = $this->main->get_sql_raw();
    
                $img = $this->main->get_user_porfile_pic([$value]);
                $img = $this->main->get_sql_raw();
                if ($img[0] == 'null') {
                    $img = "../DropTalk/img/main/user-192.png";
                }

                $last_text =  $this->main->get_user_us_name([$value]);
                $last_text = $this->main->get_sql_raw();
                
                $value = urlencode($value);
                $temp = "
                <div class=\"con\">
                <a class=\"Glist\" href=\"../DropTalk/user_chat.php?id={$value}\">
                     <div id=\"data\">
                        <img src=\"{$img}\">
                        <div id=\"text\">
                            <p>{$name}</p>
                            <p id=\"sub\">{$last_text}</p>
                        </div>
                        
                    </div>
                </a>
                </div>
                ";
                
    
                echo $temp;
                $cont++;
            }

        
        }

        if ($cont == 0){
            $templat = "
                <div class=\"none\"> <p> no peplo are following u for the time being </p> </div>
            ";
            echo $templat;
        }

        

    }
    public function list_all_followers($user_id){


        $cont = 0;

        $this->main->get_user_followers_id([$user_id]);
        //print_r($this->main->get_sql_raw());

        foreach ($this->main->get_sql_raw() as $key => $value) {
            
            //$value = $value[0];
            //echo $value;
            echo "<br>";
            $tr = $this->main->cheak_id_if_exists("accounts",$value,"user_id");
            $remove = "";

            if ($tr == 1) {
                    


                $name = $this->main->get_user_name([$value]);
                $name = $this->main->get_sql_raw();
    
                $img = $this->main->get_user_porfile_pic([$value]);
                $img = $this->main->get_sql_raw();
                if ($img[0] == 'null') {
                    $img = "../DropTalk/img/main/user-192.png";
                }

                $last_text =  $this->main->get_user_us_name([$value]);
                $last_text = $this->main->get_sql_raw();
    
                
                $value = urlencode($value);
                $temp = "
                <div class=\"con\">
                <a class=\"Glist\" href=\"../DropTalk/user_chat.php?id={$value}\">
                     <div id=\"data\">
                        <img src=\"{$img}\">
                        <div id=\"text\">
                            <p>{$name}</p>
                            <p id=\"sub\">{$last_text}</p>
                        </div>
                        
                    </div>
                </a>
                </div>
                ";
                
    
                echo $temp;
                $cont++;
            }

        
        }

        if ($cont == 0){
            $templat = "
                <div class=\"none\"> <p> you don't have followers for the time being </p> </div>
            ";
            echo $templat;
        }

        

    }



}

?>