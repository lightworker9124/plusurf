<?php include("header.php"); ?>
    <div class="container">
	<div class="row" >
	<div class="col-md-4"></div>
	<div id="update-loginclass" class="col-md-4 panel panel-default modal-content" >
	<div class="panel-body" >
      <form id="admin_login_form" action="<?php _router("admin_login"); ?>" method="post" class="form-signin">
	    <center><img src="<?php _turl(); ?>/img/logo/main-logo.png" style="width: 90%; height: auto;" /></center>
		<hr>
		<div id="admin_login_alert" ></div>
		<?php include("alerts.php");?>
        <h3 class="form-signin-heading">Please sign in</h3>
        <label for="inputEmail" class="sr-only">Username/Email</label>
        <input type="text" id="inputEmail" name="login_username" class="form-control" placeholder="Username/Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="login_password" class="form-control" placeholder="Password" required>
		<br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" >Sign in</button>
      </form>
	  <hr>
	  <a href="<?php _router("admin_rest"); ?>" >Forgot your password ?</a>
	</div>
	</div>
	<div class="col-md-4"></div>
	</div>
    </div>
<?php include("footer.php"); ?>