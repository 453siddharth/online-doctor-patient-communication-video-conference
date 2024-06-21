<?php
	include("doctor_header.php");
	if(!isset($_SESSION["doctor_email"]))
    {
        echo "<script>window.location.assign('index.php')</script>";
    }
?>
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Approved Appointment</span>
          <h1 class="text-capitalize mb-5 text-lg">Doctor Appointment</h1>
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
                        <th>Doctor Name</th>
                        <th>Patient</th>
                        <th>Disease</th>
                        <th>Symptoms</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $sno =1; 
                        include('config.php');
                        $query=mysqli_query($conn,"SELECT `appointment`.*,`doctor`.`doctor_name`,`patient`.`name` FROM `appointment` INNER JOIN `doctor` on `appointment`.`doctor_id`=`doctor`.`email` INNER JOIN `patient` on `appointment`.`patient_id`=`patient`.`email` where `appointment`.`doctor_id`='$_SESSION[doctor_email]' and `appointment`.`status`='Approve'");
                        while($row=mysqli_fetch_array($query))
                        {
                    ?>
                    <tr> 
                        <th scope="row"><?php echo $sno; ?></th> 
                        <td><?php echo $row['doctor_name']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['disease']; ?></td>
                        <td><?php echo $row['symptoms']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td>
                            <a href="add_prescription.php?id=<?php echo $row['id']?>" class="btn btn-success">Add Prescription</a>
                            <a href="view_prescription.php?id=<?php echo $row['id']?>" class="btn btn-info">View Prescription</a>
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