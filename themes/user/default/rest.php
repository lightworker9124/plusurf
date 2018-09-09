<?php include("header.php"); ?>
<?php include("menu.php"); ?>
		<div id="site-wrapper" >
        
			<section class="main style3 secondary">
				<div class="content container">
					<header>
						<h2><?php _l("rest"); ?></h2>
						<p><?php _l("rest_hint"); ?></p>
					</header>
					<div class="box container 75%">
                    <?php _s("ads/header"); ?>
							<?php include("alerts.php"); ?>
							
							<div id="rest_alert"></div>
							<form id="rest_form" method="post" action="<?php _router("rest"); ?>">
								<div class="row 50%">
									<div class="12u 12u(mobile)"><input type="text" name="rest_email" placeholder="<?php _l("email"); ?>" required="required" /></div>
									<div class="6u 12u(mobile)">
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
							<div class="row">
								<div class="12u 12u(mobile">
									<a href="<?php _router("login"); ?>" ><?php _l("login"); ?></a></li>
								</div>
							</div>
                    <?php _s("ads/footer"); ?>
					</div>
				</div>
			</section>
            
		  </div>
<?php include("footer.php"); ?>