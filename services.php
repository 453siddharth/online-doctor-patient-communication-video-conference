<?php
include("patient_header.php");
?>
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Specialist</span>
          <h1 class="text-capitalize mb-5 text-lg">Specialist</h1>
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
		$query=mysqli_query($conn,"SELECT  DISTINCT(specialization) FROM `doctor`");
		while($row=mysqli_fetch_array($query))
		{
		?>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-block mb-5">
					<img src="images/specialist.png" alt="" class="img-fluid">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">
							<a href="#"><?php echo $row['specialization']; ?></a><br>
							<div class="btn-group">
								<a href="view_advices.php?specialize=<?php echo $row['specialization']; ?>" class="btn btn-info">View Advices</a>
								<a href="view_doctor.php?specialize=<?php echo $row['specialization']; ?>" class="btn btn-warning">View Specialist</a>
							</div>
						</h4>
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