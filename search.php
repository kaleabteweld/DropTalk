<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>search</title>


<link href="../DropTalk/Thid Party/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">

<link href="../DropTalk/css/main/group.css" rel="stylesheet">
<link href="../DropTalk/css/Main.css" rel="stylesheet">
<link href="../DropTalk/css/Search.css" rel="stylesheet">

</head>
<body class="bg-dark" id="body">
    

    <nav id="nav" class="navbar  navbar-dark bg-dark">

        <a href="../DropTalk/main.php">
            <img src="../DropTalk/img/main/back-tb.png" id="back" >
        </a>


        <img src="../DropTalk/img/main/Search-10.png" width="30" height="30" style="border-radius: 50%; margin-right: 10px;">
 
        <input type="text" id="find">

    </nav>

    <div id="type">
        <p><?php if (isset($_GET["by"])) { $by = $_GET['by']; if ($by == "Post") {$by = "all";}}else{$by = "Chat";} echo $by;?></p>
    </div>

    <div class="main">

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

        </div>

        <!-- <div class="error">
            <p>Nothing Yet Sorry</p>
        </div> -->

    </div>

    <script src="../DropTalk/Thid Party/jquery-3.4.1.js"></script>
    <script src="../DropTalk/Thid Party/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <script src="../DropTalk/Thid Party/acc.js"></script>
    
    <script src="../DropTalk/js/search.js"></script>
</body>
</html>