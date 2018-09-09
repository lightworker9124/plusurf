<?php include("header.php"); ?>
<?php include("menu.php"); ?>
            <header>
                <h2><?php _l("traffic_exchange"); ?></h2>
			</header>
			<section  class="wrapper style5">
				<div class="content container">
					<div style="margin-top: 50px; text-align: <?php echo Languages::text_align(); ?>" >
                    <center>
                    <?php _s("ads/header"); ?>
						<hr>
						<?php include("alerts.php"); ?>
						<a class="btn btn-success" href="<?php _router("browsing"); ?>" ><i class="fa fa-arrow-left" ></i> <?php _l("back", "Back")?></a>
						<hr>
                    <?php _s("ads/footer"); ?>
                    </center>
					</div>
				</div>
			</section>
<?php include("footer.php"); ?>
