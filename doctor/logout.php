<?php
session_start();
//session destroy
unset($_SESSION['doctor_email']);
echo "<script>window.location.assign('index.php?msg=Logout Successfully')</script>";
?>