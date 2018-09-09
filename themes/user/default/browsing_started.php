<?php include("header.php"); ?>
<?php include("menu.php"); ?>
<div id="site-wrapper" >
	<section  class="main style3 secondary">
		<div class="content container">
			<header>
				<h2><?php _l("traffic_exchange"); ?></h2>
			</header>
			<div class="box container 100%">
			<?php _s("ads/header"); ?>
				<hr>
				<?php include("alerts.php"); ?>
				<a class="btn btn-success" href="<?php _router("browsing"); ?>" ><i class="fa fa-arrow-left" ></i> <?php _l("back", "Back")?></a>
				<hr>
			<?php _s("ads/footer"); ?>
			</div>
		</div>
	</section>
</div>
<?php include("footer.php"); ?>
