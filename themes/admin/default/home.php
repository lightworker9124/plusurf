<?php include("header.php"); ?>
	<div id="admin-body" >
		<div id="header-title">
			<a href="<?php _router("admin_home"); ?>" data-original-title="Admin Panel" class="tip-bottom"><i class="fa fa-home"></i> Admin Panel</a>
			<a href="<?php _router("admin_home"); ?>" data-original-title="Dashboard" class="tip-bottom"><i class="fa fa-dashboard"></i> Dashboard</a>
		</div>
		<div id="admin-content" >
		<div class="row" >
		<div class="col-md-12 main panel panel-default">
		<div class="panel-body" >
			<h1 class="page-header"><i class="fa fa-dashboard" ></i> Dashboard <small style="font-size: 40%"  ><strong style="color: green; float: right; padding-top: 0.8em;" ><i class="fa fa-smile-o" ></i> Hello <?php _u("username"); ?> </strong></small></h1>
			<div class="row">


				<div class="col-md-4 col-sm-12 col-xs-12" >
				<div style="background-color: #333;" class="dashboard-panel" >
					<h1><small>Total Hits <i class="fa fa-exchange" ></i></small></h1>
					<h1><?php _get("hits_count"); ?></h1>
				</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12" >
				<div style="background-color: #333;"  class="dashboard-panel" >
					<h1><small>Total Users Points <i class="fa fa-users" ></i></small></h1>
					<h1><?php _get("points_count"); ?></h1>
				</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12" >
				<div style="background-color: #333;"  class="dashboard-panel" >
					<h1><small>Total Earned Points <i class="fa fa-smile-o" ></i></small></h1>
					<h1><?php echo floor(s("earned/points")); ?></h1>
				</div>
				</div>

				<!-- /////////////////////////////////////////////////// -->

				<div class="col-md-3 col-sm-3 col-xs-6" >
				<div class="dashboard-panel" >
					<div data-original-title="USERS" class="tip-top" style="font-size: 70px" ><i class="fa fa-users" ></i></div>
					<h1><?php _get("users_count"); ?></h1>
				</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6" >
				<div class="dashboard-panel" >
					<div data-original-title="WEBSITES" class="tip-top" style="font-size: 70px" ><i class="fa fa-globe" ></i></div>
					<h1><?php _get("websites_count"); ?></h1>
				</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6" >
				<div class="dashboard-panel" >
					<div data-original-title="ADMINS" class="tip-top"  style="font-size: 70px" ><i class="fa fa-gear" ></i></div>
					<h1><?php _get("admins_count"); ?></h1>
				</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6" >
				<div class="dashboard-panel" >
					<div data-original-title="REFERRALS" class="tip-top"  style="font-size: 70px" ><i class="fa fa-share" ></i></div>
					<h1><?php _get("referrals_count"); ?></h1>
				</div>
				</div>

				<!-- /////////////////////////////////////////////////// -->

				<div class="col-md-4 col-sm-12 col-xs-12" >
				<div style="background-color: #333" class="dashboard-panel" >
					<h1 data-original-title="USERS ONLINE" class="tip-top"   ><small>Who'is Online <i class="fa fa-desktop" ></i><i class="fa fa-laptop" ></i>...</small></h1>
					<div>
						<canvas class="chart-resize" id="canvas-online" width="600" height="600"/>
					</div>
				</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12" >
				<div style="background-color: #333" class="dashboard-panel" >
					<h1 data-original-title="BROWSERS" class="tip-top"   ><small>Browsers <i class="fa fa-firefox" ></i><i class="fa fa-chrome" ></i>...</small></h1>
					<div>
						<canvas class="chart-resize" id="canvas-browsers" width="600" height="600"/>
					</div>
				</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12" >
				<div style="background-color: #333" class="dashboard-panel" >
					<h1 data-original-title="OS" class="tip-top"   ><small>Os <i class="fa fa-windows" ></i><i class="fa fa-linux" ></i>...</small></h1>
					<div>
						<canvas class="chart-resize" id="canvas-os" width="600" height="600"/>
					</div>
				</div>
				</div>
			</div>
        </div>
		</div>
		</div>
		</div>
	</div>
	<script>
	var Browsersdata = [<?php
	function rand_color()
	{
		$array_colors = array("#FF1C1C", "#FF1C8F", "#CA24FF", "#922EFF", "#3C20DA", "#0D9BD2", "#05D883", "#2DEB05", "#9DF605", "#FFB305", "#FF6D05", "#FF3105", "#A61B02", "#FF4473", "#16A798");
		$rand = rand(0, 14);
		return $array_colors[$rand];
	}
	$browsers = get("browser");
	if(!empty($browsers))
	{
		$run_browsers = "";
		foreach($browsers as $data)
		{
			$run_browsers .= '{ value: '.$data[0].', color:"'.rand_color().'", highlight: "#666", label: "'.$data[1].'" }, ';
        }
	    $run_browsers = rtrim($run_browsers, ",");
		echo $run_browsers;
	} ?>];
	var Osdata = [<?php
	$run_os = "";
	$os = get("os");
	if(!empty($os))
	{
		$run_os = "";
		foreach($os as $data)
		{
			$run_os .= '{ value: '.$data[0].', color:"'.rand_color().'", highlight: "#666", label: "'.$data[1].'" }, ';
        }
	    $run_os = rtrim($run_os, ",");
		echo $run_os;
	} ?>];
	var Onlinedata = [{ value: <?php _get("users_online"); ?>, color:"#FDB45C", highlight: "#FFC870", label: "Users" }, { value: <?php _get("guests_online"); ?>, color:"#46BFBD", highlight: "#5AD3D1", label: "Guests" }, { value: <?php _get("admins_online"); ?>, color:"#0193E9", highlight: "#35B4FF", label: "Admins" } ];
	window.onload = function(){
		var ctx = document.getElementById("canvas-browsers").getContext("2d");
		window.myPie = new Chart(ctx).Doughnut(Browsersdata);
		var ctxx = document.getElementById("canvas-os").getContext("2d");
		window.myPiee = new Chart(ctxx).Doughnut(Osdata);
		var ctxxx = document.getElementById("canvas-online").getContext("2d");
		window.myPieee = new Chart(ctxxx).Doughnut(Onlinedata);
	};
	</script>
<?php include("footer.php"); ?>
