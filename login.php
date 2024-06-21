<?php
	include("patient_header.php");
	if(isset($_SESSION["email"]))
    {
        // echo "<script>window.location.assign('welcome.php')</script>";
    }
?>
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Login</span>
          <h1 class="text-capitalize mb-5 text-lg">Login</h1>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- about -->
<div class="about">
	<div class="container">
		<div class="ab-agile">
			<div class="col-md-3"></div>
			<div class="col-md-6 mx-auto my-5">
				<?php
				if(isset($_REQUEST['msg']))
				{
					echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
				}
				?>
				<form method="post">
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control"/>
					</div>
					
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control"/>
					</div>
					
					<button type="submit" name="login" class="btn btn-primary">Login</button>
				</form>

			</div>
			<div class="col-md-3"></div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php
include("footer.php");
?>

<?php 
if(isset($_REQUEST['login']))
{
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];

    include("config.php");
    $query="select * from patient where email='$email' and password='$password'";
    $res=mysqli_query($conn,$query);
    if($row=mysqli_fetch_array($res))
    {
        //create session
        $_SESSION['email']=$email;
		// echo $_SESSION["email"];
        //URL Redirect
        echo "<script>window.location.assign('welcome.php')</script>";
    }
    else{
        
        echo "<script>window.location.assign('login.php?msg=Invalid email or pasword')</script>";
    }
}
?>