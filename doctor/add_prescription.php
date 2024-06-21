<?php
include("doctor_header.php");
if(!isset($_SESSION["doctor_email"]))
{
    echo "<script>window.location.assign('index.php')</script>";
}
else
{
    $doctor_email = $_SESSION["doctor_email"];
}
?>
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Prescription</span>
          <h1 class="text-capitalize mb-5 text-lg">Doctor Prescription</h1>
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
			<div class="col-md-8 mx-auto my-5">
				<?php
				if(isset($_REQUEST['msg']))
				{
					echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
				}
				?>
				<form method="post">
                    <input type="hidden" name="appointment_id" value="<?php echo $_REQUEST['id']?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Prescription List</label>
                                <textarea name="prescription_list" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Other Description</label>
                                <textarea name="other_description" class="form-control"></textarea>
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
    $appointment_id=$_REQUEST['appointment_id'];
    $prescription_list=$_REQUEST['prescription_list'];
    $other_description=$_REQUEST['other_description'];
    
    include("config.php");
    $query="INSERT INTO `prescription`(`appointment_id`, `prescription_list`, `other_description`) VALUES ('$appointment_id','$prescription_list','$other_description')";
    $res=mysqli_query($conn,$query);
    if($res>0)
    {
        echo "<script>window.location.assign('approved_appointment.php?msg=Prescription Inserted Successfully')</script>";
    }
    else{
        
        echo "<script>window.location.assign('approved_appointment.php?msg=Try Again')</script>";
    }
}
?>