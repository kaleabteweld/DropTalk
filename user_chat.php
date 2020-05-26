
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
<title>Group Chat [ <?php $main->get_user_name([$_GET['id']]); print_r($main->get_sql_raw());  ?> ]</title>


<link href="../DropTalk/Thid Party/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../DropTalk/css/group_chat/main.css" rel="stylesheet">
<link href="../DropTalk/css/channel_chat/main.css" rel="stylesheet">
<link href="../DropTalk/css/main/group.css" rel="stylesheet">

</head>
<body class="bg-dark" id="body">

<div class="settings" style="display: none;">

    <nav class="Nav">
        <img src="../DropTalk/img/main/back-tb.png" class="close">      
        
        <a class="log_out" href="../DropTalk/user_info.php?id=<?php echo $_GET["id"];//  $id = $_GET["id"];$id = (string) $id;echo $id; ?>">

                    <img src="../DropTalk/img/main/Information_RGB_blue_NT.png" class="log_out">
        </a>
    </nav>

    <div class="main">

        <img src="<?php $main->get_user_porfile_pic([$_GET['id']]); print_r($main->get_sql_raw()); ?>" class="G_pic">

        <div class="nonrmal">
            <p class="name"><?php $main->get_user_name([$_GET['id']]); print_r($main->get_sql_raw());  ?></p>
            <p class="bio"><?php $main->get_user_bio([$_GET['id']]); print_r($main->get_sql_raw());  ?></p>
            <p class="use_name"> @<?php $main->get_user_us_name([$_GET['id']]); print_r($main->get_sql_raw());  ?></p>
        </div>

    </div>


</div>

<nav id="head" class="navbar navbar-dark bg-dark">

    <a href="/DropTalk/main.php?page=Chat">
        <img src="../DropTalk/img/main/back-tb.png" id="back">
    </a>
    <div class="but">
        
        <img src="<?php $main->get_user_porfile_pic([$_GET['id']]); print_r($main->get_sql_raw()); ?>" id="G_pic">
        <div id="text"> 
            <p id="G_name"> <?php $main->get_user_name([$_GET['id']]); print_r($main->get_sql_raw());  ?></p>

        </div>

        <img src="../DropTalk//img/main/XDevice.MoreDevices.png" id="more">
        </div>

</nav>

<div id="chat">

    <div class="msg"> 

        <div class="left">
            <img src="../DropTalk/img/main/user-192.png" id="ico">
            <p id="name">Name</p>
        </div>
        
        <div class="main">
            <p id="text">text <br> cwqefqwefqwefewfewfwefwe <br> text <br> cwqefqwefqwefewfewfwefwe <br> text <br> cwqefqwefqwefewfewfwefwe <br></p>
            <p id="time">1/2/2020</p>
        </div>
    </div>

    <div class="msg me"> 

        <div class="left">
            <img src="../DropTalk/img/main/user-192.png" id="ico">
            <p id="name">Name</p>
        </div>
        
        <div class="main">
            <p id="text">text <br> cwqefqwefqwefewfewfwefwe <br> text <br> cwqefqwefqwefewfewfwefwe <br> text <br> cwqefqwefqwefewfewfwefwe <br></p>
            <p id="time">1/2/2020</p>
        </div>
    </div>

    <div class="msg img me">

        <div class="left">
            <img src="../DropTalk/img/main/user-192.png" id="ico">
            <p id="name">Name</p>
        </div>

        <img src="../DropTalk/img/33.jpg" class="main" id="upload_img">

    </div>

    <div class="msg vio me">

        <div class="left">
            <img src="../DropTalk/img/main/user-192.png" id="ico">
            <p id="name">Name</p>
        </div>

        <div class="main">
            <img src="../DropTalk/img/main/icon_play_prs.png" id="paly">
        </div>

        
        

    </div>

    <div class="msg vio">

        <div class="left">
            <img src="../DropTalk/img/main/user-192.png" id="ico">
            <p id="name">Name</p>
        </div>

        <div class="main">
            <img src="../DropTalk/img/main/icon_play_prs.png" id="paly">
        </div>

        
        

    </div>



</div>

<nav id="consoil" class="navbar navbar-dark bg-dark">

    <input type="text" id="text">
    <!-- <textarea name="text" id="text" rows="10"></textarea> -->
    <form action="">
        <!-- <input type="file" name="file" id="file"> -->
        <img src="../DropTalk/img/main/AttachmentPlaceholder-Dark.png" id="file_img">
    </form>
    <img src="../DropTalk/img/main/VoiceRecorderAppList.contrast-black_scale-200.png" id="voice">
    <img src="../DropTalk/img/main/Send.scale-400.png" id="send">

</nav>




<script src="../DropTalk/Thid Party/jquery-3.4.1.js"></script>
<script src="../DropTalk/Thid Party/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
<script src="../DropTalk/Thid Party/acc.js"></script>

<script src="../DropTalk/js/group_chat/main.js"></script>
<script src="../DropTalk/js/channel_chat/Main.js"></script>

</body>
</html>