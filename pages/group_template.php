<script src="js/jquery.js"></script>
<link href="jbox/jBox.css" rel="stylesheet">

<style>
    #topcontainer{
        background-color: #ffffff;
        border-radius: 10px;
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
    .table tr {
        text-align: left;
    }
</style>

<h1>Groups</h1>
<input type="button" class="btn btn-default pull-right" name="add" value="Add" id="addGroup"/>
<input type="button" class="btn btn-default pull-right" name="join" value="join" id="joinGroup"/>

<table class="table table-hover">
    <thead>
    <tr>
        <th width="250">Group Name</th>
        <th>Group ID</th>
        <th>Admin Name</th>
        <th>Edit</th>
    </tr>
    </thead>

    <tbody>

    </tbody>
<?php    create_table();?>
</table>
<!--add group -->
<div style="display: none;" id="addgroup">
    <form method="post" class="center-block" >
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Group Name" name="groupname" value=""/>
        </div>

        <input type="submit" name="create" class="btn btn-success" value="Create"/>

    </form>

</div>


<!--join group -->
<div style="display: none;" id="joingroup">
    <form method="post" class="center-block" >
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Group ID" name="groupid" value=""/>
        </div>

        <input type="submit" name="join" class="btn btn-success" value="Join"/>

    </form>

</div>

<script src="jbox/jBox.js"></script>
<!--add group -->
<script>
    $('#addGroup').jBox('Modal', {
        content: $('#addgroup')
    });
</script>

<!--join group -->
<script>
    $('#joinGroup').jBox('Modal', {
        content: $('#joingroup')
    });
</script>




<script>
    $("#topcontainer").css("height",$(window).height());
</script>
