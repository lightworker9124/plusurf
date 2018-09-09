<?php include("header.php"); ?>
<?php include("menu.php"); ?>
<?php $info = get("info"); ?>
            <header>
                <h2><?php _l("withdrawal"); ?></h2>
			</header>
			<section  class="wrapper style5">
				<div class="content container">
                <?php _s("ads/header"); ?>
					<div style="margin-top: 50px; text-align: <?php echo Languages::text_align(); ?>" >
						<div class="row uniform">
							<div class="12u$ 12u$(xsmall)">
							<h2><?php _l("amount"); ?>: <?php echo $info["confirmed_sold"]; ?> USD</h2>
							</div>
						</div>
					</div>
					<form action="<?php _router("withdrawal"); ?>" method="post" >
					<div style="text-align: <?php echo Languages::text_align(); ?>" >
                    <label><?php _l("choose_withdrawal_method"); ?></label>
						<select name="withdrawal_method" >
						<?php Template::options(array(
								"paypal"   => "Paypal", 
								"payoneer" => "Payoneer"
								), $info["withdrawal_to"]); ?>
						</select>
                        <hr>
						<input type="submit" class="button special" value="<?php _l("send_request"); ?>"  />
					</div>
					</form>
					<a class="button"  href="<?php _router("dashboard"); ?>" ><?php _l("cancel"); ?></a>
                <?php _s("ads/footer"); ?>
				</div>
			</section>
		  </div>
<?php include("footer.php"); ?>