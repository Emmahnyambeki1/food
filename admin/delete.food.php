<?php

include("../constants/config.php");
if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE from tbl_food WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result == true) {


        $_session['delete'] = "food deleted successfully";
        $message=base64_encode('food deleted successfully');
        header('location:' . SETURL . 'admin/manage.food.php?message='.$message);
    } else {

        $_session['delete'] = "failed to delete food";
        $message=base64_encode('food  failed to delete ');
        header('location:' . SETURL . 'admin/manage.food.php?message='.$message);


    }

}
?>