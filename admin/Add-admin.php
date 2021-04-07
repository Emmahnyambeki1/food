<?php


include("partials/menu.php");

?>
<div class="main-content">

	<div class="wrapper">
		
		<h1 class="text-white">Add Admin</h1>
		<br /><br />

		<?php
		if(isset($_session['add'])){

			echo $_session['add'];

			unset($_session['add']);
		}


		?>

		<form action="" method="POST">
			<div class="row">
			 	<div class="col-md-6 offset-md-3">
				 	<div class="form-group">
						<label for="" class="text-white">Full name</label>
						<input class="form-control" type="text" name="full_name" placeholder="enter your full name">
					</div>
				 	<div class="form-group">
						<label for="" class="text-white">Username</label>
						<input class="form-control" type="text" name="user_name" placeholder="enter your username">
					</div>
				 	<div class="form-group">
						<label for="" class="text-white">Password</label>
						<input class="form-control" type="password" name="password" placeholder="enter your password">
					</div>
				 	<div class="form-group">
						<input class="btn btn-success " type="submit" name="submit" value="Add Admin">
					</div>
				</div>
			</div>



		</form>
	</div>
	</div>


<?php include("partials/footer.php"); ?>




<?php

//process values from form to database

if(isset($_POST['submit'])){

	$full_name=$_POST['full_name'];

	$user_name=$_POST['user_name'];

	$password=md5($_POST['password']);



	$sql="INSERT into tbl_admin SET

		full_name='$full_name',
		user_name='$user_name',
		password='$password'


	";

	$conn=mysqli_connect('localhost','root','') or die(mysqli_error());// database connection


	$db_select=mysqli_select_db($conn, 'food') or die(mysqli_error());//select our database


	$result=mysqli_query($conn,$sql) or die(mysqli_error());



	if($result==TRUE){

		$session['add']="admin added successfully";

		header('location:'.SETURL.'admin/manage.admin.php');
	}
	else{ 
		$session['add']="failed to add admin";

		header('location:'.SETURL.'admin/Add-admin.php');
	}
}


