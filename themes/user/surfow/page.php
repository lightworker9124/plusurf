<?php include("header.php"); ?>
<?php include("menu.php"); ?>
            <header>
                <h2><?php _get("name"); ?></h2>
			</header>
			<section  class="wrapper style5">
				<div class="content container">
                
					<div style="margin-top: 40px; text-align: <?php echo Languages::text_align(); ?>" >
                    <?php _s("ads/header"); ?>
						<div class="fg-dark">
						<?php echo html_entity_decode(get("content")); ?>
						</div>
                    <?php _s("ads/footer"); ?>
					</div>
				</div>
			</section>
<?php include("footer.php"); ?>