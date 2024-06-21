<?php
	include("patient_header.php");
?>
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Our <?php echo $_GET["specialize"]; ?> Specialize Doctors</span>
          <h1 class="text-capitalize mb-5 text-lg">Doctors</h1>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section service-2">
	<div class="container">
		<div class="row">
		<?php 
            include("config.php");
            $query=mysqli_query($conn,"SELECT * FROM `doctor` where specialization='$_GET[specialize]'");
            while($row=mysqli_fetch_array($query))
            {
        ?>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-block mb-5">
					<img src="images/specialist.png" alt="" class="img-fluid">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">
                            <?php
                                echo $row['doctor_name'];
                            ?>
						</h4>
                        <a href="make_appointment.php?doctor_id=<?php echo $row['email'];?>" class="btn btn-danger mx-auto d-block">Make Appointment</a>
					</div>
				</div>
			</div>
		<?php
		}
		?>
		</div>
	</div>
</section>
<?php
include("footer.php");
?>