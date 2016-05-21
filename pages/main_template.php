<h1>Sing Up Now!</h1>
<?php
if($error)echo '<div class="alert alert-danger">'.addslashes($error).'</div>';

else echo '<div class="alert alert-success">registered successfully</div>';


?>
<form method="post" class="center-block" >
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Name" name="name" value="<?=$_POST['name'];?>"/>
    </div>

    <div class="form-group">
        <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?=$_POST['email'];?>"/>
    </div>

    <div class="form-group">
        <input type="password" name="password" placeholder="Password"  class="form-control" value="<?=$_POST['password'];?>"/>
    </div>


    <input type="submit" name="submit" class="btn btn-success" value="SingUp"/>

</form>