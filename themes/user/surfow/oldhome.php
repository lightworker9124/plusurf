<?php include("header.php"); ?>
<?php include("menu.php"); ?>
			<section id="intro" class="main style1 dark fullscreen">
				<div class="content container 75%">
					<header>
						<h2><?php _s("generale/name"); ?> <?php _l("traffic_exchange"); ?> </h2>
					</header>
					<p><strong><?php _s("generale/name"); ?></strong>
					<?php _l("home_description"); ?>
					<footer>
						<a href="#one" class="button style2 down">More</a>
					</footer>
				</div>
			</section>

			<section id="one" class="main style2 right dark fullscreen">
				<div class="content box style2">
					<header>
						<h2><?php _l("home_title1"); ?></h2>
					</header>
					<p><?php _l("home_description1"); ?></p>
				</div>
				<a href="#two" class="button style2 down anchored">Next</a>
			</section>

			<section id="two" class="main style2 left dark fullscreen">
				<div class="content box style2">
					<header>
						<h2><?php _l("home_title2"); ?></h2>
					</header>
					<p><?php _l("home_description2"); ?></p>
				</div>
				<a href="#three" class="button style2 down anchored">Next</a>
			</section>
			
			<section id="three" class="main style2 right dark fullscreen">
				<div class="content box style2">
					<header>
						<h2><?php _l("home_title3"); ?></h2>
					</header>
					<p><?php _l("home_description3"); ?></p>
				</div>
				<a href="#four" class="button style2 down anchored">Next</a>
			</section>
			
			<section id="four" class="main style3 primary">
				<div class="content container">
					<header>
						<h2><?php _l("howitwork"); ?></h2>
						<hr>
						<div class="row">
							<div class="4u 12u(xsmall)">
							<div style="font-size: 60px;" ><i class="icon fa-send" ></i></div>
							<h2><?php _l("home_title4"); ?></h2>
							<p><?php _l("home_description4"); ?></p>
							</div>
							<div class="4u 12u(xsmall)">
							<div style="font-size: 60px;" ><i class="icon fa-eye" ></i></div>
							<h2><?php _l("home_title5"); ?></h2>
							<p><?php _l("home_description5"); ?></p>
							</div>
							<div class="4u 12u(xsmall)">
							<div style="font-size: 60px;" ><i class="icon fa-signal" ></i></div>
							<h2><?php _l("home_title6"); ?></h2>
							<p><?php _l("home_description6"); ?></p>
							</div>
						</div>
						<hr>
					</header>
				</div>
			</section>

			<section id="contact" class="main style3 secondary">
				<div class="content container">
					<header>
						<h2><?php _l("join_us"); ?></h2>
					</header>
					<div class="box container 75%">
					<footer>
						<a href="<?php _router("signup"); ?>" class="button style2 left"><i class="icon fa-pencil"></i> <?php _l("signup"); ?></a>
						<a href="<?php _router("login"); ?>" class="button style2 right"><i class="icon fa-key"></i>  <?php _l("login"); ?></a>
					</footer>
					</div>
				</div>
			</section>
		  <div id="site-wrapper"></div>
<?php include("footer.php"); ?>