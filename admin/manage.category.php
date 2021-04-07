<?php 

include("partials/menu.php");

?>
<div class="main-content">
	<div class="wrapper">
		
		<h1> Manage Category</h1>
		<br /><br />
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
    ?>
		<a href="add-category.php" class="btn-primary">Add Category</a>

   <div class="container">
    <div class="row">
        <div class="col-md-12 pt-4">
            <div class="table-responsive">
                <table class="table table-stripped text-white">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>title</td>
                        <td>image_name</td>
                        <td>featured</td>
                        <td>active</td>
                        <td>action</td>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql    = "SELECT * from tbl_category";
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
                                $title  = $row['title'];
                                $image_name  = $row['image_name'];
                                $featured   = $row['featured'];
                                $active   =$row['active'];
                                $action     = '
                                                <a href="'.SETURL.'admin/update-category.php?id='.$id.'" class="btn btn-sm text-white btn-secondary">Update category</a>
                                                <a href="'.SETURL.'admin/delete-category.php?id='.$id.'" class="btn btn-sm text-white btn-danger">Delete category</a>';
                                echo '<tr>
                                                    <td>'.$sn.'</td>
                                                    <td>'.$title.'</td>
                                                    <td>'.$image_name.'</td>
                                                    <td>'.$featured.'</td>
                                                    <td>'.$active.'</td>
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


    <br /><br /><br />


	</div>
	
</div>



<?php 
include("partials/footer.php");

?>