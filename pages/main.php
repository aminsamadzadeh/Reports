<?php
/**
 * Created by PhpStorm.
 * User: Amin
 * Date: 4/10/2016
 * Time: 12:35 PM
 */


if ($_POST['submit']=="SingUp"){

    if(!$_POST['name'])$error.="<br/> please enter name";
    if(!$_POST['email']) $error.="<br/>please enter email";
    else if (!(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) )) $error.="<br/>your email is not validated";

    if(strlen($_POST['password'])<6)$error.="<br/>please enter 6 character pass";
    else{

        $query="SELECT `email` FROM `users` WHERE `email`='". mysqli_real_escape_string($link,$_POST['email']) ."'";
        $result=mysqli_query($link,$query);
        if (mysqli_num_rows($result)>0)
            $error.="<br/>this email registered";
        else{
            $query=
                "INSERT INTO `users` (`name`,`email`,`password`)
                  VALUES('" .mysqli_real_escape_string($link,$_POST['name'])."','".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,md5($_POST['email']).md5($_POST['password']))."')";
            $result=mysqli_query($link,$query);


            $_SESSION['id']=mysqli_insert_id($link);
            header("location:dashboard.php");


        }


    }
}



if($_POST['submit']=="Login"){

    $query="SELECT * FROM `users` WHERE `email`='". mysqli_real_escape_string($link,$_POST['loginemail']) ."'AND`password`='".mysqli_real_escape_string($link,md5($_POST['loginemail']).md5($_POST['loginpassword']))."'" ;
    $result=mysqli_query($link,$query);
    $row=mysqli_fetch_array($result);
    if($row){
        $_SESSION['id'] = $row['id'];
        header("location: dashboard.php");
    }
    else $error.="<br/>we can not log in";

}
elseif(isset($_GET['logout']))
    session_destroy();




if ($error) $error= "there is some error:".$error;

