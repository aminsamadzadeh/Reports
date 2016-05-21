<?php
/**
 * Created by PhpStorm.
 * User: Amin
 * Date: 4/12/2016
 * Time: 10:30 AM
 */

function create_option(){
    global $link;
    $query="SELECT * FROM user_group ug
            JOIN groups g ON ug.group_id=g.group_id
            WHERE user_id='{$_SESSION['id']}'";
    $result=mysqli_query($link,$query);
    $i=0;
    while($i<mysqli_num_rows($result)){
        $rows=mysqli_fetch_array($result);
        echo "
            <option value='{$rows['group_id']}'>{$rows['group_name']}</option>
        ";
        $i++;
    }
}
$subject="";
$description="";

if(isset($_GET['save']))
{
    if(isset($_GET['report_id']) && !empty($_GET['report_id']))
    {
        $query="UPDATE `reports` SET subject= '"."".$_GET['subject']."',"."description='".$_GET['description']."' WHERE `report_id`='".$_GET['report_id']."'";
        $result=mysqli_query($link,$query);
    }
    else{
        $query=
            "INSERT INTO `reports` (`subject`,`privacy`,`description`,`id`)
                  VALUES('" .mysqli_real_escape_string($link,$_GET['subject'])."','".mysqli_real_escape_string($link,$_GET['privacy'])."','".mysqli_real_escape_string($link,$_GET['description'])."','".mysqli_real_escape_string($link,$_SESSION['id'])."')";
        $result=mysqli_query($link,$query);
    }

    header("location:dashboard.php");
}

if(isset($_GET['report_id']))
{
    $query="SELECT `subject`,`description` FROM `reports` WHERE `id`='".$_SESSION['id']."' AND `report_id`='".$_GET['report_id']."'";
    $result=mysqli_query($link,$query);
    $row=mysqli_fetch_array($result);
    $subject=$row['subject'];
    $description=$row['description'];

}
