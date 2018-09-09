<?php include("header.php"); ?>
<script>
$(document).ready(function(){
	$("#install_form").submit(function(e){
		e.preventDefault();
		ajax_post('install_form', 'install_alert', 1, app_admin_url, true);
	});
});
	
</script>
    <div class="container">
	<div class="row" >
	<div class="col-md-3"></div>
	<div id="update-loginclass" class="col-md-6 panel panel-default modal-content" >
	<div class="panel-body" >
      <form id="install_form" action="<?php _router("install"); ?>" method="post" class="form-signin">
		<hr>
		<div id="install_alert" ></div>
		<?php include("alerts.php");?>
        <h3 class="form-signin-heading">Create admin account</h3>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputEmail" name="admin_username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Email</label>
		<input type="text" id="inputEmail" name="admin_email" class="form-control" placeholder="Email" required >
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="admin_password" class="form-control" placeholder="Password" required>
		<label for="inputPassword" class="sr-only">Repeat Password</label>
        <input type="password" id="inputPassword" name="admin_password2" class="form-control" placeholder="Password" required>
		<br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" >Create</button>
      </form>
	  <hr>
	</div>
	</div>
	<div class="col-md-3"></div>
	</div>
    </div>
<?php include("footer.php"); ?>