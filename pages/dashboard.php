<?php

if(isset($_GET['delete'])){

    $query="DELETE FROM `reports` WHERE `id`='".$_SESSION['id']."' AND `report_id`='".$_GET['delete']."'";
    $result=mysqli_query($link,$query);
}



function create_table($privacy="Private"){
    global $link;
    if($privacy=="Private")
        $query="SELECT `subject`,`description`,`report_id` FROM `reports` WHERE `id`='".$_SESSION['id']."'";
    else
        $query="SELECT `subject`,`description`,`report_id` FROM reports WHERE privacy='{$privacy}'";
    $result=mysqli_query($link,$query);
    $i=0;
    while($i<mysqli_num_rows($result)){
        $rows=mysqli_fetch_array($result);

        echo"
    <tr>
        <td>{$rows['subject']}</td>
        <td>{$rows['description']}</td>
        <td>
            <a title='delete' href='?delete={$rows['report_id']}'><span class='glyphicon glyphicon-trash'></span> </a>
            <a title='edit' href=\"edit.php?report_id={$rows['report_id']}\"><span class='glyphicon glyphicon-edit'></span> </a>
        </td>
    </tr>";
        $i++;
    }


}

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

?>