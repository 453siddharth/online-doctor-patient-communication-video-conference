<?php
	include("patient_header.php");
    if(!isset($_SESSION["email"]))
    {
        echo "<script>window.location.assign('index.php')</script>";
    }
    else
    {
        $email = $_SESSION["email"];
    }
?>
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Welcome</span>
          <h1 class="text-capitalize mb-5 text-lg"><?php echo $email ?></h1>
        </div>
      </div>
    </div>
  </div>
</section><?php
include("footer.php");
?>