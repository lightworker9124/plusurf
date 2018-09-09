<?php include("settings.php"); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <?php Template::title(get('title1') . " - " . get('title2')); ?>
		<?php Template::description(get('description')); ?>
		<?php Template::keywords(get('keywords')); ?>
		<?php Template::author("http://wesparklesolutions.com"); ?>
        <?php Template::favicon("/favicon.ico"); ?>
		<?php Template::og_title(get('title1') . " - " . get('title2')); ?>
		<?php Template::og_image(get('og_image')); ?>
		<?php Template::og_site_name(get('title1')); ?>
		<?php Template::og_description(get('description')); ?>
		
		<!-- Config -->
        <?php Template::jsconfig(); ?>
		
		<!-- Javascript files -->
		<?php Template::js("/js/jquery.min.js"); ?>
		<?php Template::js("/js/functions.js"); ?>
		<?php Template::js("/js/classie.js"); ?>
		<?php Template::js("/js/Chart.min.js"); ?>
		
		<!--[if lte IE 8]>
		<?php Template::js("/js/html5shiv.js"); ?>
		<![endif]-->
		
		<!-- Css files -->
		<?php Template::css("/css/bootstrap.css"); ?>
		<?php Template::css("/css/font-awesome.min.css"); ?>
		<?php Template::css("/css/main.css"); ?>
		
		<?php 
		if(Check::is_routed("admin_login") or Check::is_routed("admin_rest") or Check::is_routed("install"))
		{
			Template::css("/css/login.css");
		}
		?>
        <?php 
		if(Check::is_routed("admin_settings"))
		{
			Template::css("/css/multi-select.css");
            Template::js("/js/jquery.multi-select.js");
		}
		?>
	</head>
	<body id="body" >
	
	<div id="admin-wrap" >
<?php if(!Check::is_routed("admin_login") && !Check::is_routed("admin_rest") && !Check::is_routed("install")) { ?>
	<?php include("menu.php"); ?>
<?php } ?>