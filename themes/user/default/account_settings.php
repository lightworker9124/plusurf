<?php include("header.php"); ?>
<?php include("menu.php"); ?>
		<div id="site-wrapper" >
			<section  class="main style3 secondary">
				<div class="content container">
					<header>
						<h2><?php _l("settings"); ?></h2>
						<p><?php _l("settings_hint"); ?></p>
					</header>
					
					<div class="box container 100%">
					<?php _s("ads/header"); ?>
							<form id="upusername_form" method="post" action="<?php _router("settings"); ?>">
								<div  class="row">
									<div class="12u 12u(mobile)" >
										<input type="text" name="update_username" value="<?php _u("username"); ?>" placeholder="<?php _l("username"); ?>" required="required" />
									</div>
									<div class="12u 12u(mobile">
										<input type="submit" class="btn btn-primary" value="<?php _l("update"); ?>" />
									</div>
								</div>
								<div class="row">
									<div class="12u 12u(mobile)">
										<div id="upusername_alert"></div>
										<?php if($_POST["update_username"]) { include("alerts.php"); } ?>
									</div>
								</div>
							</form>
							<hr>
							
							<form id="upemail_form" method="post" action="<?php _router("settings"); ?>">
								<div  class="row">
									<div class="12u 12u(mobile)" >
										<input type="email" name="update_email" value="<?php _u("email"); ?>" placeholder="<?php _l("email"); ?>" required="required" />
									</div>
									<div class="12u 12u(mobile">
										<input type="submit" class="btn btn-primary" value="<?php _l("update"); ?>" />
									</div>
								</div>
								<div class="row">
									<div class="12u 12u(mobile)">
										<div id="upemail_alert"></div>
										<?php if($_POST["update_email"]) { include("alerts.php"); } ?>
									</div>
								</div>
							</form>
							<hr>
							
							<form id="uppassword_form" method="post" action="<?php _router("settings"); ?>">
								<div  class="row">
									<div class="12u 12u(mobile)" >
										<input type="password" name="update_password" placeholder="<?php _l("password"); ?>" required="required" />
										<br>
										<input type="password" name="update_password2"  placeholder="<?php _l("password2"); ?>" required="required" />
									</div>
									<div class="12u 12u(mobile">
										<input type="submit" class="btn btn-primary" value="<?php _l("update"); ?>" />
									</div>
								</div>
								<div class="row">
									<div class="12u 12u(mobile)">
										<div id="uppassword_alert"></div>
										<?php if($_POST["update_password"]) { include("alerts.php"); } ?>
									</div>
								</div>
							</form>
					<?php _s("ads/footer"); ?>
					</div>
				</div>
			</section>
		  </div>
<?php include("footer.php"); ?>