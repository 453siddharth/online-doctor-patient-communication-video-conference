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
          <span class="text-white">Advice</span>
          <h1 class="text-capitalize mb-5 text-lg">Manage Advice</h1>
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
				<table class="table table-bordered table-striped">
                    <tr class="bg-dark text-white">
                        <th>#</th>
                        <th>Doctor</th>
                        <th>Symptom</th>
                        <th>Advice</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                        $sno =1; 
                        include('config.php');
                        $query=mysqli_query($conn,"SELECT * FROM `advices`");
                        while($row=mysqli_fetch_array($query))
                        {
                    ?>
                    <tr> 
                        <th scope="row"><?php echo $sno; ?></th> 
                        <td><?php echo $row['doctor']; ?></td>
                        <td><?php echo $row['symptom']; ?></td>
                        <td><?php echo $row['advice']; ?></td>
                        <td>
                            <a href="update_advice.php?id=<?php echo $row['id']; ?>">
                                <i class="fa fa-edit text-success"></i>
                            </a>
                        </td>
                        <td>
                            <a href="delete_advice.php?id=<?php echo $row['id']; ?>">
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
    $doctor=$_SESSION["doctor_email"];
    $symptom=$_REQUEST['symptom'];
    $advice=$_REQUEST['advice'];
    
    include("config.php");

    $query="INSERT INTO `advices`(`symptom`, `advice`, `doctor`) VALUES ('$symptom','$advice','$doctor')";
    $res=mysqli_query($conn,$query);
    if($res>0)
    {
        echo "<script>window.location.assign('add_advice.php?msg=Record Inserted Successfully')</script>";
    }
    else{
        
        echo "<script>window.location.assign('add_advice.php?msg=Try Again')</script>";
    }
}
?>