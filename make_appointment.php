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
          <span class="text-white">Appointment</span>
          <h1 class="text-capitalize mb-5 text-lg">Make Appointment</h1>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- about -->
<div class="about">
	<div class="container">
       <div class="ab-agile">
			<div class="col-md-2"></div>
			<div class="col-md-8 mx-auto d-block my-5">
				<?php
				if(isset($_REQUEST['msg']))
				{
					echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
				}
				?>
				<form method="post">
                    <input type="hidden" name="doctor_id" value="<?php echo $_GET['doctor_id']?>">
                    <input type="hidden" name="patient_id" value="<?php echo $_SESSION['email']?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Disease</label>
                                <input type="text" name="disease" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Symptoms</label>
                                <textarea name="symptoms" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
					
					<button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
				</form>
			</div>
			<div class="col-md-2"></div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php
include("footer.php");
?>

<?php 
if(isset($_REQUEST['submit']))
{
    $doctor_id=$_REQUEST['doctor_id'];
    $patient_id=$_REQUEST['patient_id'];
    $symptoms=$_REQUEST['symptoms'];
    $disease=$_REQUEST['disease'];
    
    include("config.php");
    $query="INSERT INTO `appointment`(`patient_id`, `doctor_id`, `disease`, `symptoms`, `status`) VALUES ('$patient_id','$doctor_id','$disease','$symptoms','pending')";
    $res=mysqli_query($conn,$query);
    if($res>0)
    {
        echo "<script>window.location.assign('thanks.php?msg=Record Inserted Successfully')</script>";
    }
    else{
        echo mysqli_error($conn);
        echo "<script>window.location.assign('make_appointment.php?doctor_id=$doctor_id&msg=Try Again')</script>";
    }
}
?>