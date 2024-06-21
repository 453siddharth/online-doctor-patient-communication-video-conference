<?php
	include("patient_header.php");
	if(!isset($_SESSION["email"]))
    {
        echo "<script>window.location.assign('login.php')</script>";
    }
?>
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Thankyou for making appointment. we will get back to you soon.</span>
          <h1 class="text-capitalize mb-5 text-lg">Thanks</h1>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include("footer.php");
?>