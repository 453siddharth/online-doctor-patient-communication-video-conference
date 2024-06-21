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
<?php
    $sno =1; 
    include('config.php');
    $query=mysqli_query($conn,"SELECT * FROM `advices` where id='$_REQUEST[id]'");
    if($row=mysqli_fetch_array($query))
    {
        $s = $row['symptom'];
        $a = $row['advice'];
        $d = $row['doctor'];
    }
?>
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Advice</span>
          <h1 class="text-capitalize mb-5 text-lg">Update Advice</h1>
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
                    <input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>">
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
                                            if($row["specialization"] == $s )
                                            {
                                                echo "<option selected>".$row['specialization']."</option>";
                                            }
                                            else{
                                                echo "<option>".$row['specialization']."</option>";
                                            }
                                        }
                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Advice</label>
                        <textarea name="advice" class="form-control"><?php echo $a; ?></textarea>
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
    $id=$_REQUEST["id"];
    $doctor=$_SESSION["doctor_email"];
    $symptom=$_REQUEST['symptom'];
    $advice=$_REQUEST['advice'];
    
    include("config.php");

    $query="UPDATE `advices` set `symptom`='$symptom', `advice`='$advice', `doctor`='$doctor' where id='$id'";
    $res=mysqli_query($conn,$query);

    if($res>0)
    {
        echo "<script>window.location.assign('manage_advice.php?msg=Record Update Successfully')</script>";
    }
    else{
        echo "<script>window.location.assign('manage_advice.php?msg=Try Again')</script>";
    }
}
?>