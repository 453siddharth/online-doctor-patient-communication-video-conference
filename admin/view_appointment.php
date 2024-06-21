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
          <span class="text-white">Appointment</span>
          <h1 class="text-capitalize mb-5 text-lg">View Appointment</h1>
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
                        <th>Patient Name</th>
                        <th>Doctor Name</th>
                        <th>Disease</th>
                        <th>Symptoms</th>
                        <th>Response</th>
                        <th>Meeting Link</th>
                        <th>Status</th>
                    </tr>
                    <?php
                        $sno =1; 
                        include('config.php');
                        $query=mysqli_query($conn,"SELECT `appointment`.*,`doctor`.`doctor_name`,`patient`.`name` FROM `appointment` INNER JOIN `patient` on `appointment`.`patient_id`=`patient`.`email` INNER JOIN `doctor` on `appointment`.`doctor_id`=`doctor`.`email`");
                        while($row=mysqli_fetch_array($query))
                        {
                    ?>
                    <tr> 
                        <th scope="row"><?php echo $sno; ?></th> 
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['doctor_name']; ?></td>
                        <td><?php echo $row['disease']; ?></td>
                        <td><?php echo $row['symptoms']; ?></td>
                        <td>
                          <?php echo $row['doctor_response']; ?>
                        </td>
                        <td>
                          <?php
                          if($row['meeting_link'])
                          {
                          ?>
                            <a href="<?php echo $row['meeting_link']; ?>" target="_blank" class="btn btn-warning btn-sm"> Join Meeting </a>
                          <?php
                          }
                          ?>
                        </td>
                        <td><?php echo $row['status']; ?></td>
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
