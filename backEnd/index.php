<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../DropTalk/Thid Party/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">

    <title>backend</title>
</head>
<body>
    


    <?php

        // $pass = '$2y$10$J58OWm.hxs0tDG4kCLPASuB7KGFvGRuRQ.grWGUbyWNt.OZy3adHS,$2y$10$TgrJQ390SZ.qAC7WHyNjDeoC0L9Ydb7YuBRr.3flTXZ3smbnQhsje';
        // $pass = password_hash($pass,PASSWORD_BCRYPT);
        // echo $pass ;

        echo "start <br>";
        require("/DropTalk_API.php");
        session_start();
        $main = new dt("localhost","pain","pain","droptalk_tast_1");
        $main->user_cheak_if_following([$_SESSION["user_id"],'$2y$10$TgrJQ390SZ.qAC7WHyNjDeoC0L9Ydb7YuBRr.3flTXZ3smbnQhsje']);
        print_r($main->get_sql_raw());

        // $targetDir = "../uploads/users/groups/name/user-192.png";
        // $def = $targetDir;

        // echo copy("../uploads/users/groups/DEFAULT/user-192.png","{$def}");
        



    ?>

    <script src="../DropTalk/Thid Party/jquery-3.4.1.js"></script>
    <script src="../DropTalk/Thid Party/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
</body>
</html>