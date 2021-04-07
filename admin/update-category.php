<?php

include('partials/menu.php');
include('../constants/config.php');
?>


<div class="main-content">

    <div class="wrapper">


        <h1 class="text-white">Update admin </h1>
        <br /><br/>

        <?php

        $id=$_GET['id'];


        $sql="SELECT * from tbl_category WHERE id=$id";

        $result=mysqli_query($conn, $sql);


        if($result == true){

            //check whether we have data or not by counting the number of rows

            $row=mysqli_num_rows($result);

            //check if we have admin data

            if($row == 1)
            {
                $row 		= mysqli_fetch_assoc($result);
                $title	= $row['title'];
                $image_name	= $row['image_name'];
                $featured	= $row['featured'];
                $active    =$row['active'];
                $id			= $row['id'];
            }

            else{

                header('location:'.SETURL.'admin/manage.category.php');
            }
        }





        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="form-group">
                        <label for="" class="text-white">title</label>
                        <input class="form-control" type="text" name="title" value="<?php echo $title; ?>" placeholder="enter your title">
                    </div>

                    <div class="form-group">
                        <label for="" class="text-white">new_image</label>
                        <input class="form-control" type="file" name="image">
                    </div>
                    <div class="form-group">
                        <label for="" class="text-white">featured</label>
                        <input<?php if($featured=="YES"){echo "checked";}?> class="form-control" type="radio" name="featured" value="YES">YES
                        <input <?php if($featured=="NO"){echo "checked";}?> class="form-control" type="radio" name="featured" value="NO">NO
                    </div>
                    <div class="form-group">
                        <label for="" class="text-white">active</label>
                        <input <?php if($active=="NO"){echo "checked";}?> class="form-control" type="radio" name="active" value="NO">NO
                        <input<?php if($active=="YES"){echo "checked";}?>  class="form-control" type="radio" name="active" value="YES">YES
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success " type="submit" name="submit" value="Update category">
                    </div>
                </div>
            </div>
        </form>
    </div>



</div>

<?php

if(isset($_POST['submit'])){
    $id=$_POST['id'];

    $title=$_POST['title'];

    $image_name=$_POST['image_name'];
    $featured=$_POST['featured'];
    $active=$_POST['active'];

    if(isset($_FILES['image']['name'])){
        //to upload the image ,you need image name and the source path,destination path
        $image_name=$_FILES['image']['name'];
        //auto rename the image so that when we upload the same image it doesnt override the existing one
        //get the extension for our image(jpg,png) food1.jpg
        $ext=end(explode('.', $image_name));
        //rename the image

        $image_name="food_category-".rand(000,999).'.'.$ext;//e.g food_category 800.png


        //image source path

        $source_path=$_FILES['image']['tmp_name'];


        //image destination path

        $destination_path="../images/category".$image_name;

        //upload the file
        $upload=move_uploaded_file($source_path , $destination_path);

        //check if the image is uploaded or no and if not redirect with an error message
        if($upload==false){

            $_SESSION['upload']="failed to upload the image";
            $message=base64_encode('failed to upload file');

            header('location:'.SETURL.'admin/add-category.php?message='.$message);

            //die();
        }

    }
    //write an sql query to update

    $sql="UPDATE tbl_category SET
          title='$title',
        image_name='$image_name',
        featured='$featured',
        active='$active'
        WHERE id='$id'

    
    ";
    //process the query
    $result=mysqli_query($conn,$sql);

    if($result==true){

        $_session['update']='category updated successfully';
        $message	= base64_encode('category update successfully');
        header('location:'.SETURL. 'admin/manage.category.php?message='.$message);
    }
    else{

        $_session['update']='not updated';
        $message	= base64_encode('error updating category details');
        header('location:'.SETURL. 'admin/manage.category.php?message='.$message);
    }
}

?>


<?php include('partials/footer.php'); ?>