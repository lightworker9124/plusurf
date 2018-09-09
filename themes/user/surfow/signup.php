<?php include("header.php"); ?>
<?php include("menu.php"); 
$facebook = s("socialauth/facebook");
$twitter = s("socialauth/twitter");
$google = s("socialauth/google");
?>
            <header>
                <h2><?php _l("get_start"); ?></h2>
                <p><?php _l("signup_hint"); ?></p>
			</header>
			<section  class="wrapper style5">
				<div class="content container">
					<div style="margin-top: 40px; text-align: <?php echo Languages::text_align(); ?>" >
                    <?php _s("ads/header"); ?>
							<?php include("alerts.php"); ?>
						
                            <hr>
							<div id="signup_alert"></div>
							<form id="signup_form" method="post" action="<?php _router("signup"); ?>">
								<div class="row uniform">
									<div class="6u 12u(xsmall)"><input type="text" value="<?php echo strip_tags(Request::old("signup_username")); ?>" name="signup_username" placeholder="<?php _l("username"); ?>" required="required" /></div>
									<div class="6u 12u(xsmall)"><input type="email" value="<?php echo strip_tags(Request::old("signup_email")); ?>" name="signup_email" placeholder="<?php _l("email"); ?>" required="required" /></div>
									<div class="6u 12u(xsmall)"><input type="password" value="<?php echo strip_tags(Request::old("signup_password")); ?>" name="signup_password" placeholder="<?php _l("password"); ?>" required="required" /></div>
									<div class="6u 12u(xsmall)"><input type="password" value="" name="signup_password2" placeholder="<?php _l("password2"); ?>" required="required" /></div>
								</div>
								<div class="row uniform">
									<div class="12u 12u(xsmall)">
                                        <input id="check_agree" checked="" type="checkbox" name="signup_agree" /> 
                                        <label for="check_agree" >
                                        <?php _l("i_agree"); ?> <a href="<?php _router("page", array("name" => "tos")); ?>"><?php _l("tos"); ?></a>
                                        </label>
                                    </div>
								</div>
                                <br>
								<input class="button special"  type="submit" value="<?php _l("signup"); ?>" />
                                <hr>
							</form>
							<a class="btn btn-primary" href="<?php _router("login"); ?>" ><?php _l("already_user"); ?></a>
                    <?php _s("ads/footer"); ?>
					</div>
				</div>
			</section>
<?php include("footer.php"); ?>