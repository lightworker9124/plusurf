<?php include("header.php"); ?>
<?php include("menu.php"); ?>
<?php $info = get("info"); ?>
		<div id="site-wrapper">
        
			<section id="four" class="main style3 secondary">
				<div class="content container">
					<header>
						<p><?php _l("withdrawal"); ?></p>
					</header>
                    <?php _s("ads/header"); ?>
					<div style="text-align: <?php echo Languages::text_align(); ?>" class="box container 50%">
						<div class="row">
							<div class="12u 12u(mobile)">
							<p><?php _l("amount"); ?>: <?php echo $info["confirmed_sold"]; ?> USD</p><hr>
							</div>
						</div>
					</div>
					<header>
						<p><?php _l("choose_withdrawal_method"); ?></p>
					</header>
					<form action="<?php _router("withdrawal"); ?>" method="post" >
					<div style="text-align: <?php echo Languages::text_align(); ?>" class="box container 50%">
						<select name="withdrawal_method" >
						<?php Template::options(array(
								"paypal"   => "Paypal", 
								"payoneer" => "Payoneer"
								), $info["withdrawal_to"]); ?>
						</select>
						<hr>
						<input type="submit" class="btn btn-primary" value="<?php _l("send_request"); ?>"  />
					</div>
					</form>
					<center><a style="color: red;"  href="<?php _router("dashboard"); ?>" ><?php _l("cancel"); ?></a></center>
                    <?php _s("ads/footer"); ?>
				</div>
			</section>
          
		  </div>
<?php include("footer.php"); ?>