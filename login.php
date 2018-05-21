<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
	include 'resources.php'; 
	//include 'sql.php';
	if(isset($_COOKIE['loginU'])) {
	    header('location: tambah_pembelian.php');
	} 
	?>
	<title>Login Gentlemen's System</title>
</head>
<body>
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
		<div class="form-control" style="width:100%; margin:0 auto">
	        <h1>Silahkan Login untuk melanjutkan</h1>
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