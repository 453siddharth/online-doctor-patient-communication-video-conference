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
          <h1 class="text-capitalize mb-5 text-lg">Add Advice</h1>
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Specialization</label>
                                <select name="symptom" class="form-control">
                                    <option value="" selected disabled>Select Specialization</option>
                                    <?php
                                        $sno =1; 
                                        include('config.php');
                                        $query=mysqli_query($conn,"SELECT  DISTINCT(specialization) FROM `doctor`");
                                        while($row=mysqli_fetch_array($query))
                                        {
                                            echo "<option>".$row['specialization']."</option>";
                                        }
                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Advice</label>
                        <textarea name="advice" class="form-control"></textarea>
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