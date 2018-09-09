<?php include("header.php"); ?>
<?php include("menu.php"); 
$info   = get("info");
$wallet = get("wallet");
$clist  = get("clist");
?>
            <header>
                <h2><?php _l("affiliate_settings"); ?></h2>
			</header>
			<section  class="wrapper style5">
				<div class="content container">
					<div style="margin-top: 50px; text-align: <?php echo Languages::text_align(); ?>" >
					<?php _s("ads/header"); ?>		
							<form id="update_affiliate_form" method="post" action="<?php _router("affiliate"); ?>">
								<div  class="row uniform">
									<div class="12u$ " >
										<input type="text" name="update_fullname" value="<?php echo $info["fullname"]; ?>" placeholder="<?php _l("affiliate_fullname"); ?>" />
									</div>
                                    <br>
									<div class="12u$ " >
										<input type="text" name="update_adresse" value="<?php echo $info["adresse"]; ?>" placeholder="<?php _l("affiliate_adresse"); ?>" />
									</div>
                                    <br>
									<div class="12u$ " >
										<small style="font-size: 0.3em;" ><?php _l("affiliate_country"); ?></small>
										<select name="update_country" >
										<?php Template::options($clist, $info["country"]); ?>
										</select>
									</div>
                                    <br>
									<div class="12u$ " >
										<input type="text" name="update_city" value="<?php echo $info["city"]; ?>" placeholder="<?php _l("affiliate_city"); ?>" />
									</div>
                                    <br>
									<div class="12u$ " >
										<input type="text" name="update_codepostal" value="<?php echo $info["codepostal"]; ?>" placeholder="<?php _l("affiliate_codepostal"); ?>" />
									</div>
                                    <br>
									<div class="12u$ " >
										<input type="text" name="update_paypal_email" value="<?php echo $info["paypal_email"]; ?>" placeholder="<?php _l("affiliate_paypal_email"); ?>" />
									</div>
                                    <br>
									<div class="12u$ " >
										<input type="text" name="update_payoneer_email" value="<?php echo $info["payoneer_email"]; ?>" placeholder="<?php _l("affiliate_payoneer_email"); ?>" />
									</div>
                                    <br>
									<div class="12u$">
										<input type="submit" class="button special" value="<?php _l("update"); ?>" />
									</div>
								</div>
                                <br>
								<div class="row">
									<div class="12u$ ">
										<div id="update_affiliate_alert"></div>
										<?php if($_POST) { include("alerts.php"); } ?>
									</div>
								</div>
							</form>
							<hr>
							
							<form id="update_withdrawalmethod_form" method="post" action="<?php _router("affiliate"); ?>">
								<div  class="row uniform">
									<div class="12u$ " >
										<small style="font-size: 0.3em;" ><?php _l("choose_withdrawal_method"); ?></small>
										<select name="withdrawal_method" >
										<?php Template::options(array(
										"paypal"   => "Paypal", 
										"payoneer" => "Payoneer"
										), $wallet["withdrawal_to"]); ?>
										</select>
									</div>
                                    <br>
									<div class="12u$">
										<input type="submit" class="button special" value="<?php _l("update"); ?>" />
									</div>
								</div>
								<div class="row">
									<div class="12u$ ">
										<div id="update_withdrawalmethod_alert"></div>
										<?php if($_POST) { include("alerts.php"); } ?>
									</div>
								</div>
							</form>
                    <?php _s("ads/footer"); ?>
					</div>
				</div>
			</section>
<?php include("footer.php"); ?>