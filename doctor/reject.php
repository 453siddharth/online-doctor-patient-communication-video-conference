<?php
if(isset($_REQUEST["id"]))
{
    include("config.php");
    $q=mysqli_query($conn,"UPDATE `appointment` SET `status`='Decline' WHERE `id`=$_REQUEST[id]");
    if($q>0)
    {
        echo "<script>window.location.assign('view_appointment.php?msg=Appointment Declined')</script>";
    }
    else{
        echo "<script>window.location.assign('view_appointment.php?msg=Try Again')</script>";
    }
}
else{
    echo "<script>window.location.assign('view_appointment.php')</script>";
}
?>