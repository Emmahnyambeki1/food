<?php
if(!isset($_SESSION['user'])){

    $_SESSION['no-log-message']='please login to access the admin panel';
    $message=base64_encode('please login to access the admin panel');

    header('location:'.SETURL. 'admin/login.php?message='.$message);

}
