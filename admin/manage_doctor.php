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
          <h1 class="text-capitalize mb-5 text-lg">Manage Doctor</h1>
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
                    <tr class="bg-dark text-white">
                        <th>#</th>
                        <th>Doctor Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Contact</th>
                        <th>Qualification</th>
                        <th>Specialization</th>
                        <th>Other Description</th>
                        <th>Experience</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                        $sno =1; 
                        include('config.php');
                        $query=mysqli_query($conn,"SELECT * FROM `doctor`");
                        while($row=mysqli_fetch_array($query))
                        {
                    ?>
                    <tr> 
                        <th scope="row"><?php echo $sno; ?></th> 
                        <td><?php echo $row['doctor_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td><?php echo $row['qualification']; ?></td>
                        <td><?php echo $row['specialization']; ?></td>
                        <td><?php echo $row['other_description']; ?></td>
                        <td><?php echo $row['experience']; ?></td>
                        <td>
                            <a href="update_doctor.php?id=<?php echo $row['id']; ?>">
                                <i class="fa fa-edit text-success"></i>
                            </a>
                        </td>
                        <td>
                            <a href="delete_doctor.php?id=<?php echo $row['id']; ?>">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                        </td>
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