<?php include('partials/menu.php'); ?>


<div class="main-content">

	<div class="wrapper">
		

		<h1 class="text-white">Update admin </h1>
		<br /><br/>

		<?php

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





		?>

		<form action="" method="POST">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="row">
			 	<div class="col-md-6 offset-md-3">
				 	<div class="form-group">
						<label for="" class="text-white">Full name</label>
						<input class="form-control" type="text" name="full_name" value="<?php echo $full_name; ?>" placeholder="enter your full name">
					</div>
				 	<div class="form-group">
						<label for="" class="text-white">Username</label>
						<input class="form-control" type="text" name="user_name" value="<?php echo $user_name; ?>" placeholder="enter your username">
					</div>
				 	<div class="form-group">
						<input class="btn btn-success " type="submit" name="submit" value="Update Admin">
					</div>
				</div>
			</div>
		</form>
	</div>
	


</div>

<?php

if(isset($_POST['submit'])){
            $id=$_POST['id'];

            $full_name=$_POST['full_name'];

            $user_name=$_POST['user_name'];

            //write an sql query to update

    $sql="UPDATE tbl_admin SET
          full_name='$full_name',
        user_name='$user_name'
        WHERE id='$id'

    
    ";
    //process the query
    $result=mysqli_query($conn,$sql);

    if($result==true){

        $_session['update']='admin update successfully';
        $message	= base64_encode('admin update successfully');
        header('location:'.SETURL. 'admin/manage.admin.php?message='.$message);
    }
    else{

        $_session['update']='not updated';
        $message	= base64_encode('error updating admin details');
        header('location:'.SETURL. 'admin/manage.admin.php?message='.$message);
    }
}

?>


<?php include('partials/footer.php'); ?>