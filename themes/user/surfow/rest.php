<?php include("header.php"); ?>
<?php include("menu.php"); ?>
            <header>
                <h2><?php _l("rest"); ?></h2>
                <p><?php _l("rest_hint"); ?></p>
			</header>
			<section  class="wrapper style5">
				<div class="content container">
					<div style="margin-top: 40px; text-align: <?php echo Languages::text_align(); ?>" >
                    <?php _s("ads/header"); ?>
							<?php include("alerts.php"); ?>
							
							<div id="rest_alert"></div>
							<form id="rest_form" method="post" action="<?php _router("rest"); ?>">
								<div class="row uniform">
									<div class="12u 12u(xsmall)"><input type="text" name="rest_email" placeholder="<?php _l("email"); ?>" required="required" /></div>
									<div class="12u 12u(xsmall)">

										<div class="g-recaptcha" data-sitekey="<?php _s("recaptcha/publickey"); ?>"></div>
										<script src='https://www.google.com/recaptcha/api.js'></script>
									</div>
									<div class="12u">
										<ul class="actions">
											<li><input class="button special" type="submit" value="<?php _l("send"); ?>" /></li>
										</ul>
									</div>
								</div>
							</form>
							<a class="btn btn-primary" href="<?php _router("login"); ?>" ><?php _l("login"); ?></a>
                    <?php _s("ads/footer"); ?>
					</div>
				</div>
			</section>
<?php include("footer.php"); ?>