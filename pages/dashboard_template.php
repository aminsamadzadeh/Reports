

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

<h1>All Reports!</h1>
<a href="edit.php">
    <input type="button" class="btn btn-default pull-right" name="add" value="add"/>
</a>
<form>
<label style="width: 100px; float: left;"  for="sel1">Privacy:</label>
<select name="privacy" class="form-control" style="width: 100px; float: left;" id="sel1">
    <option>Private</option>
    <?php create_option(); ?>
</select>
<input type="submit" class="btn btn-default pull-left" name="group" value="group"/>
</form>
<table class="table table-hover">
    <thead>
    <tr>
        <th width="250">subject</th>
        <th>description</th>
    </tr>
    </thead>

    <tbody>
    <?php
    if(isset($_GET['group']))
        create_table($_GET['privacy']);
    else create_table();
    ?>
    </tbody>

</table>


<script>
    $("#topcontainer").css("height",$(window).height());
</script>
