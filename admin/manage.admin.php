<?php

include('../constants/config.php');

?>

<!DOCTYPE html>

<html>
<head>
	<title>Food order website</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<link rel="stylesheet" type="text/css" href="<?php echo SETURL; ?>vendor/bootstrap-4.0.0/dist/css/bootstrap.min.css">
</head>
<body>

	<!--menu-->
<div class="menu text-center">
	<div class="wrapper">
		<ul>

			<li><a href="#">Home</a></li>
			<li><a href="#">Admin</a></li>
			<li><a href="#">category</a></li>
			<li><a href="#">Food</a></li>
			<li><a href="#">0rder</a></li>






		</ul>

	</div>

</div>
<!--main content-->
<div></div>

<div class="main-content">
	<div class="wrapper">

<h1 class="text-white">Manage Admin</h1>
<br />
<!--button to add admin-->
<?php
    if(isset($_GET['message']))
    {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Alert! </strong> '.base64_decode($_GET['message']).'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }



        if(isset($_session['add'])){


            echo $_session['add'];

            unset($_session['add']);
            }

            if(isset($_session['delete'])){

                echo $_session['delete'];

                unset($_session['delete']);

                }
        if(isset($_session['update'])){

            echo $_session['update'];

            unset($_session['update']);
    }
        if(isset($_session['user-not-found'])){
            echo $_session['user-not-found'];
            unset($_session['user-not-found']);
        }
        if(isset($_session['password-not-match'])){
            echo($_session['password-not-match']);
            unset($_session['password-not-match']);


        }
        if(isset($_session['change-password'])){
            echo($_session['change-password']);
            unset($_session['change-password']);
        }


?>
<br /><br /><br />
<a href="Add-admin.php" class="btn btn-success text-white">Add admin</a>

        <div class="container">
            <div class="row">
                <div class="col-md-12 pt-4">
                    <div class="table-responsive">
                        <table class="table table-stripped text-white">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>full_name</td>
                                    <td>user_name</td>
                                    <td>password</td>
                                    <td>actions</td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql    = "SELECT * from tbl_admin";
                                    $result = mysqli_query($conn, $sql);

                                    if($result != null)
                                    {
                                        $count =mysqli_num_rows($result);
                                        if($count > 0)
                                        {
                                            $sn = 1;
                                            while ($row = mysqli_fetch_assoc($result))
                                            {
                                                $id         = $row['id'];
                                                $full_name  = $row['full_name'];
                                                $user_name  = $row['user_name'];
                                                $password   = $row['password'];
                                                $action     = '<a href="'.SETURL.'admin/update-password.php?id='.$id.'" class="btn btn-sm text-white btn-primary">Change password</a>
                                                <a href="'.SETURL.'admin/update-admin.php?id='.$id.'" class="btn btn-sm text-white btn-secondary">Update Admin</a>
                                                <a href="'.SETURL.'admin/delete-admin.php?id='.$id.'" class="btn btn-sm text-white btn-danger">Delete Admin</a>';
                                                echo '<tr>
                                                    <td>'.$sn.'</td>
                                                    <td>'.$full_name.'</td>
                                                    <td>'.$user_name.'</td>
                                                    <td>'.$password.'</td>
                                                    <td>'.$action.'</td>
                                                </tr>';  
                                                $sn++;                                              
                                            }
                                        }
                                    }
                                                                    
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</div>
</div>

<!--footer-->
<?php include('partials/footer.php') ?>

</body>
</html>