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
						<h2><?php _l("login"); ?></h2>
						<p><?php _l("login_hint"); ?></p>
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
							<div id="login_alert"></div>
							<form id="login_form" method="post" action="<?php _router("login"); ?>">
								<div class="row 50%">
									<div class="6u 12u(mobile)"><input type="text" name="login_username" placeholder="<?php _l("username_or_email"); ?>" required="required" /></div>
									<div class="6u 12u(mobile)"><input type="password" name="login_password" placeholder="<?php _l("password"); ?>" required="required" /></div>
                                </div>
                                <br>
                                <input type="submit" value="<?php _l("login"); ?>" />
                                <hr>
							</form>
                            
							<div class="row">
								<div class="6u 12u(mobile">
									<a href="<?php _router("rest"); ?>" ><?php _l("restpass"); ?></a></li>
								</div>
								<div class="6u 12u(mobile">
									<a href="<?php _router("resend"); ?>" ><?php _l("ask_resend"); ?></a></li>
								</div>
							</div>
                            
                    <?php _s("ads/footer"); ?>
					</div>
				</div>
			</section>
          
		  </div>
<?php include("footer.php"); ?>