<?php


session_start();

if(!(isset($_SESSION["user_id"]))){

    header("Location: index.html");
    
}

require_once("/backEnd/DropTalk_API.php");
$main = new dt("localhost","pain","pain","droptalk_tast_1");


// print_r($_GET);


// require_once('/backEnd/DropTalk_API.php');

// $main = new dt("localhost","pain","pain","droptalk_tast_1");
// $main->setTabel("accounts");

// echo "hi";
// $user_id = $_SESSION["user_id"];
// print_r($main->get_user_Data($user_id));

?> 

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="../DropTalk/Thid Party/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">

<link href="../DropTalk/css/Main.css" rel="stylesheet">

<link href="../DropTalk/css/main/Communitie.css" rel="stylesheet">
<link href="../DropTalk/css/main/group.css" rel="stylesheet">
<link href="../DropTalk/css/main/Chat.css" rel="stylesheet">
<link href="../DropTalk/css/main/Channels.css" rel="stylesheet">
<link href="../DropTalk/css/main/Post.css" rel="stylesheet">


<title>DropTalk</title>
</head>
<body class="bg-dark" id="body">


<nav id="nav" class="navbar  navbar-dark bg-dark">
    <!-- navbar-expand-lg fixed-top -->

    <a class="navbar-brand" href="#">
        <!-- <img src="../DropTalk/img/33.jpg" width="30" height="30" class="d-inline-block align-top" alt=""> -->
        DropTalk
    </a>

    <a id="find" href="../DropTalk/search.php">
        <img src="../DropTalk/img/main/Search-10.png" width="30" height="30" class="d-inline-block align-top" style="border-radius: 50%;">
        <p> Search </p>
    </a>

    <a class="navbar-brand" href="../DropTalk/user_info.php?id=<?php echo $_SESSION["user_id"];   ?>">
        <img src="<?php $main->get_user_porfile_pic([$_SESSION["user_id"]]); print_r($main->get_sql_raw()); ?>" width="30" height="30" class="d-inline-block align-top" style="border-radius: 50%;">
    </a>

    <a class="navbar-brand" href="../DropTalk/settings.php">
        <img src="../DropTalk/img/main/settings_250x250_0096d6.png" width="30" height="30">
    </a>

    

</nav>


<div id="root">

    <div id="Communitie" style="display: <?php if(isset($_GET["page"])){ if($_GET["page"] == 'Communitie'){echo "flex";}if($_GET["page"] != 'Communitie'){echo "none";}} else {echo "flex";}?>;">

        <nav id="nav">
            <!-- class="navbar navbar-dark bg-dark" -->
            <button id="home" class="ac">Home</button>
            <button id="popular" class="no_ac">Popular</button>

        </nav> 

        <div id="Home">

            <div id="data">

                <div class="post">
    
                    <div id="head">
                        <img src="../DropTalk/img/main/user-192.png">
                        <a href="#">name</a>
                        <div id="add">
                            <img src="../DropTalk/img/main/addapk.png">
                        </div>
                    </div>
    
                    <div id="Data">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam illum nulla, asperiores rem accusantium aperiam.
                        </p>
                    </div>
                </div>
    
                <div class="post">
    
                    <div id="head">
                        <img src="../DropTalk/img/main/user-192.png">
                        <a href="#">name</a>
                        <div id="add">
                            <img src="../DropTalk/img/main/addapk.png">
                        </div>
                    </div>
    
                    <div id="Data">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam illum nulla, asperiores rem accusantium aperiam.
                        </p>
                    </div>
                </div>
    
                <div class="post">
    
                    <div id="head">
                        <img src="../DropTalk/img/main/user-192.png">
                        <a href="#">name</a>
                        <div id="add">
                            <img src="../DropTalk/img/main/addapk.png">
                        </div>
                    </div>
    
                    <div id="Data">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam illum nulla, asperiores rem accusantium aperiam.
                        </p>
                    </div>
                </div>
    
            </div>
        </div>

        <div id="Popular" style="display: none;">

            <div id="data">

                <div class="post">
        
                    <div id="head">
                        <img src="../DropTalk/img/main/user-192.png">
                        <a href="#">name</a>
                        <div id="add">
                            <img src="../DropTalk/img/main/addapk.png">
                        </div>
                    </div>

                    <div id="Data">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam illum nulla, asperiores rem accusantium aperiam.
                        </p>
                    </div>
                </div>

            </div>

        </div>


        <a id="top" href="#body"></a>

        

    </div>

    <div id="Group" style="display: <?php if(isset($_GET["page"])){ if($_GET["page"] == 'Group'){echo "flex";}if($_GET["page"] != 'Group'){echo "none";}} else {echo "none";}?>;">


        <?php


            require("/backEnd/put_php_in_html.php");
            $main = new phml();
            $main->put_group($_SESSION["user_id"]);

        ?>


        <div class="newOradd">
            <img src="../DropTalk/img/main/addapk.png" data="Group">
        </div> 

        <div class="NewGroup"  style="display: none;">

            <div id="nav">
                <img src="../DropTalk/img/main/close-white.png" id="close">
            </div>
            <form class="form" id="group" action = "../DropTalk/backEnd/make_new_group.php" method = "post" enctype="multipart/form-data">
            
                <div class="form-group">
                    <input type="file" name = "img" class="form-control img" >
                </div>

                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name = "name" class="form-control name" placeholder="name">
                    <div class="invalid-feedback">
                        <p>
                            check the name
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="bio">Bio</label>
                    <input type="text" name = "bio" class="form-control bio" placeholder="bio">
                    <div class="invalid-feedback">
                        <p>
                            check your Bio
                        </p>
                    </div>
                </div>


                <button type="submit" value = "submit" style="border-radius: 11rem; margin-top: 30px;" class="btn btn-success post">Crate Group</button>


            </form>  

        </div>

    </div>

    <div id="Chat" style="display: <?php if(isset($_GET["page"])){ if($_GET["page"] == 'Chat'){echo "flex";}if($_GET["page"] != 'Chat'){echo "none";}} else {echo "none";}?>;">

        <?php


            require_once("/backEnd/put_php_in_html.php");
            $main = new phml();
            $main->put_chat($_SESSION["user_id"]);

        ?>


        <a class="newOradd" href="../DropTalk/search.php?by=Chat">
            <img src="../DropTalk/img/main/addapk.png" data="chat">
        </a> 

    </div>

    <div id="Channels" style="display: <?php if(isset($_GET["page"])){ if($_GET["page"] == 'Channels'){echo "flex";}if($_GET["page"] != 'Channels'){echo "none";}} else {echo "none";}?>;">

        <?php


            // require("/backEnd/put_php_in_html.php");
            // $main = new phml();
            $main->put_channel($_SESSION["user_id"]);

        ?>

        <div class="newOradd">
            <img src="../DropTalk/img/main/addapk.png" data="Group">
        </div> 

        <div class="NewGroup" style="display: none;">

            <div id="nav">
                <img src="../DropTalk/img/main/close-white.png" id="close">
            </div>
            <form class="form" id="channe" action = "../DropTalk/backEnd/make_new_channel.php" method = "post" enctype="multipart/form-data">
            
                <div class="form-group">
                    <input type="file" name = "img" class="form-control img" >
                </div>

                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name = "name" class="form-control name" placeholder="name">
                    <div class="invalid-feedback">
                        <p>
                            check the name
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="bio">Bio</label>
                    <input type="text" name = "bio" class="form-control bio" placeholder="bio">
                    <div class="invalid-feedback">
                        <p>
                            check your Bio
                        </p>
                    </div>
                </div>


                <button type="submit" value = "submit" style="border-radius: 11rem; margin-top: 30px;" class="btn btn-success post">Crate channe</button>


            </form>  

        </div>
                
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

    </div>

    <div id="Post" style="display: <?php if(isset($_GET["page"])){ if($_GET["page"] == 'Post'){echo "flex";}if($_GET["page"] != 'Post'){echo "none";}} else {echo "none";}?>";>
    
        <nav id="nav">

            <p>Post</p>
            <img src="../DropTalk/img/main/AnswerWithVideo.scale-400.png" alt="">
            <img src="../DropTalk/img/main/PhotosAppList.contrast-black_targetsize-256.png" alt="">
            <img src="../DropTalk/img/main/Send.scale-400.png" id="send" alt="">

        </nav>

        <nav>
            <img src="../DropTalk/img/main/user-192.png" id="post_to" alt="">
            <p id="name">Name</p>


        </nav>

        <textarea name="post_data" id="post_data" cols="30" rows="10">

        </textarea>

    </div>




</div>


<nav id="nav_bottom" class="navbar fixed-bottom ">
    <!-- navbar-expand-lg -->

    <div id="group" href="Group">
        <img src="../DropTalk/img/main/GroupPlaceholder.scale-200.png">
    </div>
    <div id="channels" href="Channels">
        <img src="../DropTalk/img/main/PhoneNotifications.targetsize-64_contrast-black.png">
    </div>
    <div id="post"  href="Post">
        <img src="../DropTalk/img/main/intro_ic_pencil.png">
    </div>
    <div id="communitie"  href="Communitie" >
        <img src="../DropTalk/img/main/OneNoteSectionGroupMedTile.scale-400.png">
    </div>
    <div id="chat"  href="Chat">
        <img src="../DropTalk/img/main/chats_emptystate_v3.png">
    </div>
    

</nav>

<!-- <div id="kllo" style="margin-top: 80px; color: crimson;">

</div> -->


<script src="../DropTalk/Thid Party/jquery-3.4.1.js"></script>
<script src="../DropTalk/Thid Party/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
<script src="../DropTalk/Thid Party/acc.js"></script>

<script src="../DropTalk/js/Main.js"></script>

<script src="../DropTalk/js/main/Communitie.js"></script>
<script src="../DropTalk/js/main/Group.js"></script>
<script src="../DropTalk/js/main/Chat.js"></script>
<script src="../DropTalk/js/main/channels.js"></script>
<script src="../DropTalk/js/main/Post.js"></script>

<script src="../DropTalk/backEnd/start.js"></script>

</body>
</html>