<?php

include("../constants/config.php");

$id =$_GET['id'];

$sql= "DELETE from tbl_admin WHERE id=$id";

$result=mysqli_query($conn,$sql);

if($result==true){


	$_session['delete']="admin deleted successfully";

	header('location:'.SETURL.'admin/manage.admin.php');
}

else{

	$_session['delete']="failed to delete admin";

	header('location:'.SETURL.'admin/manage.admin.php');

	
}


?>