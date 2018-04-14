<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
	include 'resources.php'; 
	include 'sql.php';
	?>
	<title>Login Gentlemen's System</title>
</head>
<body>
	<?php
	$expireAfter = 1;
	//Check to see if our "last action" session
	//variable has been set.
	if(isset($_SESSION['last_action'])){
	    
	    //Figure out how many seconds have passed
	    //since the user was last active.
	    $secondsInactive = time() - $_SESSION['last_action'];
	    
	    //Convert our minutes into seconds.
	    $expireAfterSeconds = $expireAfter * 60;
	    
	    //Check to see if they have been inactive for too long.
	    if($secondsInactive >= $expireAfterSeconds){
	        //User has been inactive for too long.
	        //Kill their session.
	        session_unset();
	        session_destroy();
	    }
	    
	}
	//Assign the current timestamp as the user's
	//latest activity
	$_SESSION['last_action'] = time();


        if(!isset($_SESSION['notif'])) {
            echo "";
        }
        else { 
          if($_SESSION['notif'] == "error") { ?>
            <div id="error-alert" class="alert alert-danger alert-solid" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="d-flex align-items-center justify-content-start">
                <i class="fa fa-times"></i>
                <span><strong>Error!</strong> SQL Error!</span>
              </div><!-- d-flex -->
            </div><!-- alert -->
            <?php
            unset($_SESSION['notif']);
          }
          else if ($_SESSION['notif'] == "loginGagal") { ?>
            <div id="success-alert" class="alert alert-success alert-solid" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="d-flex align-items-center justify-content-start">
                <i class="fa fa-check-circle"></i>
                <span><strong>Sukses!</strong> Data hadiah berhasil dimasukkan.</span>
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

	<div class="col-md-4" style="margin-top: 20%; ">
		<form action="proses.php?cmd=login" method="POST" id="login">
		<div class="form-control" style="width:100%; margin:0 auto">
	        <h1>Silahkan Login untuk melanjutkan</h1>
	        <div class="form-group">
	          <input class="form-control" type="text" name="username" placeholder="Masukkan username" style="font-size: 150%">
	        </div><!-- form-group -->
	        <div class="form-group">
	          <input class="form-control" type="password" name="password" placeholder="Masukkan password" style="font-size: 150%">
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

</html>