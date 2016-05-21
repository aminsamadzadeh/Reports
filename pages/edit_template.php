<style>
    #topcontainer{
        background-color: #ffffff;
        border-radius: 10px;
    }
    .table tr {
        text-align: left;
    }

</style>

<h1>Edit</h1>
<form>
    <textarea  class="form-control" style="height: 40px;" placeholder="subject" name="subject"><?=$subject?></textarea><br />
    <textarea class="form-control" style="height:400px;" placeholder="description" name="description"><?=$description?></textarea>
    <input type="hidden" name="report_id" value="<?=$_GET['report_id']?>"/> <br/>
    <label style="width: 100px; float: left;"  for="sel1">Privacy:</label>
    <select name="privacy" class="form-control" style="width: 100px; float: left;" id="sel1">
        <option>Private</option>
        <?php create_option(); ?>
    </select>
    <input type="submit" name="save" class="btn btn-default pull-right" style="margin: 10px;" value="save"/>

</form>