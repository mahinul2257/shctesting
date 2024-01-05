<?php
session_start();
//error_reporting(0);
include('admin/include/config.php');
include('admin/include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$gender=$_POST['gender'];

	$sql = mysqli_query($con, "Update users set fullName='$fname',address='$address',city='$city',gender='$gender' where email='".$_SESSION['login']."'");
	if($sql){
		echo "<script>alert('Your Profile updated Successfully');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User | Edit Profile</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="admin/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="admin/vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="admin/vendor/themify-icons/themify-icons.min.css">
		<link href="admin/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="admin/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="admin/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="admin/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="admin/vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="admin/vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="admin/vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="admin/assets/css/styles.css">
		<link rel="stylesheet" href="admin/assets/css/plugins.css">
		<link rel="stylesheet" href="admin/assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body>
		<div id="app">		
			<?php include('admin/include/sidebar.php');?>
			<div class="app-content">
				<?php include('admin/include/header.php');?>
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">User | Edit Profile</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>User </span>
									</li>
									<li class="active">
										<span>Edit Profile</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Edit Profile </h5>
												</div>
												<div class="panel-body">
													<?php 
													$sql = mysqli_query($con, "select * from users where email='".$_SESSION['login']."'");
													while($data=mysqli_fetch_array($sql)){ ?>
													<form role="form" name="edit" method="post">
														<div class="form-group">
															<label for="fname">User Name</label>
															<input type="text" name="fname" class="form-control" value="<?php echo htmlentities($data['fullName']);?>" />
														</div>
														<div class="form-group">
															<label for="address">
																Address
															</label>
															<textarea name="address" class="form-control"><?php echo htmlentities($data['address']);?></textarea>
														</div>
														<div class="form-group">
															<label for="city">
																City
															</label>
															<input type="text" name="city" class="form-control" required="required" value="<?php echo htmlentities($data['city']);?>" />
														</div>

														<div class="form-group">
															<label for="gender">
																Gender
															</label>
															<input type="text" name="gender" class="form-control" required="required" value="<?php echo htmlentities($data['gender']);?>" />
														</div>

														<div class="form-group">
															<label for="fess">
																User Email
															</label>
															<input type="email" name="uemail" class="form-control" readonly="readonly" value="<?php echo htmlentities($data['email']);?>" />
														</div>

														<?php } ?>
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Update
														</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
										</div>
										<div class="col-lg-12 col-md-12">
											<div class="panel panel-white"></div>
										</div>
									</div>
								</div>
						
						<!-- end: BASIC EXAMPLE -->
					
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
			<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
			<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="admin/vendor/jquery/jquery.min.js"></script>
		<script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="admin/vendor/modernizr/modernizr.js"></script>
		<script src="admin/vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="admin/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="admin/vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="admin/vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="admin/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="admin/vendor/autosize/autosize.min.js"></script>
		<script src="admin/vendor/selectFx/classie.js"></script>
		<script src="admin/vendor/selectFx/selectFx.js"></script>
		<script src="admin/vendor/select2/select2.min.js"></script>
		<script src="admin/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="admin/vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="admin/assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="admin/assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
