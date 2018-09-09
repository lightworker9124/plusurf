			<footer id="footer">
					<?php 
					$facebook    = s("social/facebook");
					$twitter     = s("social/twitter");
					$google_plus = s("social/google_plus");
					$dribbble    = s("social/dribbble");
					$pinterest   = s("social/pinterest");
					$instagram   = s("social/instagram");
					?>
					
					<ul class="actions">
						<li><a class="fg-white" href="#go-top"><i class="fa fa-arrow-up"></i></a></li>
						<?php if(!empty($twitter)) { ?><li><a href="<?php echo $twitter; ?>" class="icon fa-twitter"><span class="label">Twitter</span></a></li><?php } ?>
						<?php if(!empty($facebook)) { ?><li><a href="<?php echo $facebook; ?>" class="icon fa-facebook"><span class="label">Facebook</span></a></li><?php } ?>
						<?php if(!empty($google_plus)) { ?><li><a href="<?php echo $google_plus; ?>" class="icon fa-google-plus"><span class="label">Google+</span></a></li><?php } ?>
						<?php if(!empty($dribbble)) { ?><li><a href="<?php echo $dribbble; ?>" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li><?php } ?>
						<?php if(!empty($pinterest)) { ?><li><a href="<?php echo $pinterest; ?>" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li><?php } ?>
						<?php if(!empty($instagram)) { ?><li><a href="<?php echo $instagram; ?>" class="icon fa-instagram"><span class="label">Instagram</span></a></li><?php } ?>
					</ul>

					<ul class="menu">
						<li>&copy; <?php echo date("Y"); ?> <?php _s("generale/name"); ?></li>
						<li><a href="<?php _router("contact"); ?>"><?php _l("contact"); ?></a></li>
						<li><a href="<?php _router("page", array("name" => "privacy")); ?>"><?php _l("privacy"); ?></a></li>
						<li><a href="<?php _router("page", array("name" => "tos")); ?>"><?php _l("tos_2"); ?></a></li>
						<li><a href="<?php _router("page", array("name" => "about-us")); ?>"><?php _l("about_us"); ?></a></li>
						<li> Developed by <a href="http://wesparklesolutions.com">wesparkle solutions</a></li>
					</ul>

			</footer>
		
		<!-- Javascript files -->
		<?php Template::js(array(
		"/assets/js/functions.js",
		"/assets/js/bootstrap.js",
		"/assets/js/ready.js",
		"/assets/js/classie.js",
		"/assets/js/jquery.poptrox.min.js",
		"/assets/js/jquery.scrolly.min.js",
		"/assets/js/jquery.scrollex.min.js",
		"/assets/js/jquery.nanoscroller.min.js",
		"/assets/js/skel.min.js",
		"/assets/js/util.js",
		"/assets/js/main.js",
		"/assets/js/menu.js"
		)); ?>
		
		<?php if($GLOBALS["check_login"]) { 
			Template::js("/assets/js/user_functions.js");
			if(Check::is_routed("dashboard"))
			{
				Template::js("/assets/js/Chart.js");
				?>
			<script>
			<?php function month($n) { _l("month_".$n); } ?>
			<?php function m_hits($n) { echo Hits::hits_in_month($n); } ?>
			<?php function m_points($n) { echo Hits::points_in_month($n); } ?>
				var HitsData = {
					labels : ["<?php month(1); ?>", "<?php month(2); ?>", "<?php month(3); ?>", "<?php month(4); ?>", "<?php month(5); ?>", "<?php month(6); ?>", "<?php month(7); ?>", "<?php month(8); ?>", "<?php month(9); ?>", "<?php month(10); ?>", "<?php month(11); ?>", "<?php month(12); ?>"],
					datasets : [
						{
							fillColor : "rgba(47,149,255,0.5)",
							strokeColor : "rgba(1,184,170,1)",
							pointColor : "rgba(2,68,138,1)",
							pointStrokeColor : "#fff",
							pointHighlightFill: "#fff",
							pointHighlightStroke: "rgba(220,220,220,1)",
							data : [<?php m_hits(1); ?>, <?php m_hits(2); ?>, <?php m_hits(3); ?>, <?php m_hits(4); ?>, <?php m_hits(5); ?>, <?php m_hits(6); ?>, <?php m_hits(7); ?>, <?php m_hits(8); ?>, <?php m_hits(9); ?>, <?php m_hits(10); ?>, <?php m_hits(11); ?>, <?php m_hits(12); ?>]
						}
					]
				};
				var PointsData = {
					labels : ["<?php month(1); ?>", "<?php month(2); ?>", "<?php month(3); ?>", "<?php month(4); ?>", "<?php month(5); ?>", "<?php month(6); ?>", "<?php month(7); ?>", "<?php month(8); ?>", "<?php month(9); ?>", "<?php month(10); ?>", "<?php month(11); ?>", "<?php month(12); ?>"],
					datasets : [
						{
							fillColor : "rgba(47,149,255,0.5)",
							strokeColor : "rgba(1,184,170,1)",
							pointColor : "rgba(2,68,138,1)",
							pointStrokeColor : "#fff",
							pointHighlightFill: "#fff",
							pointHighlightStroke: "rgba(220,220,220,1)",
							data : [<?php m_points(1); ?>, <?php m_points(2); ?>, <?php m_points(3); ?>, <?php m_points(4); ?>, <?php m_points(5); ?>, <?php m_points(6); ?>, <?php m_points(7); ?>, <?php m_points(8); ?>, <?php m_points(9); ?>, <?php m_points(10); ?>, <?php m_points(11); ?>, <?php m_points(12); ?>]
						}
					]
				};
				var StatisticHits = new Chart(document.getElementById("statistic_hits").getContext("2d"));
				StatisticHits.Line(HitsData);
				var StatisticPoints = new Chart(document.getElementById("statistic_points").getContext("2d"));
				StatisticPoints.Line(PointsData);
				setInterval(function() {
					$.ajax({
						url : "<?php _router("dashboard"); ?>?statistic=realtime",
						type: "GET",
						data : "",
						success: function(data, textStatus, jqXHR)
						{
							var newhits   = data["hits"];
							var newpoints = data["points"];
							var newsessions = data["sessions"];
							var newwebsites = data["websites"];
							var thismonth = data["month"];
							var allpoints = data["allpoints"];
							HitsData.datasets[0].data[thismonth] = newhits;
							PointsData.datasets[0].data[thismonth] = newpoints;
							StatisticHits.Line(HitsData);
							StatisticPoints.Line(PointsData);
							$("#realtime_sessions").html(newsessions);
							$("#realtime_websites").html(newwebsites);
							spoints = allpoints.split(".");
							if(!spoints[1]) { xx1 = "00";} else { xx1 = spoints[1]; }
							if(!spoints[0]) { xx2 = "00";} else { xx1 = spoints[0]; }
							$("#realtime_points").html(xx1+"<i style='font-size: 0.5em' >."+xx2+"</i>");
						}
					});
				}, 15000);
			</script>
				<?php
			}
		}
		?>
		
		<?php Template::script("UpMenu = new UpMenu(); "); ?>
		
		<!--[if lte IE 8]>
		<?php Template::js("/assets/js/ie/respond.min.js"); ?>
		<![endif]-->
	</body>
</html>