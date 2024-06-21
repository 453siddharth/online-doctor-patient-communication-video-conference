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
          <span class="text-white">Appointment</span>
          <h1 class="text-capitalize mb-5 text-lg">Accept Appointment</h1>
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
                        <th>Patient</th>
                        <th>Disease</th>
                        <th>Symptoms</th>
                        <th>Status</th>
                    </tr>
                    <?php
                        $sno =1; 
                        include('config.php');
                        $query=mysqli_query($conn,"SELECT `appointment`.*,`doctor`.`doctor_name`,`patient`.`name` FROM `appointment` INNER JOIN `doctor` on `appointment`.`doctor_id`=`doctor`.`email` INNER JOIN `patient` on `appointment`.`patient_id`=`patient`.`email` where `appointment`.`doctor_id`='$_SESSION[doctor_email]' and `appointment`.`status`='pending' and `appointment`.`id`='$_REQUEST[id]'");
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
                    </tr>
                    <?php
                        $sno++;
                        }
                    ?> 
                </table>
                <hr>
                <h3 class="text-center">Appointment Response</h3>
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>">
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Meeting Link</label>
                        <input type="text" class="form-control" name="meeting_link">
                    </div>
                    <button class="btn btn-dark" type="submit" name="approved">Submit</button>
                </form>

			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php
include("footer.php");
?>
<?php
if(isset($_REQUEST["approved"]))
{
    $doctor_response = $_REQUEST["description"];
    $meeting_link = $_REQUEST["meeting_link"];

    include("config.php");
    $q=mysqli_query($conn,"UPDATE `appointment` SET `status`='Approve' , doctor_response='$doctor_response', meeting_link='$meeting_link'  WHERE `id`=$_REQUEST[id]");
    if($q>0)
    {
        echo "<script>window.location.assign('view_appointment.php?msg=Appointment Accepted')</script>";
    }
    else{
        echo "<script>window.location.assign('view_appointment.php?msg=Try Again')</script>";
    }
}
?>