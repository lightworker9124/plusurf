	<?php if(!Check::is_routed("admin_login") && !Check::is_routed("admin_rest") && !Check::is_routed("install")) { ?>
	<div id="admin-footer" >
		<?php echo date("Y"); ?> &copy; <?php _s("generale/name"); ?>. 
		<!-- DO NOT REMOVE THIS IF YOU DON'T HAVE AN (EXTEND) LISENCE FROM WEBSITE.NET -->
		All rights reserved. Developed By : <a target="_blank" href="http://wesparklesolutions.com">wesparkle solutions</a>
		<!-- DO NOT REMOVE THIS IF YOU DON'T HAVE AN (EXTEND) LISENCE FROM WEBSITE.NET -->
		- Thanks for choosing plusurf
	</div>
	<?php } ?>
	</div>
		<?php Template::js("/js/bootstrap.js"); ?>
		<?php Template::js("/js/notif.js"); ?>
		<?php Template::js("/js/jquery.nanoscroller.min.js"); ?>
		<?php Template::js("/js/menu.js"); ?>
		<?php Template::js("/js/ready.js"); ?>
		<script>
		new AdminMenu();
		</script>
	</body>
</html>