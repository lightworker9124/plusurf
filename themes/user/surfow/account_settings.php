<?php include("header.php"); ?>
<?php include("menu.php"); ?>
            <header>
                <h2><?php _l("settings"); ?></h2>
                <p><?php _l("settings_hint"); ?></p>
			</header>
			<section  class="wrapper style5">
				<div class="content container">
					<div style="margin-top: 50px; text-align: <?php echo Languages::text_align(); ?>" >
					<?php _s("ads/header"); ?>
							<form id="upusername_form" method="post" action="<?php _router("settings"); ?>">
								<div  class="row uniform">
									<div class="12u 12u(xsmall)" >
										<input type="text" name="update_username" value="<?php _u("username"); ?>" placeholder="<?php _l("username"); ?>" required="required" />
									</div>
									<div class="12u 12u(mobile">
										<input type="submit" class="button special" value="<?php _l("update"); ?>" />
									</div>
								</div>
								<div class="row uniform">
									<div class="12u 12u(xsmall)">
										<div id="upusername_alert"></div>
										<?php if($_POST["update_username"]) { include("alerts.php"); } ?>
									</div>
								</div>
							</form>
							<hr>
							
							<form id="upemail_form" method="post" action="<?php _router("settings"); ?>">
								<div  class="row uniform">
									<div class="12u 12u(xsmall)" >
										<input type="email" name="update_email" value="<?php _u("email"); ?>" placeholder="<?php _l("email"); ?>" required="required" />
									</div>
									<div class="12u 12u(mobile">
										<input type="submit" class="button special" value="<?php _l("update"); ?>" />
									</div>
								</div>
								<div class="row uniform">
									<div class="12u 12u(xsmall)">
										<div id="upemail_alert"></div>
										<?php if($_POST["update_email"]) { include("alerts.php"); } ?>
									</div>
								</div>
							</form>
							<hr>
							
							<form id="uppassword_form" method="post" action="<?php _router("settings"); ?>">
								<div  class="row uniform">
									<div class="12u 12u(xsmall)" >
										<input type="password" name="update_password" placeholder="<?php _l("password"); ?>" required="required" />
										<br>
										<input type="password" name="update_password2"  placeholder="<?php _l("password2"); ?>" required="required" />
									</div>
									<div class="12u 12u(mobile">
										<input type="submit" class="button special" value="<?php _l("update"); ?>" />
									</div>
								</div>
								<div class="row uniform">
									<div class="12u 12u(xsmall)">
										<div id="uppassword_alert"></div>
										<?php if($_POST["update_password"]) { include("alerts.php"); } ?>
									</div>
								</div>
							</form>
							
                    <?php _s("ads/footer"); ?>
					</div>
				</div>
			</section>
<?php include("footer.php"); ?>