<?php
include("partials/menu.php");
include('../constants/config.php');
?>
<div class="main-content">

    <div class="wrapper">

        <h1 class="text-white">ADD FOOD</h1>
        <br /><br />

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="form-group">
                        <label for="" class="text-white">Title</label>
                        <input class="form-control" type="text" name="title" placeholder="Enter your category title">
                    </div>
                    <div class="form-group">
                        <label for="" class="text-white">description</label>
                        <textarea name="description" cols="55" rows="7" placeholder="description for food"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="text-white">price</label>
                        <input class="form-control" type="number" name="price">
                    </div>
                    <div class="form-group">
                        <label for="" class="text-white">select image</label>
                        <input class="form-control" type="file" name="image">
                    </div>
                    <div class="form-group">
                        <label for="" class="text-white">category</label>
                        <select name="category">
                            <option value="">food</option>
                            <option value="">pizza</option>
                            <option value="">chapati</option>
                            <option value="">milk</option>
                            <option value="">mandazi</option>


                        </select>
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
                        <input class="btn btn-success" type="submit" name="submit" value="Add Food">
                    </div>
                </div>
            </div>



        </form>
    </div>
</div>
<?php

if(isset($_POST['submit'])){

    $title=$_POST['title'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $category=$_POST['category'];


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

        $image_name="food_menu-".rand(000,999).'.'.$ext;//e.g food_category 800.png


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

    $sql="INSERT into tbl_food SET 
                title='$title',
                description='$description',
                price=$price,
                image_name='$image_name',
                category='$category',
                featured='$featured',
                active='$active'
                ";

    $result=mysqli_query($conn,$sql);

    if($result==true){
        $_SESSION['add']="food added successfully";
        $message=base64_encode('food added successfully');
        header('location:'.SETURL.'admin/manage.food.php?message='.$message);

    }
    else{
        $_SESSION['add']="failed to add food";
        $message=base64_encode('failed to add food');
        header('location:'.SETURL.'admin/manage.food.php?message='.$message);


    }
}
?>


<?php
include'partials/footer.php';
?>