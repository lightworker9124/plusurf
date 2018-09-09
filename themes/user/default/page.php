<?php include("header.php"); ?>
<?php include("menu.php"); ?>
		<div id="site-wrapper" >
        
			<section  class="main style3 secondary">
				<div class="content container">
					<header>
						<h2><?php _get("name"); ?></h2>
					</header>
					<div class="box container 100%">
                    <?php _s("ads/header"); ?>
						<p>
						<?php echo html_entity_decode(get("content")); ?>
						</p>
                    <?php _s("ads/footer"); ?>
					</div>
				</div>
			</section>
          
		  </div>
<?php include("footer.php"); ?>