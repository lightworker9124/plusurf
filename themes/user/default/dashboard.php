<?php include("header.php"); ?>
<?php include("menu.php"); ?>
		<div id="site-wrapper" >
			<section  class="main style3 secondary">
				<div class="content container">
					<header>
						<h2><?php _l("dashboard"); ?></h2>
					</header>
					<div style="text-align: <?php echo Languages::text_align(); ?>" class="box container 100%">
                    <?php _s("ads/header"); ?>
						<p><?php echo l("hello")." ".u("username")." !"; ?> <i class="fa fa-smile-o" ></i></p>
						<div class="row" >
							<div class="4u 12u(mobile)" >
								<div class="panel panel-primary">
								  <div class="panel-heading">
									<h3 class="panel-title"><i class="icon fa-save" ></i> <?php _l("points"); ?> </h3>
								  </div>
								  <div style="height: 94.3px; background: #007FFF; color: #fff;" class="panel-body">
								   <center><h2 id="realtime_points" style="word-wrap: break-word;" >
									<?php 
									$points = u("points"); 
									$expl = explode(".", $points);
									if($points > 0)
									{
										echo $expl[0];
										if(!empty($expl))
										{
											echo "<i style='font-size: 0.5em' >.".$expl[1]."</i>";
										}
									}
									else
									{
										echo "0 ".l("point");
									}
									?>
								   </h2></center>
								  </div>
								</div>
							</div>
							<!-- -->
							<div class="4u 12u(mobile)" >
								<div class="panel panel-primary">
								  <div class="panel-heading">
									<h3 class="panel-title"><i class="icon fa-user" ></i> <?php _l("account_type"); ?></h3>
								  </div>
								  <div style="height: 94.3px; background: #007FFF; color: #fff;" class="panel-body">
								   <center><h2>
									<?php $type = strtolower(u("type")); 
									if($type=="pro")
									{
										echo l("pro")." <i class='fa fa-check' ></i>";
									}
									else
									{
										echo l("free")." <a title='".l("upgrade")."' href='".router("payments")."?upgrade=true' ><i class='fa fa-info' ></i></a>";
									}
									?>
								   </h2></center>
								  </div>
								</div>
							</div>
							<!-- -->
							<div class="4u 12u(mobile)" >
								<div class="panel panel-primary">
								  <div class="panel-heading">
									<h3 class="panel-title"><i class="icon fa-exchange" ></i> <?php _l("browsing"); ?></h3>
								  </div>
								  <div style="height: 94.3px; background: #007FFF; color: #fff;" class="panel-body">
								   <a href="<?php _router("browsing"); ?>" class="btn btn-primary btn-block" >
									<?php _l("start_browsing"); ?>
								   </a>
								  </div>
								</div>
							</div>
							<!-- -->
						</div>
						
						<!------------------------------------------------------------->
						
						<div class="row" >
							<div class="4u 12u(mobile)" >
								<div class="panel panel-primary">
								  <div class="panel-heading">
									<h3 class="panel-title"><i class="icon fa-globe" ></i> <?php _l("website_slots"); ?></h3>
								  </div>
								  <div style="height: 94.3px; background: #007FFF; color: #fff;" class="panel-body">
								   <center><h2><span id="realtime_websites" ><?php _get("websites_count"); ?></span>/<?php _u("website_slots"); ?></h2></center>
								  </div>
								</div>
							</div>
							<!-- -->
							<div class="4u 12u(mobile)" >
								<div class="panel panel-primary">
								  <div class="panel-heading">
									<h3 class="panel-title"><i class="icon fa-users" ></i> <?php _l("session_slots"); ?></h3>
								  </div>
								  <div style="height: 94.3px; background: #007FFF; color: #fff;" class="panel-body">
								   <center><h2><span id="realtime_sessions" ><?php _get("sessions_count"); ?></span>/<?php _u("session_slots"); ?></h2></center>
								  </div>
								</div>
							</div>
							<!-- -->
							<div class="4u 12u(mobile)" >
								<div class="panel panel-primary">
								  <div class="panel-heading">
									<h3 class="panel-title"><i class="icon fa-exchange" ></i> <?php _l("traffic_ratio"); ?></h3>
								  </div>
								  <div style="height: 94.3px; background: #007FFF; color: #fff;" class="panel-body">
								   <center><h2><?php _u("traffic_ratio"); ?>%</h2></center>
								  </div>
								</div>
							</div>
							<!-- -->
						</div>
						
						<div class="row" >
							<!-- -->
							<div class="6u 12u(mobile)" >
								<div class="panel panel-default">
								  <div class="panel-heading">
									<h3 class="panel-title"><i class="icon fa-signal" ></i> <?php _l("statistic"); ?> (<?php _l("hits_you_got"); ?>)</h3>
								  </div>
								  <div class="panel-body">
									  <div class="panel-body" style="padding: 1px; width: 100%;" >
										  <canvas id="statistic_hits" class="chart-resize" height="250" width="600" style="width: 100%" ></canvas>
									  </div>
								  </div>
								</div>
							</div>
							<!-- -->
							<div class="6u 12u(mobile)" >
								<div class="panel panel-default">
								  <div class="panel-heading">
									<h3 class="panel-title"><i class="icon fa-signal" ></i> <?php _l("statistic"); ?> (<?php _l("points_you_earned"); ?>)</h3>
								  </div>
								  <div class="panel-body">
									  <div class="panel-body" style="padding: 1px; width: 100%;" >
										  <canvas id="statistic_points" class="chart-resize" height="250" width="600" style="width: 100%" ></canvas>
									  </div>
								  </div>
								</div>
							</div>
							<!-- -->
						</div>
                    <?php _s("ads/footer"); ?>
					</div>
					<?php include("promo.php"); ?>
				</div>
			</section>
		</div>
<?php include("footer.php"); ?>
			