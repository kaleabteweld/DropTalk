<?php


session_start();

if(!(isset($_SESSION["user_id"]))){

    header("Location: index.html");
    
}

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



    <title>Setting</title>
</head>
<body class="bg-dark" id="body">


    <nav id="nav">

        <p id="title">Setting</p>
        <a id="logout" class="navbar-item" href="../DropTalk/backEnd/log_out.php">log out</a>

    </nav>

    <div id="root">


        <div class="main">


            <p>Edit Account</p>
            <div class="edit_account">

                <form class="sign_from" action = "../DropTalk/backEnd/edit_user.php" method="POST">

                    <img src="<?php $main->get_user_porfile_pic([$_SESSION["user_id"]]); print_r($main->get_sql_raw()); ?>" class="us_pic">

                    <div class="T">

                        <div class="form-group">
                            <label for="name">your full Name</label>
                            <input type="text" class="form-control name" name="name" placeholder="name" 

                            d="<?php $main->get_user_name([$_SESSION["user_id"]]); print_r($main->get_sql_raw());?>"
                            >
                            <div class="invalid-feedback">
                                <p>
                                    Enter your Name
                                </p>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="us_name">New User Name</label>
                            <input type="text" class="form-control us_name
                            
                            <?php

                                if (isset($_GET)) {
                                if (isset($_GET["error"])) {
                                    $temp = explode(",",$_GET["error"]);
                                    print_r($temp);
                                    if (in_array("repet_us_name",$temp)) {
                                        echo "is-invalid";
                                    }else{
                                        echo "ok";
                                    }
                                    
                                }
                                }

                            ?>
                            
                            " name="us_name" placeholder="User Name"
                            d="<?php $main->get_user_us_name([$_SESSION["user_id"]]); print_r($main->get_sql_raw());?>"
                            >
                            <div class="invalid-feedback">
                                <p>
                                    User Name taken, plese try agen
                                </p>
                            </div>
                        </div>

                    </div>
                    
                    <div class="T">

                        <div class="form-group">
                            <label for="emaill">New Email</label>
                            <input type="text" class="form-control emaill
                            
                            <?php

                                if (isset($_GET)) {
                                if (isset($_GET["error"])) {
                                    $temp = explode(",",$_GET["error"]);
                                    if (in_array("repet_email",$temp)) {
                                        echo "is-invalid";
                                    }
                                }
                                }

                            ?>
                            
                            " name="emaill" placeholder="email@example.com"
                            d="<?php $main->get_user_email([$_SESSION["user_id"]]); print_r($main->get_sql_raw());?>"     
                            >
                            <div class="invalid-feedback">
                                <p>
                                    check your Email
                                </p>
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label for="phon">New Phon Number</label>
                            <input type="number" class="form-control phon
                            
                            <?php

                                if (isset($_GET)) {
                                if (isset($_GET["error"])) {

                                    $temp = explode(",",$_GET["error"]);
                                    if (in_array("repet_phon_number",$temp)) {
                                        echo "is-invalid";
                                    }
                                }
                                }

                            ?>
                            " name="phon" placeholder="+251....."
                            d="<?php $main->get_user_phon_number([$_SESSION["user_id"]]); print_r($main->get_sql_raw());?>"
                            >
                            <div class="invalid-feedback">
                                <p>
                                    check your Phone Number
                                </p>
                            </div>
                        </div>

                    </div>

                    <label for="bio">New Bio</label>
                    <textarea class="bio form-control" name="bio" id="bio"><?php $main->get_user_bio([$_SESSION["user_id"]]); print_r($main->get_sql_raw()); ?></textarea>

                    <div class="form-group">
                        <label for="old_pass">Old password</label>
                        <input type="password" class="form-control old_pass
                        
                        <?php

                            if (isset($_GET)) {
                            if (isset($_GET["error"])) {

                                $temp = explode(",",$_GET["error"]);
                                if (in_array("old",$temp)) {
                                    echo "is-invalid";
                                }
                            }
                            }

                        ?>
                        " name="old_pass" placeholder="*******">
                        <div class="invalid-feedback">
                            <p>
                                check your password, Must Be less Than Or Equal 8 Charcter's
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="passs">New password</label>
                        <input type="password" class="form-control passs" name="passs" placeholder="*******">
                        <div class="invalid-feedback">
                            <p>
                                check your password, Must Be less Than Or Equal 8 Charcter's
                            </p>
                        </div>
                    </div>
    
                    <button style="border-radius: 11rem;" class="btn btn-success post">Chage</button>
                    <br>
    
                </form>  

            </div>

            <p>about DT</p>
            <div class="about">
                <img src="../DropTalk/img/33.jpg">
                <h2>Name</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quisquam culpa commodi, quod ut quae accusantium inventore dolores obcaecati itaque illo ea velit quis porro natus. Ratione consectetur nesciunt modi.</p>
            </div>

        </div>

    </div>




    



    



    <script src="../DropTalk/Thid Party/jquery-3.4.1.js"></script>
    <script src="../DropTalk/Thid Party/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <script src="../DropTalk/Thid Party/acc.js"></script>

    <script src="../DropTalk/js/settings.js"></script>

</body>
</html>