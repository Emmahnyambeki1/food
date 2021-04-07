<?php include ('partials/menu.php'); ?>

<div class="Main-content">

    <div class="wrapper">
        <h1> Change password</h1>
        <br /><br />
        <?php
        if(isset($_GET['id'])){

            $id=$_GET['id'];


            $sql="SELECT * from tbl_admin WHERE id=$id";
    
            $result=mysqli_query($conn, $sql);
    
    
            if($result == true){
    
                //check whether we have data or not by counting the number of rows
    
                $row=mysqli_num_rows($result);
    
                //check if we have admin data
    
                if($row == 1)
                {
                    $row 		= mysqli_fetch_assoc($result);
                    $full_name	= $row['full_name'];
                    $user_name	= $row['user_name'];
                    $password	= $row['password'];
                    $id			= $row['id'];
                }
    
                else{
    
                    header('location:'.SETURL.'admin/manage.admin.php');
                }
            }
        }

        ?>

<form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="row">
			 	<div class="col-md-6 offset-md-3">
				 	<div class="form-group">
						<label for="" class="text-white">Current password</label>
						<input class="form-control" type="text" name="current_password" value="" placeholder="enter your current password">
					</div>
				 	<div class="form-group">
						<label for="" class="text-white">New password</label>
						<input class="form-control" type="text" name="new_password" value="" placeholder="enter your new password">
					</div>
				 	<div class="form-group">
						<label for="" class="text-white">Confirm password</label>
						<input class="form-control" type="text" name="confirm_password" value="" placeholder="confirm your new password">
					</div>
				 	<div class="form-group">
						<input class="btn btn-success " type="submit" name="submit" value="change password">
					</div>
				</div>
			</div>



</form>
    </div>
</div>
<?php
if(isset($_POST['submit'])){

    $id=$_POST['id'];
    $current_password= sha1($_POST['current_password']);
    $new_password=md5($_POST['new_password']);
    $confirm_password=md5($_POST['confirm_password']);

    //check whether the current id and password exist in the database
    $sql="SELECT * from tbl_admin WHERE id=$id AND password='current_password'";

    $result=mysqli_query($conn, $sql);
    if($result==true){

        $count=mysqli_num_rows($result);

        if($count==1){
            //user exists and password can be changed
            //check whether the new password matches the confirm password
            if($new_password==$confirm_password){

                $sql2="UPDATE tbl_admin SET
                       password='$new_password'
                      WHERE id=$id 
                ";

                $result2=mysqli_query($sql2);

                if($result2==true){
                    $_session['change-password']= "password changed successfully";
                    header("location:".SETURL.'admin/manage.admin.php');


                }else{

                    $_session['change-password']= "failed to change password";
                    header("location:".SETURL.'admin/manage.admin.php');
                }


            }
            //redirect it to manage page
            else{
                $_session['password-not-match']= "password do not match";
                header("location:".SETURL.'admin/manage.admin.php');
            }


        }
        else{

            //user doesnt exist and password cannot be changed
            $_session['user-not-found']= "user does not exist in the database";
            header("location:".SETURL.'admin/manage.admin.php');
        }
    }
}


?>




<?php include('partials/footer.php'); ?>
