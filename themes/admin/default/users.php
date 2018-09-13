<?php include("header.php"); ?>
	<div id="admin-body" >
		<div id="header-title"> 
			<a href="<?php _router("admin_home"); ?>" data-original-title="Admin Panel" class="tip-bottom"><i class="fa fa-home"></i> Admin Panel</a>
			<a href="<?php _router("admin_users"); ?>" data-original-title="Users" class="tip-bottom"><i class="fa fa-users"></i> Users</a>
		</div>
		<div id="admin-content" >
		<div class="row" >
		<div class="col-md-12 main panel panel-default">
		<div class="panel-body" >
			<h1 class="page-header"><i class="fa fa-users" ></i> Users</h1>
            <?php if($_GET["add"]=="new") { ?>
			<script>
			$(document).ready(function(){
				$("#add_user_form").submit(function(e){
					e.preventDefault();
					ajax_post('add_user_form', 'add_user_alert', 1, "<?php _router("admin_users"); ?>", false);
				});
			});
			</script>
			<form id="add_user_form" action="<?php _router("admin_ajax_add"); ?>" method="post" >
				<input type="hidden" name="kindofpost" value="user" />
				<div class="form-group">
				  <label class="control-label" >Username</label>
				  <input class="form-control" value="" name="username" placeholder="Username.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Email</label>
				  <input class="form-control" value="" name="email" placeholder="Email.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Password</label>
				  <input class="form-control" name="password" placeholder="Password.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Confirm Password</label>
				  <input class="form-control" name="password2" placeholder="Confirm Password.."  type="text">
				</div>
				<div class="form-group">
				  <input class="form-control btn btn-primary" value="ADD +" type="submit">
				</div>
				<div id="add_user_alert" ></div>
			</form>
			<?php } else if($_GET["edit"]) { ?>
			<?php $info = get("info"); ?>
			<a class="btn btn-warning btn-lg" href="<?php _router("admin_users"); ?>" > << Back</a>
			<?php if($info["status"]=="0") { ?>
			<a class="btn btn-success btn-lg" id="user_<?php echo $info["id"]; ?>" href="Javascript::void(0)" onclick="change_status(<?php echo $info["id"]; ?>, 'users', 'user_<?php echo $info["id"]; ?>');" >Enable</a>
			<?php } else { ?>
			<a class="btn btn-success btn-lg" id="user_<?php echo $info["id"]; ?>" href="Javascript::void(0)" onclick="change_status(<?php echo $info["id"]; ?>, 'users', 'user_<?php echo $info["id"]; ?>');" >Disable</a>
			<?php } ?>
            <hr>
			<?php if($info["type"]!="Bronze") { ?>
            <div style="display: none;" id="change_duration" >
            <input class="form-control" value="1" id="duration_number" name="duration_number" placeholder="How many..."  type="number">
			<select class="form-control" id="duration_kind" name="plan_duration_type" >
				  <?php Template::options(array(
				  "y" => "Year",
				  "m" => "Month",
				  "d" => "Day"
				  ), "y"); ?>
			</select>
            </div>
			<a class="btn btn-info" id="upgrade_<?php echo $info["id"]; ?>" href="Javascript::void(0)" onclick="user_type(<?php echo $info["id"]; ?>, 'upgrade_<?php echo $info["id"]; ?>');" >Downgrade Account</a>
			<?php } else { ?>
            <div id="change_duration" >
            <input class="form-control" value="1" id="duration_number" name="duration_number" placeholder="How many..."  type="number">
			<select class="form-control" id="duration_kind" name="plan_duration_type" >
				  <?php Template::options(array(
				  "y" => "Year",
				  "m" => "Month",
				  "d" => "Day"
				  ), "y"); ?>
			</select>
            </div>
			<a class="btn btn-info" id="upgrade_<?php echo $info["id"]; ?>" href="Javascript::void(0)" onclick="user_type(<?php echo $info["id"]; ?>, 'upgrade_<?php echo $info["id"]; ?>');" >Upgrade Account</a>
			<?php } ?>
			<hr>
			<script>
			$(document).ready(function(){
				$("#edit_user_form").submit(function(e){
					e.preventDefault();
					ajax_post('edit_user_form', 'edit_user_alert', 0, "", false);
				});
				$("#editpass_user_form").submit(function(e){
					e.preventDefault();
					ajax_post('editpass_user_form', 'editpass_user_alert', 0, "", false);
				});
			});
			</script>
			<form id="edit_user_form" action="<?php _router("admin_ajax_update", array("id" => $info["id"] )); ?>" method="post" >
				<input type="hidden" name="kindofpost" value="user" />
				<div class="form-group">
				  <label class="control-label" >Username</label>
				  <input class="form-control" value="<?php echo htmlentities($info["username"]); ?>" name="edit_username" placeholder="Username.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Email</label>
				  <input class="form-control" value="<?php echo htmlentities($info["email"]); ?>" name="edit_email" placeholder="Email.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Website Slots</label>
				  <input class="form-control" value="<?php echo $info["website_slots"]; ?>" name="edit_website_slots" placeholder="Website Slots.."  type="number">
				</div>
				<div class="form-group">
				  <label class="control-label" >Plusurf Viewer Slots</label>
				  <input class="form-control" value="<?php echo $info["session_slots"]; ?>" name="edit_session_slots" placeholder="Plusurf Viewer Slots.."  type="number">
				</div>
				<div class="form-group">
				  <label class="control-label" >Traffic Ratio</label>
				  <input class="form-control" value="<?php echo $info["traffic_ratio"]; ?>" name="edit_traffic_ratio" placeholder="Traffic Ratio.."  type="number">
				</div>
				<div class="form-group">
				  <label class="control-label" >Points</label>
				  <input class="form-control" value="<?php echo $info["points"]; ?>" name="edit_points" placeholder="Points.."  type="text">
				</div>
				<div class="form-group">
				  <input class="form-control btn btn-primary" value="Update" type="submit">
				</div>
				<div id="edit_user_alert" ></div>
			</form>
			<hr>
			<form id="editpass_user_form" action="<?php _router("admin_ajax_update", array("id" => $info["id"] )); ?>" method="post" >
				<input type="hidden" name="kindofpost" value="user" />
				<div class="form-group">
				  <label class="control-label" >Password</label>
				  <input class="form-control" name="edit_password" placeholder="Password.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Confirm Password</label>
				  <input class="form-control" name="edit_password2" placeholder="Confirm Password.."  type="text">
				</div>
				<div class="form-group">
				  <input class="form-control btn btn-primary" value="Update" type="submit">
				</div>
				<div id="editpass_user_alert" ></div>
			</form>
			<?php } else { ?>
            <a class="btn btn-primary" href="<?php _router("admin_users"); ?>?add=new" >Add new user</a><hr>
			<div class="table-responsive">
			<?php $data = get("users"); ?>
			<?php if(!empty($data)) { ?>
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>#ID</th>
					  <th>USERNAME</th>
					  <th>EMAIL</th>
					  <th>DATE</th>
					  <th>EDIT</th>
					  <th>WEBSITES</th>
					</tr>
				  </thead>
				  <tbody>
					<?php foreach($data as $one) {?>
					<tr id="item_<?php echo $one["id"]; ?>" >
					  <td><?php echo $one["id"]; ?></td>
					  <td><?php echo htmlentities($one["username"]); ?></td>
					  <td><?php echo htmlentities($one["email"]); ?></td>
					  <td><?php if(!empty($one["created_at"])) { echo date("Y M d", $one["created_at"]);  } ?></td>
					  <td>
						<div class="btn-group">
						  <a href="<?php _router("admin_users"); ?>?edit=<?php echo $one["id"]; ?>" type="button" class="btn btn-primary"><i class="fa fa-pencil" ></i> Edit</a>
						  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
						  <ul class="dropdown-menu">
							<li>
							<?php if($one["status"]=="1") { ?>
							<a id="status_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'users', 'status_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Disable</a>
							<?php } else if($one["status"]=="0") { ?>
							<a id="status_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'users', 'status_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Enable</a>
							<?php } ?>
							</li>
                            <li>
                            <?php if($one["type"]!="Bronze") { ?>
                            <a id="upgrade_<?php echo $one["id"]; ?>" href="Javascript::void(0)" onclick="user_type(<?php echo $one["id"]; ?>, 'upgrade_<?php echo $one["id"]; ?>');" >Downgrade Account</a>
                            <?php } else { ?>
                            <a id="upgrade_<?php echo $one["id"]; ?>" href="Javascript::void(0)" onclick="user_type(<?php echo $one["id"]; ?>, 'upgrade_<?php echo $one["id"]; ?>');" >Upgrade Account</a>
                            <?php } ?>
                            </li>
							<li><a href="<?php _router("admin_users"); ?>?edit=<?php echo $one["id"]; ?>">Edit</a></li>
							<li><a onclick="del(<?php echo $one["id"]; ?>, 'users', 'item_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Delete</a></li>
							<li class="divider"></li>
							<li><a href="Javascript::void(0)">Cancel</a></li>
						  </ul>
						</div>
					  </td>
					  <td><a class="btn btn-warning" href="<?php _router("admin_websites", array("id" => $one["id"])); ?>" >Websites</a></td>
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