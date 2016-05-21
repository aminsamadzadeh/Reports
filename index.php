<?php
include("connection.php");
session_start();
error_reporting(7);


$page = str_replace('.php', '', $_GET['page']);
//require backend php

//404
if($page!='' && !is_file('pages/'.$_GET['page'])) {
    header('HTTP/1.0 404 Not Found', true, 404);
    echo 'Page Not Found!!!';
    exit();
}
//end 404

if($page == '')
    $page = 'main';

if(!isset($_SESSION['id']) && $page != 'main' && $page != 'login')
    header('Location: login.php');

require_once('pages/'.$page.'.php');
?>
<!--end require backend php-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Reports</title>

    <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="js/jquery.js"></script>


    <![endif]-->
</head>
<style>
    .navbar-header{
        margin: 0px;
    }
    body{
        background-image: url("background.jpg");
        width: 100%;
        margin: 0px;
        background-size: cover;
    }
    #toprow{
        text-align: center;
    }

</style>
<body>

<!--nav bar-->
<nav class="navbar navbar-default">
    <?php if($page == 'main'):

        ?>
    <div class="container">
        <div class="navbar-header" >

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand">Reports</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <form method="post" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="email" name="loginemail" placeholder="Email" class="form-control" id="email" value="<?=$_POST['loginemail'];?>"/>
                </div>
                <div class="form-group">
                    <input type="password" name="loginpassword" placeholder="Password" class="form-control" value="<?=$_POST['loginpassword'];?>"/>
                </div>
                <input type="submit" name="submit" class="btn btn-success" value="Login">

        </div><!--/.navbar-collapse -->

    </div>
    <?php elseif($page == 'login'):   ?>
    <div class="container">
        <div class="navbar-header pull-left" >
            <a class="navbar-brand">Reports</a>

        </div>
    </div>

    <?php else: ?>
    <div class="container">
        <div class="navbar-header pull-left" >
            <a class="navbar-brand">Reports</a>
        </div>
        <div class=" navbar-collapse pull-right">
            <ul class="navbar-nav nav">
                <li ><a href="index.php?logout=1">Logout</a></li>
            </ul>
        </div>

    </div>
    <?php endif;?>
</nav>
<!--end nav bar-->

<!--require page template-->
<div class="container" id="topcontainer">
    <div class="row">
        <div class="col-md-10 col-md-offset-1" id="toprow">
            <?php require_once('pages/'.$page.'_template.php');?>
        </div>
    </div>
</div>
<!--end require page template-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script>
    $("#topcontainer").css("height",$(window).height());
</script>

</body>
</html>


