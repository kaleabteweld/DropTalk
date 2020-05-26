
<?php

session_start();
if(!(isset($_SESSION["user_id"]))){

    header("Location: index.html");
    
}

require_once("/backEnd/DropTalk_API.php");
$main = new dt("localhost","pain","pain","droptalk_tast_1");

require("/backEnd/put_php_in_html.php");
$phml = new phml();


// print_r($_GET);
// print_r($_SESSION);


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>channel [ <?php $main->get_user_channels_name([$_SESSION["user_id"],$_GET["id"]]); print_r($main->get_sql_raw());  ?> ]</title>


<link href="../DropTalk/Thid Party/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../DropTalk/css/channel_chat/main.css" rel="stylesheet">
<link href="../DropTalk/css/group_chat/main.css" rel="stylesheet">
<link href="../DropTalk/css/main/Group.css" rel="stylesheet">

</head>
<body class="bg-dark" id="body">

    <div class="settings" style="display: none;">

        <nav class="Nav">
            <img src="../DropTalk/img/main/back-tb.png" class="close">

            <?php

                    if (isset($_GET)) {

                        $id = $_GET['id'];
                        $id =  urlencode($_GET['id']);
                        if (isset($_GET['new'])) {

                        echo "<a href=\"../DropTalk/backEnd/add_user_from_channel.php?id={$id}\" class=\"log_out\">
                        <img src=\"../DropTalk/img/main/addapk.png\" class=\"log_out\">
                    </a>";

                        }else{

                            echo "<a href=\"../DropTalk/backEnd/remove_user_from_channel.php?id={$id}\" class=\"log_out\">
                            <img src=\"../DropTalk/img/main/(delete).png\" class=\"log_out\">
                        </a>";

                        }
                    }

            ?>
            
        </nav>

        <div id="logup">

            <button id="login" class="ac">About channel</button>
            <button id="signup" class="no_ac">Members</button>

        </div> 

        <div class="members" style="display: none;">
            <div id="root">

            <!-- <div class="Glist">

                <div id="data">
                    <img src="../DropTalk/img/main/user-192.png">
                    <div id="text">

                        <p>Name</p>
                        <p id="sub">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel eum incidunt asperiores eveniet dignissimos accusantium facilis</p>
                    </div>
                    <img src="../DropTalk/img/main/XDevice.MoreDevices.png" id="more">
                </div>

                <hr class="divider" id="break">
            </div> -->
            <?php

                //echo $_GET["id"];
                $phml->list_all_channel_members($_GET["id"]);

            ?>

            </div>
        </div>

        <div class="main">

            <img src="<?php $main->get_user_channels_porfile_pic($_GET["id"]); print_r($main->get_sql_raw()); ?>" class="G_pic">

            <div class="nonrmal">
                <p class="name"><?php $main->get_user_channels_name([$_SESSION["user_id"],$_GET["id"]]); print_r($main->get_sql_raw());  ?></p>
                <p class="bio"><?php $main->get_user_channels_bio([$_SESSION["user_id"],$_GET["id"]]); print_r($main->get_sql_raw());  ?></p>
            </div>

            <div class="admin" style="display: <?php $main->channel_cheak_if_admin([$_SESSION["user_id"],$_GET["id"]]);if($main->get_sql_raw()[0] == 'TRUE'){echo "flex";}if($main->get_sql_raw()[0] != 'TRUE'){echo "none";}?>;">

                <p class="into"> Admin</p>

                <form class="form" action="../DropTalk/backEnd/edit_channels.php?id=<?php echo (string) $_GET["id"]; ?>"  method="post">

                    <div class="form-group">
                        <input type="text" name = "name" class="form-control name 
                        
                        <?php

                            if (isset($_GET)) {
                               if (isset($_GET["error"])) {
                                   if ($_GET["error"] = 'repaet') {
                                       echo "is-invalid";
                                   }
                               }
                            }

                        ?>
                        
                        " placeholder="rename" d="<?php $main->get_user_channels_name([$_SESSION["user_id"],$_GET["id"]]); print_r($main->get_sql_raw());  ?>">
                        <div class="invalid-feedback">
                            <p>
                                check the name
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" name = "bio" class="form-control bio" placeholder="rename bio" d="<?php $main->get_user_channels_bio([$_SESSION["user_id"],$_GET["id"]]); print_r($main->get_sql_raw());  ?>">
                        <div class="invalid-feedback">
                            <p>
                                check your Bio
                            </p>
                        </div>
                    </div>

                    <button type="submit" value = "submit" style="border-radius: 11rem; margin-top: 30px;" class="btn btn-success post">Save Chages</button>



                </form>

                <a href="../DropTalk/backEnd/remove_channel.php?id=<?php echo urlencode($_GET["id"]);?>"" class="btn btn-danger reCh">delet channel</a>

            </div>

        </div>


    </div>

    <nav id="head" class="navbar navbar-dark bg-dark">

        <a href="/DropTalk/main.php?page=Channels">
            <img src="../DropTalk//img/main/back-tb.png" id="back">
        </a>
        <div class="but">

            <img src="<?php $main->get_user_channels_porfile_pic($_GET["id"]); print_r($main->get_sql_raw()); ?>" id="G_pic">
            <div id="text"> 
                <p id="G_name"> <?php $main->get_user_channels_name([$_SESSION["user_id"],$_GET["id"]]); print_r($main->get_sql_raw());  ?></p>

                <p id="G_len"><?php $main->get_channels_members_len($_GET["id"]); print_r($main->get_sql_raw()); ?> members</p>
            </div>

            <img src="../DropTalk//img/main/XDevice.MoreDevices.png" id="more">
        
        </div>

    </nav>

    <div id="chat">

        <div class="msg channal"> 

            <!-- <div class="left">
                <img src="../DropTalk/img/main/user-192.png" id="ico">
                <p id="name">Name</p>
            </div> -->
            
            <div class="main">
                <p id="text">text <br> cwqefqwefqwefewfewfwefwe <br> text <br> cwqefqwefqwefewfewfwefwe <br> text <br> cwqefqwefqwefewfewfwefwe <br></p>
                <p id="time">1/2/2020</p>
            </div>
        </div>

        <div class="msg channal"> 

            <!-- <div class="left">
                <img src="../DropTalk/img/main/user-192.png" id="ico">
                <p id="name">Name</p>
            </div> -->
            
            <div class="main">
                <p id="text">text <br> cwqefqwefqwefewfewfwefwe <br> text <br> cwqefqwefqwefewfewfwefwe <br> text <br> cwqefqwefqwefewfewfwefwe <br></p>
                <p id="time">1/2/2020</p>
            </div>
        </div>

        <div class="msg img channal">

            <!-- <div class="left">
                <img src="../DropTalk/img/main/user-192.png" id="ico">
                <p id="name">Name</p>
            </div> -->

            <img src="../DropTalk/img/33.jpg" class="main" id="upload_img">

        </div>

        <div class="msg vio channal">

            <!-- <div class="left">
                <img src="../DropTalk/img/main/user-192.png" id="ico">
                <p id="name">Name</p>
            </div> -->

            <div class="main">
                <img src="../DropTalk/img/main/icon_play_prs.png" id="paly">
            </div>

            
            

        </div>



    </div>

    <nav id="consoil" class="navbar navbar-dark bg-dark" style="display: <?php 
    
    if (isset($_GET)) {if (isset($_GET['new'])) {echo "none";}else{ $main->channel_cheak_if_admin([$_SESSION["user_id"],$_GET["id"]]);if($main->get_sql_raw()[0] == 'TRUE'){echo "flex";}if($main->get_sql_raw()[0] != 'TRUE'){echo "none";}}}
    ?>;">

        <input type="text" id="text">
        <!-- <textarea name="text" id="text" rows="10"></textarea> -->
        <form action="">
            <!-- <input type="file" name="file" id="file"> -->
            <img src="../DropTalk/img/main/AttachmentPlaceholder-Dark.png" id="file_img">
        </form>
        <img src="../DropTalk/img/main/VoiceRecorderAppList.contrast-black_scale-200.png" id="voice">
        <img src="../DropTalk/img/main/Send.scale-400.png" id="send">

    </nav>


7




    <script src="../DropTalk/Thid Party/jquery-3.4.1.js"></script>
    <script src="../DropTalk/Thid Party/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <script src="../DropTalk/Thid Party/acc.js"></script>

    <script src="../DropTalk/js/channel_chat/Main.js"></script>
    <script src="../DropTalk/js/group_chat/main.js"></script>


</body>
</html>