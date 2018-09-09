<?php include("header.php"); ?>
<?php include("menu.php"); 
$info = get("info");
?>
            <header>
                <h2><?php _l("referrals"); ?></h2>
			</header>
			<section  class="wrapper style5">
				<div class="content container">
					<div style="margin-top: 40px; text-align: <?php echo Languages::text_align(); ?>" >
                    <?php _s("ads/header"); ?>
					<div class="row" >
					<?php if(s("defaults/withdrawal_status")=="yes") { ?>
							<div class="4u 12u(xsmall)" >
								<div class="panel panel-default">
								  <div class="panel-heading">
									<h3 class="panel-title"><i class="icon fa-money" ></i> <?php _l("confirmed_sold"); ?></h3>
								  </div>
								  <div style="height: 94.3px; background: #21b2a6; color: #fff;" class="panel-body">
								   <center><h2 class="fg-white" id="realtime_points" style="word-wrap: break-word;" >
									<?php echo $info["confirmed_sold"]; ?> $
								   </h2></center>
								  </div>
								</div>
							</div>
							<div class="4u 12u(xsmall)" >
								<div class="panel panel-default">
								  <div class="panel-heading">
									<h3 class="panel-title"><i class="icon fa-money" ></i> <?php _l("pending_sold"); ?></h3>
								  </div>
								  <div style="height: 94.3px; background: #21b2a6; color: #fff;" class="panel-body">
								   <center><h2 class="fg-white" id="realtime_points" style="word-wrap: break-word;" >
									<?php echo $info["pending_sold"]; ?> $
								   </h2></center>
								  </div>
								</div>
							</div>
							<div class="4u 12u(xsmall)" >
								<div class="panel panel-default">
								  <div class="panel-heading">
									<h3 class="panel-title"><i class="icon fa-money" ></i> <?php _l("withdrawal_sold"); ?></h3>
								  </div>
								  <div style="height: 94.3px; background: #21b2a6; color: #fff;" class="panel-body">
								   <center><h2 class="fg-white" id="realtime_points" style="word-wrap: break-word;" >
									<?php echo $info["withdrawal_sold"]; ?> $
								   </h2></center>
								  </div>
								</div>
							</div>
					<?php } else { ?>
							<div class="6u 12u(xsmall)" >
								<div class="panel panel-default">
								  <div class="panel-heading">
									<h3 class="panel-title"><i class="icon fa-money" ></i> <?php _l("confirmed_sold"); ?></h3>
								  </div>
								  <div style="height: 94.3px; background: #21b2a6; color: #fff;" class="panel-body">
								   <center><h2  class="fg-white"  id="realtime_points" style="word-wrap: break-word;" >
									<?php echo $info["confirmed_sold"]; ?> $
								   </h2></center>
								  </div>
								</div>
							</div>
							<div class="6u 12u(xsmall)" >
								<div class="panel panel-default">
								  <div class="panel-heading">
									<h3 class="panel-title"><i class="icon fa-money" ></i> <?php _l("pending_sold"); ?></h3>
								  </div>
								  <div style="height: 94.3px; background: #21b2a6; color: #fff;" class="panel-body">
								   <center><h2  class="fg-white"  id="realtime_points" style="word-wrap: break-word;" >
									<?php echo $info["pending_sold"]; ?> $
								   </h2></center>
								  </div>
								</div>
							</div>
					<?php } ?>
					</div>
					<?php if(s("defaults/withdrawal_status")=="yes") { ?>
					<hr>
					<div>
					<a class="btn btn-primary" href="<?php _router("affiliate"); ?>" ><?php _l("edit_payment_info"); ?></a>
					<a class="btn btn-primary" title="Min <?php _s("defaults/min_for_withdrawal"); ?>$" href="<?php if($info["confirmed_sold"] >= s("defaults/min_for_withdrawal") && s("defaults/min_for_withdrawal")){ _router("withdrawal"); } else { echo "#";} ?>" ><?php _l("ask_for_withdrawal"); ?></a>
					<?php if(u("points") >= 100) { ?> 
					<a href="Javascript::void(0);" class="btn btn-primary" onclick="document.getElementById('converttosold').submit();" >Convert <?php echo floor(u("points")); ?> point to <?php echo floor((u("points")/100)*(s("exchange/pointcost"))); ?> $</a>
					<form id="converttosold" action="<?php _router("move_to_sold"); ?>" method="post" ><input type="hidden" value="<?php echo u("points"); ?>" name="sold" /></form>
					<?php } ?>
					</div>
					<?php } ?>
					<hr>
					<div class="row">
						<div class="8u 12u(xsmall)">
							<div class="form-group">
							  <input onclick="this.select()" class="form-control" id="focusedInput" value="<?php $share = router("redir_ref", array("id" => Encryption::encode(u("id")))); echo $share; ?>" type="text">
							</div>
						</div>
						<div class="4u 12u(xsmall)">
							<a target="_blank" href="https://facebook.com/sharer.php?u=<?php echo urlencode($share); ?>" class="btn btn-default" ><i class="fa fa-facebook"></i></a>
							<a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo urlencode($share); ?>" class="btn btn-primary" ><i class="fa fa-twitter"></i></a>
							<a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode($share); ?>" class="btn btn-danger" ><i class="fa fa-google-plus"></i></a>
						</div>
					</div>
					<hr>
					  <div style="text-align: <?php echo Languages::text_align(); ?>" class="table-responsive">
						<table class="table table-striped">
						  <thead>
							<tr>
							  <th><?php _l("username"); ?></th>							  
							  <th><?php _l("status"); ?></th>
							  <th><?php _l("date"); ?></th>
							</tr>
						  </thead>
						  <tbody>
						  <?php 
						  $refs = get("referrals");
						  if(!empty($refs))
						  {
							  foreach($refs as $ref)
							  { 
						  ?>
							<tr id="ref_<?php echo $ref["id"]; ?>" >
							  <td><p><?php $u = Getdata::one_user($ref["new_id"]); echo $u["username"]; ?></p></td>
							  <td><p>
							  <?php 
							  if($ref["confirmed"]=="1")
							  {
								  echo l("confirmed")." <i class='fa fa-check' ></i>";
							  }
							  else
							  {
								  echo l("pending")." <i class='fa fa-clock-o' ></i>";
							  }
							  ?>
							  </p></td>
							  <td><p><?php echo date("d M Y", $ref["created_at"]); ?></p></td>
							</tr>
						  <?php 
							  }
						  }
						  ?>
						  </tbody>
						</table>
					  </div>
					  
					  <ul class="pagination" >
						<?php _get("pagination"); ?>
					  </ul>
                    <?php _s("ads/footer"); ?>
					</div>
				</div>
			</section>
<?php include("footer.php"); ?>