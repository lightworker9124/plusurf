<?php include("header.php"); ?>
<?php include("menu.php"); ?>

					<section id="banner" >
						<div class="inner">
							<h2><?php _s("generale/name"); ?> </h2>
							<center><p style="width: 60%; word-wrap: break;" ><?php _l("traffic_exchange"); ?> <br />
							<b><strong><?php _s("generale/name"); ?></strong></b>
                            <?php _l("home_description"); ?></p></center>
                            <center><div style="direction: ltr;" id="home_counter"></div><span style="height:55px; padding: 20%;"><?php _l("hits"); ?></span></center>
						</div>
						<a href="#one" class="more scrolly"><?php _l("learn_more", "Learn More"); ?></a>
					</section>

					<section id="one" class="wrapper style1 special">
						<div class="inner">
							<header class="major">
								<h2><?php _s("generale/name"); ?><br />
								<?php _l("howitwork"); ?> ?</h2>
								<p><?php _l("howitwork_hint"); ?></p>
							</header>
							<ul style="direction: ltr !important;" class="icons major">
                                <li><span class="icon fa-exchange major style2 fg-white"><span class="label">-</span></span></li>
                                <li><span class="icon fa-chevron-circle-right major style2 fg-white"><span class="label">-</span></span></li>
                                <li><span class="icon fa-line-chart major style2 fg-white"><span class="label">-</span></span></li>
							</ul>
						</div>
                        <div style="margin-top: 80px;" ></div>
                        <a style="text-decoration: none !important;" href="#two" class="scrolly"><span class="icon fa-arrow-down major style2 fg-white"></span></a>
                        <div style="margin-top: 80px;" ></div>
					</section>

					<section id="two" class="wrapper alt style2">
						<section class="spotlight">
							<div class="image"><img src="<?php _turl(); ?>/images/easy.jpg" alt="" /></div><div class="content">
								<h2><?php _l("home_title1"); ?></h2>
								<p><?php _l("home_description1"); ?></p>
							</div>
						</section>
						<section class="spotlight">
							<div class="image"><img src="<?php _turl(); ?>/images/safe.jpg" alt="" /></div><div class="content">
								<h2><?php _l("home_title2"); ?></h2>
								<p><?php _l("home_description2"); ?></p>
							</div>
						</section>
						<section class="spotlight">
							<div class="image"><img src="<?php _turl(); ?>/images/automatic.jpg" alt="" /></div><div class="content">
								<h2><?php _l("home_title3"); ?></h2>
								<p><?php _l("home_description3"); ?></p>
							</div>
						</section>
					</section>

					<section id="cta" style="padding-bottom: 0px;" class="wrapper style4">
						<div class="inner">
							<header>
								<h2><?php echo str_replace("!!", "!", l("join_us")); ?></h2>
								<p><?php _l("signup_hint"); ?></p>
							</header>
							<ul class="actions vertical">
								<li><a href="<?php _router("signup"); ?>" class="button fit special"><i class="icon fa-pencil"></i> <?php _l("signup"); ?></a></li>
								<li><a href="<?php _router("login"); ?>" class="button fit"><i class="icon fa-key"></i> <?php _l("login"); ?></a></li>
							</ul>
						</div>
					</section>
<?php include("footer.php"); ?>