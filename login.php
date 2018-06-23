<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
	include 'resources.php'; 
	if(isset($_COOKIE['loginU'])) {
	    header('location: tambah_pembelian.php');
	} 
	?>
	<style>
		hr.style-two {
		    border: 0;
		    height: 1px;
		    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
		}
		.bg { 
		    /* The image used */
		    background-image: url("Logo-login.jpg");

		    /* Full height */
		    height: 100%; 

		    /* Center and scale the image nicely */
		    background-position: center;
		    background-repeat: no-repeat;
		    /*background-size: cover;*/
		}
	</style>
	<title>Login Gentlemen's System</title>
</head>
<body class="bg">
	<?php
        if(!isset($_SESSION['notif'])) {
            echo "";
        }
        else { 
          if($_SESSION['notif'] == "loginSalah") { ?>
            <div id="error-alert" class="alert alert-danger alert-solid" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="d-flex align-items-center justify-content-start">
                <i class="fa fa-times"></i>
                <span><strong>Error!</strong> Username / Password tidak cocok </span>
              </div><!-- d-flex -->
            </div><!-- alert -->
            <?php
            unset($_SESSION['notif']);
          }
        } ?>
	<!-- Preloader -->
	<div id="preloader">
		<div id="status"><i class="fa fa-spinner fa-spin"></i></div>
	</div>
	<div class="col-md-4"></div>

	<div class="col-md-4" style="margin-top: 10%; ">
		<form action="proses.php?cmd=login" method="POST" id="login">
			<hr class="style-two">
				<h1 style="text-align: center;color: black">Admin Login</h1>
			<hr class="style-two">
			<div class="form-control" style="width:100%; margin:0 auto">
				<div class="form-group">
		          <input class="form-control" type="text" name="username" placeholder="Masukkan username" style="font-size: 150%" required="true">
		        </div><!-- form-group -->
		        <div class="form-group">
		          <input class="form-control" type="password" name="password" placeholder="Masukkan password" style="font-size: 150%" required="true">
		        </div><!-- form-group -->
		        <button class="btn btn-info btn-block" style="font-size: 125%">Login</button>
		  	</div>
	  	</form>
  	</div>
	<div class="col-md-4"></div>
</body>

	<?php
	include 'resources2.php';
	?>
    <script type="text/javascript">
      $("#success-alert").fadeTo(3000, 500).slideUp(500);
      $("#error-alert").fadeTo(3000, 500).slideUp(500);
    </script>

</html>