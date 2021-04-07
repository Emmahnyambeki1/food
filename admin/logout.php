<?php
include('../constants/config.php');
 session_destroy();//unset all logged is users

 //redirect to login .php
header('location:' .SETURL.'admin/login.php');
?>