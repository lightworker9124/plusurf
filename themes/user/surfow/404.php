<?php include("header.php"); ?>
<?php include("menu.php"); ?>
            <header>
                <h2><?php _l("error404"); ?></h2>
                <p><?php _l("error404_message"); ?></p>
			</header>
            <section id="cta" class="wrapper style5">
            <?php _s("ads/header"); ?>
						<div style="margin-top: 60px; " class="inner">
							<header>
								<h2><?php _l("error404"); ?></h2>
								<p><?php _l("error404_message"); ?></p>
							</header>
							<ul class="actions vertical">
								<li><a href="<?php _router("home"); ?>" class="button special" ><?php _l("back_home"); ?></a></li>
								<li><a href="<?php _router("contact"); ?>" class="button" ><?php _l("contact"); ?></a></li>
							</ul>
						</div>
            <?php _s("ads/footer"); ?>
			</section>
<?php include("footer.php"); ?>