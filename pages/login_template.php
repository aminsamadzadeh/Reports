<style>
    #topcontainer{
        background-color: #ffffff;
        border-radius: 10px;
    }
    .table tr {
        text-align: left;
    }

</style>

<h1>Login</h1>

<form method="post" class="center-block" >
    <div class="form-group">
        <input type="email" class="form-control" placeholder="Email" name="loginemail" id="email" value="<?=$_POST['email'];?>"/>
    </div>

    <div class="form-group">
        <input type="password" name="loginpassword" placeholder="Password"  class="form-control" value="<?=$_POST['password'];?>"/>
    </div>


    <input type="submit" name="submit" class="btn btn-success" value="Login"/>

</form>