<?php
	include("patient_header.php");
	if(!isset($_SESSION["email"]))
    {
        echo "<script>window.location.assign('login.php')</script>";
    }
?>
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Prescription</span>
          <h1 class="text-capitalize mb-5 text-lg">Prescription</h1>
        </div>
      </div>
    </div>
  </div>
</section>
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
                <h3>Add Comment</h3>
                <form method="post">
                    <div class="row">
                        <div class="col-md-11">
                            <input type="hidden" name="appointment_id" value="<?php echo $_GET['id'] ?>">
                            <input type="text" name="comment" class="form-control">
                        </div>
                        <div class="col-md-1">
                            <button type="submit" name="submit" class="btn btn-primary d-inline">Add</button>
                        </div>
                    </div>
                </form>
                <hr>
                <h3>Comments List</h3>
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Query</th>
                            <th>Doctor's Reply</th>
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
    $appointment_id = $_REQUEST['appointment_id'];
    $comment = $_REQUEST['comment'];

    include("config.php");
    $query=mysqli_query($conn,"INSERT INTO `query`(`appointment_id`, `query`) VALUES ('$appointment_id','$comment')");
    if($query>0)
    {
        echo "<script>window.location.assign('view_prescription.php?id=$appointment_id&msg=Sent')</script>";
    }
    else{
        echo "<script>window.location.assign('view_prescription.php?id=$appointment_id&msg=Try Again')</script>";
    }
}
?>