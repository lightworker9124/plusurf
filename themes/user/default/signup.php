<?php include("header.php"); ?>
<?php include("menu.php"); 
$facebook = s("socialauth/facebook");
$twitter = s("socialauth/twitter");
$google = s("socialauth/google");
?>
		<div id="site-wrapper" >
        
			<section  class="main style3 secondary">
				<div class="content container">
					<header>
						<h2><?php _l("get_start"); ?></h2>
						<p><?php _l("signup_hint"); ?></p>
					</header>
					<div class="box container 75%">
                    
                    <?php _s("ads/header"); ?>
							<?php include("alerts.php"); ?>
							<div class="12u 12u(mobile)">
                            <?php if(!empty($facebook["id"]) && !empty($facebook["secret"])) { ?>
									<a href="Javascript::void();" onclick="window.location = '<?php _router("social_connect"); ?>?access=Facebook'; " class="btn fg-white" style="background-color: #4A67A0;"  ><i class="fg-white fa fa-facebook" ></i> Facebook</a></li>
                            <?php } ?>
                            <?php if(!empty($twitter["key"]) && !empty($twitter["secret"])) { ?>
                                    <a href="Javascript::void();" onclick="window.location = '<?php _router("social_connect"); ?>?access=Twitter'; " class="btn fg-white" style="background-color: #1DA3F2;"  ><i class="fg-white fa fa-twitter" ></i> Twitter</a></li>
                            <?php } ?>
                            <?php if(!empty($google["id"]) && !empty($google["secret"])) { ?>
                                    <a href="Javascript::void();" onclick="window.location = '<?php _router("social_connect"); ?>?access=Google'; " class="btn fg-white" style="background-color: #D73A32;"  ><i class="fg-white fa fa-google-plus" ></i> Google</a></li>
                            <?php } ?>
                            </div>
                            <hr>
							<div id="signup_alert"></div>
							<form id="signup_form" method="post" action="<?php _router("signup"); ?>">
								<div class="row 50%">
									<div class="6u 12u(mobile)"><input type="text" value="<?php echo strip_tags(Request::old("signup_username")); ?>" name="signup_username" placeholder="<?php _l("username"); ?>" required="required" /></div>
									<div class="6u 12u(mobile)"><input type="email" value="<?php echo strip_tags(Request::old("signup_email")); ?>" name="signup_email" placeholder="<?php _l("email"); ?>" required="required" /></div>
								</div>
								<div class="row 50%">
									<div class="6u 12u(mobile)"><input type="password" value="<?php echo strip_tags(Request::old("signup_password")); ?>" name="signup_password" placeholder="<?php _l("password"); ?>" required="required" /></div>
									<div class="6u 12u(mobile)"><input type="password" value="" name="signup_password2" placeholder="<?php _l("password2"); ?>" required="required" /></div>
								</div>
								<div class="row 50%">
									<div class="12u 12u(mobile)"><input checked="" type="checkbox" name="signup_agree" /> <?php _l("i_agree"); ?> <a href="<?php _router("page", array("name" => "tos")); ?>"><?php _l("tos"); ?></a></div>
								</div>
								<input type="submit" value="<?php _l("signup"); ?>" />
                                <hr>
							</form>
							<br><a href="<?php _router("login"); ?>" ><?php _l("already_user"); ?></a>
                    <?php _s("ads/footer"); ?>
					</div>
				</div>
			</section>
          
		  </div>
<?php include("footer.php"); ?>