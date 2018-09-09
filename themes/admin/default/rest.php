<?php include("header.php"); ?>
    <div class="container">
	<div class="row" >
	<div class="col-md-4"></div>
	<div id="update-loginclass" class="col-md-4 panel panel-default modal-content" >
	<div class="panel-body" >
      <form id="admin_rest_form" action="<?php _router("admin_rest"); ?>" method="post" class="form-signin">
	    <center><img src="<?php _turl(); ?>/img/logo/main-logo.png" style="width: 90%; height: auto;" /></center>
		<hr>
		<div id="admin_rest_alert" ></div>
		<?php include("alerts.php");?>
        <h3 class="form-signin-heading">Resetting Your Password</h3>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="text" id="inputEmail" name="rest_email" class="form-control" placeholder="Email address" required autofocus>
		<br>
		<div class="g-recaptcha" data-sitekey="<?php _s("recaptcha/publickey"); ?>"></div>
		<script src='https://www.google.com/recaptcha/api.js'></script>
        <button class="btn btn-lg btn-primary btn-block" type="submit" >Send</button>
      </form>
	  <hr>
	  <a href="<?php _router("admin_login"); ?>" >Back to Login</a>
	</div>
	</div>
	<div class="col-md-4"></div>
	</div>
    </div>
<?php include("footer.php"); ?>