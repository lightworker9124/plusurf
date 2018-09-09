<?php include("header.php"); ?>
<?php include("menu.php"); ?>
		<div id="site-wrapper" >
        
			<section id="contact" class="main style3 secondary">
				<div class="content container">
					<header>
						<h2><?php _l("error404"); ?></h2>
						<p><?php _l("error404_message"); ?></p>
					</header>
					<div class="box container 75%">
					<?php _s("ads/header"); ?>		
					<footer>
						<a href="<?php _router("home"); ?>" class="button style2 left"><?php _l("back_home"); ?></a>
					</footer>
                    <?php _s("ads/footer"); ?>
					</div>
				</div>
			</section>
          
		  </div>
<?php include("footer.php"); ?>