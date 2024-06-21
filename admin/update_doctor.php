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
 <?php
    include('config.php');
    $query1=mysqli_query($conn,"SELECT * FROM `doctor` where id='$_GET[id]'");
    if($row=mysqli_fetch_array($query1))
    {
        
        $doctor_name=$row['doctor_name'];
        $qualification=$row['qualification'];
        $specialization=$row['specialization'];
        $other_description=$row['other_description'];
        $experience=$row['experience'];
        $contact=$row['contact'];
        $email=$row['email'];
        $password=$row['password'];

    }
?>
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Doctor</span>
          <h1 class="text-capitalize mb-5 text-lg">Update Doctor</h1>
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
                    <input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Doctor Name</label>
                                <input type="text" name="doctor_name" class="form-control" value="<?php echo $doctor_name;?>"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Qualification</label>
                                <input type="text" name="qualification" class="form-control" value="<?php echo $qualification;?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" value="<?php echo $password;?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Specialization</label>
                                <input type="text" name="specialization" class="form-control" value="<?php echo $specialization;?>"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Contact</label>
                                <input type="number" name="contact" min="1" class="form-control" value="<?php echo $contact;?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Other Description</label>
                                <textarea name="other_description" class="form-control"><?php echo $other_description;?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Experience</label>
                                <textarea name="experience" class="form-control"><?php echo $experience;?></textarea>
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
    $id=$_REQUEST['id'];
    $doctor_name=$_REQUEST['doctor_name'];
    $qualification=$_REQUEST['qualification'];
    $specialization=$_REQUEST['specialization'];
    $other_description=$_REQUEST['other_description'];
    $experience=$_REQUEST['experience'];
    $contact=$_REQUEST['contact'];
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];

    include("config.php");
    $query="UPDATE `doctor` SET `doctor_name`='$doctor_name',`email`='$email',`password`='$password',`contact`='$contact',`qualification`='$qualification',`specialization`='$specialization',`other_description`='$other_description',`experience`='$experience' WHERE  `id`='$id'";
    $res=mysqli_query($conn,$query);
    if($res>0)
    {
        echo "<script>window.location.assign('manage_doctor.php?msg=Record Updated Successfully')</script>";
    }
    else{
        
        echo "<script>window.location.assign('manage_doctor.php?msg=Try Again')</script>";
    }
}
?>