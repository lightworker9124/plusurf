<?php include("header.php"); ?>
<?php include("menu.php"); ?>
		<div id="site-wrapper" >
			<section  class="main style3 secondary">
				<div class="content container">
					<header>
						<h2><?php _l("contact"); ?></h2>
						<p><?php _l("contact_hint"); ?></p>
					</header>
					<div class="box container 75%">
                    <?php _s("ads/header"); ?>
							<?php include("alerts.php"); ?>
							
							<div id="contact_alert"></div>
							<form id="contact_form" method="post" action="<?php _router("contact"); ?>">
								<div class="row 50%">
									<div class="6u 12u(mobile)"><input type="text" value="<?php echo strip_tags(Request::old("contact_name")); ?>" name="contact_name" placeholder="<?php _l("name"); ?>" required="required" /></div>
									<div class="6u 12u(mobile)"><input type="email" value="<?php echo strip_tags(Request::old("contact_email")); ?>" name="contact_email" placeholder="<?php _l("email"); ?>" required="required" /></div>
								</div>
								<div class="row 50%">
									<div class="12u 12u(mobile)"><textarea name="contact_message" value="<?php echo strip_tags(Request::old("contact_message")); ?>" placeholder="<?php _l("message"); ?>" rows="6"></textarea></div>
									<div class="12u 12u(mobile)">
										<div class="g-recaptcha" data-sitekey="<?php _s("recaptcha/publickey"); ?>"></div>
										<script src='https://www.google.com/recaptcha/api.js'></script>
									</div>
								</div>
								<div class="row">
									<div class="12u">
										<ul class="actions">
											<li><input type="submit" value="<?php _l("send"); ?>" /></li>
										</ul>
									</div>
								</div>
							</form>
                    <?php _s("ads/footer"); ?>
					</div>
				</div>
			</section>
		  </div>
<?php include("footer.php"); ?>