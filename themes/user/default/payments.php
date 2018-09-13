<?php include("header.php"); ?>
<?php include("menu.php"); ?>
		<div id="site-wrapper" >
		<?php if($_GET["upgrade"]=="true") { ?>
		<center><?php include("currency.php"); ?></center>
    	<div style="margin-top: 0px; " class="pricing-container">
		<ul class="pricing-list bounce-invert">
		<?php 
		$plans = get("plans");
		if(!empty($plans) && is_array($plans))
		{
			foreach($plans as $plan)
			{
		?>
			<li class="exclusive">
				<ul class="pricing-wrapper">
					<li class="is-visible">
						<header class="pricing-header">
							<h2><?php echo $plan["name"]; ?></h2>
							<div class="price">
								<span class="currency"><?php echo $plan["currency"]; ?></span>
								<span class="value"><?php echo $plan["price"]; ?></span>
								<span class="duration"><?php
							  $duration = explode("-", $plan["duration"]);
							  
							  switch($duration[1])
							  {
								  case 'd':
									if($duration[0]>1){ echo $duration[0]." ".l("days"); } else { _l("day"); }
								  break;
								  case 'm':
									if($duration[0]>1){ echo $duration[0]." ".l("months"); } else { _l("month"); }
								  break;
								  case 'y':
									if($duration[0]>1){ echo $duration[0]." ".l("years"); } else { _l("year"); }
								  break;
							  }
							  ?></span>
							</div>
						</header>
						<div class="pricing-body">
							<ul class="pricing-features">
							  <li><i class="icon-check"></i> <?php _l("traffic_source"); ?> : <b class="fg-blue" ><?php _l("yes"); ?></b></li>
							  <li><i class="icon-check"></i> <?php _l("website_slots"); ?> : <b class="fg-blue" ><?php echo $plan["website_slots"]; ?></b></li>
							  <li><i class="icon-check"></i> <?php _l("session_slots"); ?> : <b class="fg-blue" ><?php echo $plan["session_slots"]; ?></b></li>
							  <li><i class="icon-check"></i> <?php _l("traffic_ratio"); ?> : <b class="fg-blue" ><?php echo $plan["traffic_ratio"]; ?> %</b></li>
							</ul>
						</div>
						<footer class="pricing-footer">
							<?php if($plan["price"] > 0 && u("type")=="Bronze") { ?>
							<a href="<?php _router("checkout", array("id" => Encryption::encode($plan["id"]))); ?>" class="select"><?php _l("choose_plan"); ?></a>
							<?php } else { ?>
							<a href="#" class="btn btn-success"><?php _l("youre_alerady_haveit"); ?></a>
							<?php } ?>
						</footer>
					</li>
				</ul>
			</li>
		<?php
			}
		}
		else
		{
			echo '<center><p>'.l("error_empty_plans").' <a href="'.router("payments").'" ><i class="fa fa-arrow-left"></i></a></p></center>';
		}
		?>
		</ul>
		</div>			
		<?php } else if($_GET["traffic"]=="true") { ?>
		<center><?php include("currency.php"); ?></center>
    	<div style="margin-top: 0px; "  class="pricing-container">
		<ul class="pricing-list bounce-invert">
		<?php 
		$plans = get("plans");
		if(!empty($plans) && is_array($plans))
		{
			foreach($plans as $plan)
			{
		?>
			<li class="exclusive">
				<ul class="pricing-wrapper">
					<li class="is-visible">
						<header class="pricing-header">
							<h2><?php echo $plan["name"]; ?></h2>
							<div class="price">
								<span class="currency"><?php echo $plan["currency"]; ?></span>
								<span class="value"><?php echo $plan["price"]; ?></span>
							</div>
						</header>
						<div class="pricing-body">
							<ul class="pricing-features">
							  <li><i class="icon-check"></i> <?php _l("points"); ?> : +<b class="fg-blue" ><?php echo $plan["points"]; ?> <?php _l("point"); ?></b></li>
							  <li><i class="icon-check"></i> <?php _l("hits_for_20"); ?> : <b class="fg-blue" ><?php echo floor((60/(20*s("nochange/point")))*$plan["points"]); ?></b></li>      
							</ul>
						</div>
						<footer class="pricing-footer">
							<a href="<?php _router("checkout", array("id" => Encryption::encode($plan["id"]))); ?>" class="select"><?php _l("choose_plan"); ?></a>
						</footer>
					</li>
				</ul>
			</li>
		<?php
			}
		}
		else
		{
			echo '<center><p>'.l("error_empty_plans").' <a href="'.router("payments").'" ><i class="fa fa-arrow-left"></i></a></p></center>';
		}
		?>
		</ul>
		</div>
		<?php } else if($_GET["websites"]=="true") { ?>
		<center><?php include("currency.php"); ?></center>
    	<div style="margin-top: 0px; "  class="pricing-container">
		<ul class="pricing-list bounce-invert">
		<?php 
		$plans = get("plans");
		if(!empty($plans) && is_array($plans))
		{
			foreach($plans as $plan)
			{
		?>
			<li class="exclusive">
				<ul class="pricing-wrapper">
					<li class="is-visible">
						<header class="pricing-header">
							<h2><?php echo $plan["name"]; ?></h2>
							<div class="price">
								<span class="currency"><?php echo $plan["currency"]; ?></span>
								<span class="value"><?php echo $plan["price"]; ?></span>
							</div>
						</header>
						<div class="pricing-body">
							<ul class="pricing-features">
							  <li><i class="icon-check"></i> <?php _l("website_slots"); ?> : <b class="fg-blue" ><?php echo $plan["website_slots"]; ?></b></li>
							</ul>
						</div>
						<footer class="pricing-footer">
							<?php if($plan["price"] > 0 && u("website_slots")< $plan["website_slots"]) { ?>
							<a href="<?php _router("checkout", array("id" => Encryption::encode($plan["id"]))); ?>" class="select"><?php _l("choose_plan"); ?></a>
							<?php } else { ?>
							<a href="#" class="btn btn-success"><?php _l("youre_alerady_haveit"); ?></a>
							<?php } ?>
						</footer>
					</li>
				</ul>
			</li>
		<?php
			}
		}
		else
		{
			echo '<center><p>'.l("error_empty_plans").' <a href="'.router("payments").'" ><i class="fa fa-arrow-left"></i></a></p></center>';
		}
		?>
		</ul>
		</div>
		<?php } else if($_GET["sessions"]=="true") { ?>
		<center><?php include("currency.php"); ?></center>
    	<div style="margin-top: 0px; "  class="pricing-container">
		<ul class="pricing-list bounce-invert">
		<?php 
		$plans = get("plans");
		if(!empty($plans) && is_array($plans))
		{
			foreach($plans as $plan)
			{
		?>
			<li class="exclusive">
				<ul class="pricing-wrapper">
					<li class="is-visible">
						<header class="pricing-header">
							<h2><?php echo $plan["name"]; ?></h2>
							<div class="price">
								<span class="currency"><?php echo $plan["currency"]; ?></span>
								<span class="value"><?php echo $plan["price"]; ?></span>
							</div>
						</header>
						<div class="pricing-body">
							<ul class="pricing-features">
							  <li><i class="icon-check"></i> <?php _l("session_slots"); ?> : <b class="fg-blue" ><?php echo $plan["session_slots"]; ?></b></li>
							</ul>
						</div>
						<footer class="pricing-footer">
							<?php if($plan["price"] > 0 && u("session_slots")< $plan["session_slots"]) { ?>
							<a href="<?php _router("checkout", array("id" => Encryption::encode($plan["id"]))); ?>" class="select"><?php _l("choose_plan"); ?></a>
							<?php } else { ?>
							<a href="#" class="btn btn-success"><?php _l("youre_alerady_haveit"); ?></a>
							<?php } ?>
						</footer>
					</li>
				</ul>
			</li>
		<?php
			}
		}
		else
		{
			echo '<center><p>'.l("error_empty_plans").' <a href="'.router("payments").'" ><i class="fa fa-arrow-left"></i></a></p></center>';
		}
		?>
		</ul>
		</div>
		<?php } else if($_GET["success"]=="true") { ?>
			<section  class="main style3 secondary">
				<div class="content container">
					<header>
						<h2><i class="fa fa-check" ></i> <?php _l("done"); ?></h2>
					</header>
					<div style="text-align: <?php echo Languages::text_align(); ?>" class="box container 75%">
					<center><p style="font-size: 1.5em;" ><?php _l("payment_completed_hint"); ?> <i class="fa fa-smile-o" ></i></p></center>
					<center>
					<footer>
						<a href="<?php _router("payments"); ?>" class="button style2 left"><?php _l("payments"); ?></a>
						<a href="<?php _router("home"); ?>" class="button style2 left"><?php _l("back_dashboard"); ?></a>
					</footer>
					</center>
					</div>
				</div>
			</section>
		<?php } else if($_GET["success"]=="false") { ?>
			<section  class="main style3 secondary">
				<div class="content container">
					<header>
						<h2><i class="fa fa-check" ></i> <?php _l("done"); ?></h2>
					</header>
					<div style="text-align: <?php echo Languages::text_align(); ?>" class="box container 75%">
					<center><p style="font-size: 1.5em;" ><?php _l("payment_notcompleted_hint"); ?> <i class="fa fa-smile-o" ></i></p></center>
					<center>
					<footer>
						<a href="<?php _router("contact"); ?>" class="button style2 left"><?php _l("contact"); ?></a>
						<a href="<?php _router("payments"); ?>" class="button style2 left"><?php _l("payments"); ?></a>
					</footer>
					</center>
					</div>
				</div>
			</section>
		<?php } else if($_GET["success"]=="wait") { ?>
			<section  class="main style3 secondary">
				<div class="content container">
					<header>
						<h2><i class="fa fa-check" ></i> <?php _l("done"); ?></h2>
					</header>
					<div style="text-align: <?php echo Languages::text_align(); ?>" class="box container 75%">
					<center><p style="font-size: 1.5em;" ><?php _l("payment_pending_wait"); ?> <i class="fa fa-meh-o" ></i></p></center>
					<center>
					<footer>
						<a href="<?php _router("contact"); ?>" class="button style2 left"><?php _l("contact"); ?></a>
						<a href="<?php _router("payments"); ?>" class="button style2 left"><?php _l("payments"); ?></a>
					</footer>
					</center>
					</div>
				</div>
			</section>
		<?php } else if($_GET["cancel"]=="true") { ?>
			<section  class="main style3 secondary">
				<div class="content container">
					<header>
						<h2><i class="fa fa-close" ></i> <?php _l("canceled"); ?></h2>
					</header>
					<div style="text-align: <?php echo Languages::text_align(); ?>" class="box container 75%">
					<center><p style="font-size: 1.5em;" ><?php _l("payment_canceled_hint"); ?> <i class="fa fa-frown-o" ></i></p></center>
					<center>
					<footer>
						<a href="<?php _router("contact"); ?>" class="button style2 left"><?php _l("back_dashboard"); ?></a>
						<a href="<?php _router("payments"); ?>" class="button style2 left"><?php _l("payments"); ?></a>
					</footer>
					</center>
					</div>
				</div>
			</section>
		<?php } else if($_GET["cancel"]=="declined") { ?>
			<section  class="main style3 secondary">
				<div class="content container">
					<header>
						<h2><i class="fa fa-close" ></i> <?php _l("declined"); ?></h2>
					</header>
					<div style="text-align: <?php echo Languages::text_align(); ?>" class="box container 75%">
					<center><p style="font-size: 1.5em;" ><?php _l("payment_declined_hint"); ?> <i class="fa fa-frown-o" ></i></p></center>
					<center>
					<footer>
						<a href="<?php _router("contact"); ?>" class="button style2 left"><?php _l("back_dashboard"); ?></a>
						<a href="<?php _router("payments"); ?>" class="button style2 left"><?php _l("payments"); ?></a>
					</footer>
					</center>
					</div>
				</div>
			</section>
		<?php } else { ?>
			<section  class="main style3 secondary">
				<div class="content container">
					<header>
						<h2><?php _l("payments"); ?></h2>
					</header>
					<?php include("promo.php"); ?>
					<div style="text-align: <?php echo Languages::text_align(); ?>" class="box container 100%">
					
					  <div style="text-align: <?php echo Languages::text_align(); ?>" class="table-responsive">
						<table class="table table-striped table-condensed ">
						  <thead>
							<tr>
							  <th><?php _l("payment_id"); ?></th>
							  <th><?php _l("status"); ?></th>
							  <th><?php _l("amount"); ?></th>
							  <th><?php _l("date"); ?></th>
							</tr>
						  </thead>
						  <tbody>
						  <?php 
						  $payments = get("payments");
						  if(!empty($payments))
						  {
							  foreach($payments as $payment)
							  { 
						  ?>
							<tr id="payment_<?php echo $payment["id"]; ?>" >
							  <td><p><?php echo $payment["payment_id"]; ?></p></td>
							  <td><b class="btn btn-info" >
							  <?php 
							  if($payment["confirmed"]=="0")
							  {
								  _l("canceled"); echo " <i class='no-phone icon fa-frown-o' ></i>";
							  }
							  else if($payment["confirmed"]=="1")
							  {
								  _l("pending"); echo " <i class='no-phone icon fa-meh-o' ></i>";
							  }
							  else if($payment["confirmed"]=="2")
							  {
								  _l("done"); echo " <i class='no-phone icon fa-smile-o' ></i>";
							  }
							  ?>
							  </b></td>
							  <td><b class="btn btn-danger" > <?php echo $payment["amount"]; ?> <?php echo $payment["currency"]; ?> <i class="no-phone icon fa-money"></i></b></td>
							  <td><b class="small btn btn-default"><?php echo date("Y/m/d h:i:s", $payment["created_at"]); ?> <i class="no-phone icon fa-clock-o"></i></b></td>
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
					</div>
				</div>
			</section>
		<?php } ?>
		  </div>
<?php include("footer.php"); ?>