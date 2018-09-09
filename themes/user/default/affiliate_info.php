<?php include("header.php"); ?>
<?php include("menu.php"); 
$info   = get("info");
$wallet = get("wallet");
$clist  = get("clist");
?>
		<div id="site-wrapper" >
			<section  class="main style3 secondary">
				<div class="content container">
					<header>
						<h2><?php _l("affiliate_settings"); ?></h2>
					</header>
					
					<div class="box container 100%">
                    <?php _s("ads/header"); ?>
							<form id="update_affiliate_form" method="post" action="<?php _router("affiliate"); ?>">
								<div  class="row">
									<div class="12u 12u(mobile)" >
										<input type="text" name="update_fullname" value="<?php echo $info["fullname"]; ?>" placeholder="<?php _l("affiliate_fullname"); ?>" />
									</div>
									<div class="12u 12u(mobile)" >
										<input type="text" name="update_adresse" value="<?php echo $info["adresse"]; ?>" placeholder="<?php _l("affiliate_adresse"); ?>" />
									</div>
									<div class="12u 12u(mobile)" >
										<small style="font-size: 0.3em;" ><?php _l("affiliate_country"); ?></small>
										<select name="update_country" >
										<?php Template::options($clist, $info["country"]); ?>
										</select>
									</div>
									<div class="12u 12u(mobile)" >
										<input type="text" name="update_city" value="<?php echo $info["city"]; ?>" placeholder="<?php _l("affiliate_city"); ?>" />
									</div>
									<div class="12u 12u(mobile)" >
										<input type="text" name="update_codepostal" value="<?php echo $info["codepostal"]; ?>" placeholder="<?php _l("affiliate_codepostal"); ?>" />
									</div>
									<div class="12u 12u(mobile)" >
										<input type="text" name="update_paypal_email" value="<?php echo $info["paypal_email"]; ?>" placeholder="<?php _l("affiliate_paypal_email"); ?>" />
									</div>
									<div class="12u 12u(mobile)" >
										<input type="text" name="update_payoneer_email" value="<?php echo $info["payoneer_email"]; ?>" placeholder="<?php _l("affiliate_payoneer_email"); ?>" />
									</div>
									<div class="12u 12u(mobile">
										<input type="submit" class="btn btn-primary" value="<?php _l("update"); ?>" />
									</div>
								</div>
								<div class="row">
									<div class="12u 12u(mobile)">
										<div id="update_affiliate_alert"></div>
										<?php if($_POST) { include("alerts.php"); } ?>
									</div>
								</div>
							</form>
							<hr>
							
							<form id="update_withdrawalmethod_form" method="post" action="<?php _router("affiliate"); ?>">
								<div  class="row">
									<div class="12u 12u(mobile)" >
										<small style="font-size: 0.3em;" ><?php _l("choose_withdrawal_method"); ?></small>
										<select name="withdrawal_method" >
										<?php Template::options(array(
										"paypal"   => "Paypal", 
										"payoneer" => "Payoneer"
										), $wallet["withdrawal_to"]); ?>
										</select>
									</div>
									<div class="12u 12u(mobile">
										<input type="submit" class="btn btn-primary" value="<?php _l("update"); ?>" />
									</div>
								</div>
								<div class="row">
									<div class="12u 12u(mobile)">
										<div id="update_withdrawalmethod_alert"></div>
										<?php if($_POST) { include("alerts.php"); } ?>
									</div>
								</div>
							</form>
                    <?php _s("ads/footer"); ?>
					</div>
				</div>
			</section>
		  </div>
<?php include("footer.php"); ?>