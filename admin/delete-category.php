<?php

include("../constants/config.php");
if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE from tbl_category WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result == true) {


        $_session['delete'] = "category deleted successfully";
        $message=base64_encode('category deleted successfully');
        header('location:' . SETURL . 'admin/manage.category.php?message='.$message);
    } else {

        $_session['delete'] = "failed to delete category";
        $message=base64_encode('category  failed to delete ');
        header('location:' . SETURL . 'admin/manage.manage.php?message='.$message);


    }

}
?>