<?php
    if(isset($_REQUEST['id']))
    {
        include('config.php');
        $query = mysqli_query($conn,"DELETE FROM `advices` WHERE `id`='$_REQUEST[id]'");
        if($query>0)
        {
            echo "<script>window.location.assign('manage_advice.php?msg=Record deleted')</script>";
        }
        else{
            echo "<script>window.location.assign('manage_advice.php?msg=Try Again')</script>";
        }
    }
    else{
        echo "<script>window.location.assign('manage_advice.php')</script>";
    }
?>