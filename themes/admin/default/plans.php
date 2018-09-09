<?php include("header.php"); ?>
	<div id="admin-body" >
		<div id="header-title"> 
			<a href="<?php _router("admin_home"); ?>" data-original-title="Admin Panel" class="tip-bottom"><i class="fa fa-home"></i> Admin Panel</a>
			<a href="<?php _router("admin_plans"); ?>" data-original-title="Plans" class="tip-bottom"><i class="fa fa-list"></i> Plans</a>
		</div>
		<div id="admin-content" >
		<div class="row" >
		<div class="col-md-12 main panel panel-default">
		<div class="panel-body" >
			<h1 class="page-header"><i class="fa fa-list" ></i> Plans</h1>
			<?php if($_GET["add"]) { ?>
			<script>
			function get_form_ready(id)
			{
				val = $(id).val();
				if(val=="upgrade")
				{
					$('#plan_points').hide();
					$('#plan_websites').show();
					$('#plan_sessions').show();
					$('#plan_ratio').show();
					$('#plan_duration').show();
				} else if(val=="traffic")
				{
					$('#plan_points').show();
					$('#plan_websites').hide();
					$('#plan_sessions').hide();
					$('#plan_ratio').hide();
					$('#plan_duration').hide();
				} else if(val=="websites")
				{
					$('#plan_points').hide();
					$('#plan_websites').show();
					$('#plan_sessions').hide();
					$('#plan_ratio').hide();
					$('#plan_duration').hide();
				} else if(val=="sessions")
				{
					$('#plan_points').hide();
					$('#plan_websites').hide();
					$('#plan_sessions').show();
					$('#plan_ratio').hide();
					$('#plan_duration').hide();
				}
			}
			$(document).ready(function(){
				get_form_ready('#plan_type');
				$('#plan_type').change(function(){
					get_form_ready('#plan_type');
				});
				$("#add_plan_form").submit(function(e){
					e.preventDefault();
					ajax_post('add_plan_form', 'add_plan_alert', 1, "<?php _router("admin_plans"); ?>", false);
				});
			});
			</script>
			<form id="add_plan_form" action="<?php _router("admin_ajax_add"); ?>" method="post" >
				<input type="hidden" name="kindofpost" value="plan" />
				<div class="form-group">
				  <label class="control-label" >Plan Name</label>
				  <input class="form-control" value="" name="plan_name" placeholder="Plan Name.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Type</label>
				  <select class="form-control" id="plan_type" name="plan_type" >
				  <?php Template::options(array(
				  "upgrade" => "Upgrade",
				  "traffic" => "More Traffic",
				  "websites" => "Website slots",
				  "sessions" => "Session slots"
				  ), "traffic"); ?>
				  </select>
				</div>
				<div style="display: none" id="plan_points" class="form-group">
				  <label class="control-label" >Points</label>
				  <input class="form-control" value="100" name="plan_points" placeholder="Points.."  type="number">
				</div>
				<div style="display: none" id="plan_websites" class="form-group">
				  <label class="control-label" >Website slots</label>
				  <input class="form-control" value="2" name="plan_websites" placeholder="Website slots.."  type="number">
				</div>
				<div style="display: none" id="plan_sessions" class="form-group">
				  <label class="control-label" >Session slots</label>
				  <input class="form-control" value="2" name="plan_sessions" placeholder="Session slots.."  type="number">
				</div>
				<div style="display: none" id="plan_ratio" class="form-group">
				  <label class="control-label" >Traffic Ratio (max 100%)</label>
				  <input class="form-control" value="40" name="plan_ratio" placeholder="Traffic Ratio.."  type="number">
				</div>
				<div class="form-group">
				  <label class="control-label" >Currency</label>
				  <select class="form-control" id="plan_currency" name="plan_currency" >
				  <?php Template::options(s("currency"), s("generale/currency")); ?>
				  </select>
				</div>
				<div style="display: none" id="plan_duration" class="form-group">
				  <label class="control-label" >Duration</label>
				  <input class="form-control" value="1" name="plan_duration" placeholder="How many..."  type="number">
				  <select class="form-control" id="plan_duration_type" name="plan_duration_type" >
				  <?php Template::options(array(
				  "y" => "Year",
				  "m" => "Month",
				  "d" => "Day"
				  ), "y"); ?>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" >Price</label>
				  <input class="form-control" value="" name="plan_price" placeholder="Price.."  type="text">
				</div>
				<div class="form-group">
				  <input class="form-control btn btn-primary" value="ADD +" type="submit">
				</div>
				<div id="add_plan_alert" ></div>
			</form>
			<?php } else if($_GET["edit"]) { ?>
			<?php $info = get("info"); ?>
			<script>
			function get_form_ready(id)
			{
				val = $(id).val();
				if(val=="upgrade")
				{
					$('#plan_points').hide();
					$('#plan_websites').show();
					$('#plan_sessions').show();
					$('#plan_ratio').show();
					$('#plan_duration').show();
				} else if(val=="traffic")
				{
					$('#plan_points').show();
					$('#plan_websites').hide();
					$('#plan_sessions').hide();
					$('#plan_ratio').hide();
					$('#plan_duration').hide();
				} else if(val=="websites")
				{
					$('#plan_points').hide();
					$('#plan_websites').show();
					$('#plan_sessions').hide();
					$('#plan_ratio').hide();
					$('#plan_duration').hide();
				} else if(val=="sessions")
				{
					$('#plan_points').hide();
					$('#plan_websites').hide();
					$('#plan_sessions').show();
					$('#plan_ratio').hide();
					$('#plan_duration').hide();
				}
			}
			$(document).ready(function(){
				get_form_ready('#plan_type');
				$('#plan_type').change(function(){
					get_form_ready('#plan_type');
				});
				$("#edit_plan_form").submit(function(e){
					e.preventDefault();
					ajax_post('edit_plan_form', 'edit_plan_alert', 0, "", false);
				});
			});
			</script>
			<form id="edit_plan_form" action="<?php _router("admin_ajax_update", array("id" => $info["id"])); ?>" method="post" >
				<input type="hidden" name="kindofpost" value="plan" />
				<div class="form-group">
				  <label class="control-label" >Plan Name</label>
				  <input class="form-control" value="<?php echo $info["name"]; ?>" name="plan_name" placeholder="Plan Name.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Type</label>
				  <select class="form-control" id="plan_type" name="plan_type" >
				  <?php Template::options(array(
				  "upgrade" => "Upgrade",
				  "traffic" => "More Traffic",
				  "websites" => "Website slots",
				  "sessions" => "Session slots"
				  ), $info["type"]); ?>
				  </select>
				</div>
				<div style="display: none" id="plan_points" class="form-group">
				  <label class="control-label" >Points</label>
				  <input class="form-control" value="<?php echo $info["points"]; ?>" name="plan_points" placeholder="Points.."  type="number">
				</div>
				<div style="display: none" id="plan_websites" class="form-group">
				  <label class="control-label" >Website slots</label>
				  <input class="form-control" value="<?php echo $info["website_slots"]; ?>" name="plan_websites" placeholder="Website slots.."  type="number">
				</div>
				<div style="display: none" id="plan_sessions" class="form-group">
				  <label class="control-label" >Session slots</label>
				  <input class="form-control" value="<?php echo $info["session_slots"]; ?>" name="plan_sessions" placeholder="Session slots.."  type="number">
				</div>
				<div style="display: none" id="plan_ratio" class="form-group">
				  <label class="control-label" >Traffic Ratio (max 100%)</label>
				  <input class="form-control" value="<?php echo $info["traffic_ratio"]; ?>" name="plan_ratio" placeholder="Traffic Ratio.."  type="number">
				</div>
				<div class="form-group">
				  <label class="control-label" >Currency</label>
				  <select class="form-control" id="plan_currency" name="plan_currency" >
				  <?php Template::options(s("currency"), $info["currency"]); ?>
				  </select>
				</div>
				<div style="display: none" id="plan_duration" class="form-group">
				<?php
				$duration = explode("-", $info["duration"]);
				?>
				  <label class="control-label" >Duration</label>
				  <input class="form-control" value="<?php echo $duration[0]; ?>" name="plan_duration" placeholder="How many..."  type="number">
				  <select class="form-control" id="plan_duration_type" name="plan_duration_type" >
				  <?php Template::options(array(
				  "y" => "Year",
				  "m" => "Month",
				  "d" => "Day"
				  ), $duration[1]); ?>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" >Price</label>
				  <input class="form-control" value="<?php echo $info["price"]; ?>" name="plan_price" placeholder="Price.."  type="text">
				</div>
				<div class="form-group">
				  <input class="form-control btn btn-primary" value="Update" type="submit">
				</div>
				<div id="edit_plan_alert" ></div>
			</form>
			<?php } else { ?>
			<a class="btn btn-primary" href="<?php _router("admin_plans"); ?>?add=true" >Add new plan</a><hr>
			<div class="table-responsive">
			<?php $data = get("plans"); ?>
			<?php if(!empty($data)) { ?>
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>#ID</th>
					  <th>NAME</th>
					  <th>TYPE</th>
					  <th>PRICE</th>
					  <th>EDIT</th>
					</tr>
				  </thead>
				  <tbody>
					<?php foreach($data as $one) {?>
					<tr id="item_<?php echo $one["id"]; ?>" >
					  <td><?php echo $one["id"]; ?></td>
					  <td><?php echo $one["name"]; ?></td>
					  <td><?php echo $one["type"]; ?></td>
					  <td><?php echo $one["price"]; ?> <?php echo $one["currency"]; ?></td>
					  <td>
						<div class="btn-group">
						  <a href="<?php _router("admin_plans"); ?>?edit=<?php echo $one["id"]; ?>" type="button" class="btn btn-primary"><i class="fa fa-pencil" ></i> Edit</a>
						  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
						  <ul class="dropdown-menu">
							<li>
							<?php if($one["status"]=="1") { ?>
							<a id="status_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'plans', 'status_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Disable</a>
							<?php } else if($one["status"]=="0") { ?>
							<a id="status_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'plans', 'status_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Enable</a>
							<?php } ?>
							</li>
							<li><a href="<?php _router("admin_plans"); ?>?edit=<?php echo $one["id"]; ?>">Edit</a></li>
							<li><a onclick="del(<?php echo $one["id"]; ?>, 'plans', 'item_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Delete</a></li>
							<li class="divider"></li>
							<li><a href="Javascript::void(0)">Cancel</a></li>
						  </ul>
						</div>
					  </td>
					</tr>
					<?php } ?>
				  </tbody>
				</table>
				<ul class="pagination" >
					<?php _get("pagination"); ?>
			    </ul>
			<?php } else { ?>
			<p> Sorry - nothing found !</p>
			<?php } ?>
			</div>
			<?php } ?>
        </div>
		</div>
		</div>
		</div>
	</div>
<?php include("footer.php"); ?>