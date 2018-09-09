<?php include("header.php"); ?>
<?php include("menu.php"); 
$facebook = s("socialauth/facebook");
$twitter = s("socialauth/twitter");
$google = s("socialauth/google");
?>
            <header>
				<h2><?php _l("login"); ?></h2>
				<p><?php _l("login_hint"); ?></p>
			</header>
			<section  class="wrapper style5">
				<div class="content container">
					<div style="margin-top: 40px; text-align: <?php echo Languages::text_align(); ?>" >
                    <?php _s("ads/header"); ?>

                            </div>
                            <hr>
							<div id="login_alert"></div>
							<form id="login_form" method="post" action="<?php _router("login"); ?>">
								<div class="row uniform">
									<div class="6u 12u(xsmall)"><input type="text" name="login_username" placeholder="<?php _l("username_or_email"); ?>" required="required" /></div>
									<div class="6u 12u(xsmall)"><input type="password" name="login_password" placeholder="<?php _l("password"); ?>" required="required" /></div>
								</div>
                                <br>
                                <input type="submit" value="<?php _l("login"); ?>" />
                                <hr>
							</form>
                            <a class="btn btn-primary" href="<?php _router("rest"); ?>" ><?php _l("restpass"); ?></a>
                            <a class="btn btn-primary"  href="<?php _router("resend"); ?>" ><?php _l("ask_resend"); ?></a>
                    <?php _s("ads/footer"); ?>
					</div>
				</div>
			</section>
<?php include("footer.php"); ?>