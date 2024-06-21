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
          <span class="text-white">Patient</span>
          <h1 class="text-capitalize mb-5 text-lg">View Patient</h1>
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
                    <tr class="text-white bg-dark">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>Contact</th>
                        <th>Address</th>
                    </tr>
                    <?php
                        $sno =1; 
                        include('config.php');
                        $query=mysqli_query($conn,"SELECT * FROM `patient`");
                        while($row=mysqli_fetch_array($query))
                        {
                    ?>
                    <tr> 
                        <th scope="row"><?php echo $sno; ?></th> 
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['dob']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td><?php echo $row['address']; ?></td>
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
