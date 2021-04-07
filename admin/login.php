<?php include('../constants/config.php'); ?>
<!DOCTYPE>
<html>
<head>
    <title> Login Food Order System</title>

    <link rel="stylesheet" type="text/css" href="<?php echo SETURL; ?>vendor/bootstrap-4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="login">
    <br> <br>
    <h1 class="text-center" >Login</h1>
    <?php

    if(isset($_GET['message']))
    {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Alert! </strong> '.base64_decode($_GET['message']).'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        unset($_SESSION['message']);
    }
    ?>
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-6 offset-md-3" >
        <div class="form-group">
        <label for="user_name">user_name</label>
        <input class="form-control" type="text" name="user_name"  placeholder="Enter your username">

        </div>
        <div class="form-group">
        <label for="password">password</label>
        <input class="form-control" type="password" name="password" placeholder="Enter your password">
        </div>
        <div class="form-group">
        <input class="btn btn-success" type="submit" name="submit" value="login">

        </div>
            </div>
        </div>
    </form>

    <p class="text-center"> created by- <a href="#">EMMAH ORINA</a>

</body>
</html>
<?php
if(isset($_POST['submit'])){
    //process the login form
    $user_name=$_POST['user_name'];
    $password=md5($_POST['password']);

    //sql query
    $sql="SELECT * from tbl_admin WHERE user_name ='$user_name' AND password= '$password'";
//execute the query
    $result=mysqli_query($conn,$sql);

    //check if the user exist by counting the number of rows

    $count=mysqli_num_rows($result);

    if($count==1){

        $_session['login']=' login successful';
        $_session['user']=$user_name;//checks whether the user is logged in or not
        $message=base64_encode(' login successful');
        header('location:'.SETURL.'admin/index.php?message='.$message);


    }
    else{
        $_session['login']=' failed to login';
        $message=base64_encode('failed to login admin');
        header('location:'.SETURL.'admin/login.php?message='.$message);
    }

}
?>