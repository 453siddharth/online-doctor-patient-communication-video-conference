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
          <span class="text-white">Prescription</span>
          <h1 class="text-capitalize mb-5 text-lg">Doctor Prescription</h1>
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
                        <th>Prescription List</th>
                        <th>Other Description</th>
                    </tr>
                    <?php
                        $sno =1; 
                        include('config.php');
                        $query=mysqli_query($conn,"SELECT * FROM `prescription` where appointment_id ='$_GET[id]' ");
                        while($row=mysqli_fetch_array($query))
                        {
                    ?>
                    <tr> 
                        <th scope="row"><?php echo $sno; ?></th> 
                        <td><?php echo $row['prescription_list']; ?></td>
                        <td><?php echo $row['other_description']; ?></td>
                    </tr>
                    <?php
                        $sno++;
                        }
                    ?> 
                </table>
                <hr>
                <h3>Comments List</h3>
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Query</th>
                            <th>Doctor's Reply</th>
                            <th>Reply</th>
                        </tr>
                    </thead>
                    <?php
                        $sno1 =1; 
                        include('config.php');
                        $query1=mysqli_query($conn,"SELECT * FROM `query` where appointment_id ='$_GET[id]' ");
                        while($row1=mysqli_fetch_array($query1))
                        {
                    ?>
                    <tr> 
                        <th scope="row"><?php echo $sno1; ?></th> 
                        <td><?php echo $row1['query']; ?></td>
                        <td><?php echo $row1['doctor_reply']; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="query_id" value="<?php echo $row1['id']?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="doctor_reply" class="form-control" placeholder="Enter Revert message">
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <button type="submit" name="submit" class="btn btn-primary btn-block">Send</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <?php
                        $sno1++;
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
    $query_id = $_REQUEST['query_id'];
    $doctor_reply = $_REQUEST['doctor_reply'];

    include("config.php");
    $query=mysqli_query($conn,"UPDATE `query` SET `doctor_reply`='$doctor_reply' WHERE `id`='$query_id'");
    if($query>0)
    {
        echo "<script>window.location.assign('view_prescription.php?id=$_GET[id]&msg=Sent')</script>";
    }
    else{
        echo mysqli_error($conn);
        die();
        echo "<script>window.location.assign('view_prescription.php?id=$_GET[id]&msg=Try Again')</script>";
    }
}
?>