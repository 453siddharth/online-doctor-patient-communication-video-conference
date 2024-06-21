<?php
session_start();
//session destroy
unset($_SESSION['email']);
echo "<script>window.location.assign('login.php?msg=Logout Successfully')</script>";
?>