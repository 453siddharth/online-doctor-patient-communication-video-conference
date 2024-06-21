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
          <span class="text-white">Profile</span>
          <h1 class="text-capitalize mb-5 text-lg">Doctor Profile</h1>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- about -->
<div class="about">
	<div class="container">
       <div class="ab-agile">
			<div class="col-md-12 mx-auto my-5">
				<?php
				if(isset($_REQUEST['msg']))
				{
					echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
				}
				?>
				<table class="table table-bordered table-striped">
                    <?php
                        $sno =1; 
                        include('config.php');
                        $query=mysqli_query($conn,"SELECT * FROM `doctor` where email='$_SESSION[doctor_email]'");
                        while($row=mysqli_fetch_array($query))
                        {
                    ?>
                    <tr> 
                        <th scope="row">Name</th> 
                        <td><?php echo $row['doctor_name']; ?></td>
                    </tr>
                    <tr> 
                        <th scope="row">Email</th> 
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <tr> 
                        <th scope="row">Contact</th> 
                        <td><?php echo $row['contact']; ?></td>
                    </tr>
                    <tr> 
                        <th scope="row">Qualification</th> 
                        <td><?php echo $row['qualification']; ?></td>
                    </tr>
                    <tr> 
                        <th scope="row">Specialization</th> 
                        <td><?php echo $row['specialization']; ?></td>
                    </tr>
                    <tr> 
                        <th scope="row">Other Description</th> 
                        <td><?php echo $row['other_description']; ?></td>
                    </tr>
                    <tr> 
                        <th scope="row">Experience</th> 
                        <td><?php echo $row['experience']; ?></td>
                    </tr>
                    <?php
                        $sno++;
                        }
                    ?> 
                </table>
			</div>
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