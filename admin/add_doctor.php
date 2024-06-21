<?php
	include("admin_header.php");
    if(!isset($_SESSION["admin_email"]))
    {
        echo "<script>window.location.assign('index.php')</script>";
    }
    else
    {
        $admin_email = $_SESSION["admin_email"];
    }
?>
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Doctor</span>
          <h1 class="text-capitalize mb-5 text-lg">Add Doctor</h1>
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Doctor Name</label>
                                <input type="text" name="doctor_name" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Qualification</label>
                                <input type="text" name="qualification" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Specialization</label>
                                <input type="text" name="specialization" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Contact</label>
                                <input type="number" name="contact" min="1" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Other Description</label>
                                <textarea name="other_description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Experience</label>
                                <textarea name="experience" class="form-control"></textarea>
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
    $doctor_name=$_REQUEST['doctor_name'];
    $qualification=$_REQUEST['qualification'];
    $specialization=$_REQUEST['specialization'];
    $other_description=$_REQUEST['other_description'];
    $experience=$_REQUEST['experience'];
    $contact=$_REQUEST['contact'];
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];

    include("config.php");
    $query="INSERT INTO `doctor`(`doctor_name`, `email`, `password`, `contact`, `qualification`, `specialization`, `other_description`, `experience`) VALUES ('$doctor_name','$email','$password','$contact','$qualification','$specialization','$other_description','$experience')";
    $res=mysqli_query($conn,$query);
    if($res>0)
    {
        echo "<script>window.location.assign('add_doctor.php?msg=Record Inserted Successfully')</script>";
    }
    else{
        
        echo "<script>window.location.assign('add_doctor.php?msg=Try Again')</script>";
    }
}
?>