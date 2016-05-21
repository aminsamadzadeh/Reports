<?php

function generateRandomString($length = 7) {
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < $length; $i++) {
$randomString .= $characters[rand(0, $charactersLength - 1)];
}
return $randomString;
}

function create_table()
{
    global $link;


    $query = "SELECT g.group_id,group_name,admin_id,user_id,u.name as user_name,au.name as admin_name
                    FROM groups g
                    JOIN user_group ug ON g.group_id=ug.group_id
                    JOIN users u ON ug.user_id=u.id
                    JOIN users au ON g.admin_id=au.id
                    WHERE ug.user_id={$_SESSION['id']}";
    $result = mysqli_query($link, $query);

    $i = 0;
    while ($i < mysqli_num_rows($result)) {
        $rows = mysqli_fetch_array($result);
        if($rows['admin_id']==$rows['user_id'])
            $admin_name="You";
        else $admin_name=$rows['admin_name'];

        echo "
    <tr>
        <td>{$rows['group_name']}</td>
        <td>{$rows['group_id']}</td>
        <td>{$admin_name}</td>
        <td>
        <?php if($admin_name == 'You'): ?>
            <a title='delete' href='?delete={$rows['group_id']}&admin={$rows['admin_id']}'><span class='glyphicon glyphicon-trash'></span> </a>
            <a title='edit' href=\"edit.php?report_id={$rows['group_id']}\"><span class='glyphicon glyphicon-edit'></span> </a>
        <?php endif; ?>
        </td>
    </tr>";
        $i++;
    }
}

if(isset($_GET['delete'])){

    if($_GET['admin']==$_SESSION['id']){

        $query="DELETE FROM `user_group` WHERE `group_id`='".$_GET['delete']."'";
        $result=mysqli_query($link,$query);

        $query="DELETE FROM `groups` WHERE `group_id`='".$_GET['delete']."'";
        $result=mysqli_query($link,$query);


    }
    else{
        $query="DELETE FROM `user_group` WHERE `group_id`='{$_GET['delete']}' AND `user_id`='{$_SESSION['id']}'";
        $result=mysqli_query($link,$query);
    }
}

if(isset($_POST['create'])){

    $group_id=generateRandomString();

    $query=
        "INSERT INTO `groups` (`group_id`,`group_name`,`admin_id`)
                  VALUES('" .$group_id."','".mysqli_real_escape_string($link,$_POST['groupname'])."','".mysqli_real_escape_string($link,$_SESSION['id'])."')";
    $result=mysqli_query($link,$query);
    $query=
        "INSERT INTO `user_group` (`group_id`,`user_id`)
                  VALUES('" .$group_id."','".mysqli_real_escape_string($link,$_SESSION['id'])."')";
    $result=mysqli_query($link,$query);

}

if(isset($_POST['join'])) {
    $query =
        "INSERT INTO `user_group` (`group_id`,`user_id`)
                  VALUES('" . mysqli_real_escape_string($link, $_POST['groupid']) . "','" . mysqli_real_escape_string($link, $_SESSION['id']) . "')";
    $result = mysqli_query($link, $query);
}