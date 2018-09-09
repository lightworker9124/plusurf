<?php include("header.php"); ?>
	<div id="admin-body" >
		<div id="header-title"> 
			<a href="<?php _router("admin_home"); ?>" data-original-title="Admin Panel" class="tip-bottom"><i class="fa fa-home"></i> Admin Panel</a>
			<a href="<?php _router("admin_pages"); ?>" data-original-title="Pages" class="tip-bottom"><i class="fa fa-table"></i> Pages</a>
		</div>
		<div id="admin-content" >
		<div class="row" >
		<div class="col-md-12 main panel panel-default">
		<div class="panel-body" >
			<h1 class="page-header"><i class="fa fa-table" ></i> Pages</h1>
			<form id="update_pages_form" action="<?php _router("admin_pages"); ?>" method="post" >
			<div class="form-group">
			  <label class="control-label" for="inputDefault">Privacy page - <a target="_blank" href="<?php _router("page", array("name" => "privacy")); ?>">show</a></label>
			  <textarea style="height: 500px;" placeholder="Privacy page (TEXT - HTML )" class="form-control" name="update_privacy" id="inputDefault" type="text"><?php echo htmlentities(s("pages/privacy")); ?></textarea>
			</div>
			<div class="form-group">
			  <label class="control-label" for="inputDefault">About us page - <a target="_blank" href="<?php _router("page", array("name" => "about-us")); ?>">show</a></label>
			  <textarea style="height: 500px;" placeholder="About us page (TEXT - HTML )" class="form-control" name="update_about_us" id="inputDefault" type="text"><?php echo htmlentities(s("pages/about-us")); ?></textarea>
			</div>
			<div class="form-group">
			  <label class="control-label" for="inputDefault">Terms of service page - <a target="_blank" href="<?php _router("page", array("name" => "tos")); ?>">show</a></label>
			  <textarea style="height: 500px;" placeholder="Terms of service page (TEXT - HTML )" class="form-control" name="update_tos" id="inputDefault" type="text"><?php echo htmlentities(s("pages/tos")); ?></textarea>
			</div>
			<div class="form-group">
			  <input class="btn btn-primary btn-lg" value="Update" type="submit"/>
			</div>
			<?php include("alerts.php"); ?>
			<div id="update_pages_alert" ></div>
			</form>
        </div>
		</div>
		</div>
		</div>
	</div>
<?php include("footer.php"); ?>