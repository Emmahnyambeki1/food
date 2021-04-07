<?php


include("partials/menu.php");


include("partials/menu.php");
?>
<div class="main-content">

    <div class="wrapper">
        <?php
        if(isset($_GET['message']))
        {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Alert! </strong>'.base64_decode($_GET['message']).'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }
        ?>

        <h1 class="text-white">ADD CATEGORY</h1>
        <br /><br />

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="form-group">
                        <label for="" class="text-white">Title</label>
                        <input class="form-control" type="text" name="title" placeholder="Enter your category title">
                    </div>
                    <div class="form-group">
                        <label for="" class="text-white">select image</label>
                        <input class="form-control" type="file" name="image">
                    </div>
                    <div class="form-group">
                        <label for="" class="text-white">Feature</label>
                        <input class="form-control" type="radio"  name="featured" value="YES">YES
                        <input class="form-control" type="radio"  name="featured" value="NO">NO
                    </div>
                    <div class="form-group">
                        <label for="" class="text-white">active</label>
                        <input class="form-control" type="radio" name="active" value="YES">YES
                        <input class="form-control" type="radio" name="active" value="NO">NO
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name="submit" value="Add Category">
                    </div>
                </div>
            </div>



        </form>
    </div>
</div>

        <?php

        if(isset($_POST['submit'])){

            $title=$_POST['title'];


        if(isset($_POST['featured'])){

            $featured=$_POST['featured'];
        }
        else{
            $featured="NO";
        }
        if(isset($_POST['active'])){

            $active=$_POST['active'];
        }
        else{

            $active="no";
        }
        //check whether the image is selected and check the value of the image accordingly
           // print_r($_FILES['image']);
        //die();
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
         else{
           $image_name="";
         }

        $sql="INSERT into tbl_category SET 
                title='$title',
                image_name='$image_name',
                featured='$featured',
                active='$active'
                ";

        $result=mysqli_query($conn,$sql);

        if($result==true){
            $_SESSION['add']="category added successfully";
            $message=base64_encode('category added successfully');
            header('location:'.SETURL.'admin/manage.category.php?message='.$message);

        }
        else{
            $_SESSION['add']="failed to add category";
            $message=base64_encode('failed to add category');
            header('location:'.SETURL.'admin/manage.category.php?message='.$message);


        }
}
        ?>

<?php include("partials/footer.php"); ?>


