<?php include("header.php"); ?>
	<div id="admin-body" >
		<div id="header-title"> 
			<a href="<?php _router("admin_home"); ?>" data-original-title="Admin Panel" class="tip-bottom"><i class="fa fa-home"></i> Admin Panel</a>
			<a href="<?php _router("admin_admins"); ?>" data-original-title="Admins" class="tip-bottom"><i class="fa fa-user"></i> Admins</a>
		</div>
		<div id="admin-content" >
		<div class="row" >
		<div class="col-md-12 main panel panel-default">
		<div class="panel-body" >
			<h1 class="page-header"><i class="fa fa-user" ></i> Admins</h1>
			<?php if($_GET["add"]) { ?>
			<script>
			$(document).ready(function(){
				$("#add_admin_form").submit(function(e){
					e.preventDefault();
					ajax_post('add_admin_form', 'add_admin_alert', 1, "<?php _router("admin_admins"); ?>", false);
				});
			});
			</script>
			<form id="add_admin_form" action="<?php _router("admin_ajax_add"); ?>" method="post" >
				<input type="hidden" name="kindofpost" value="admin" />
				<div class="form-group">
				  <label class="control-label" >Username</label>
				  <input class="form-control" value="" name="admin_username" placeholder="Username.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Email</label>
				  <input class="form-control" value="" name="admin_email" placeholder="Email.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Password</label>
				  <input class="form-control" name="admin_password" placeholder="Password.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Confirm Password</label>
				  <input class="form-control" name="admin_password2" placeholder="Confirm Password.."  type="text">
				</div>
				<div class="form-group">
				  <input class="form-control btn btn-primary" value="ADD +" type="submit">
				</div>
				<div id="add_admin_alert" ></div>
			</form>
			<?php } else if($_GET["edit"]) { ?>
			<?php $info = get("info"); ?>
			<a class="btn btn-warning btn-lg" href="<?php _router("admin_admins"); ?>" > << Back</a>
			<?php if($info["status"]=="0") { ?>
			<a class="btn btn-success btn-lg" id="user_<?php echo $info["id"]; ?>" href="Javascript::void(0)" onclick="change_status(<?php echo $info["id"]; ?>, 'admins', 'user_<?php echo $info["id"]; ?>');" >Enable</a>
			<?php } else { ?>
			<a class="btn btn-success btn-lg" id="user_<?php echo $info["id"]; ?>" href="Javascript::void(0)" onclick="change_status(<?php echo $info["id"]; ?>, 'admins', 'user_<?php echo $info["id"]; ?>');" >Disable</a>
			<?php } ?>
			<hr>
			<script>
			$(document).ready(function(){
				$("#edit_admin_form").submit(function(e){
					e.preventDefault();
					ajax_post('edit_admin_form', 'edit_admin_alert', 0, "", false);
				});
				$("#editpass_admin_form").submit(function(e){
					e.preventDefault();
					ajax_post('editpass_admin_form', 'editpass_admin_alert', 0, "", false);
				});
			});
			</script>
			<form id="edit_admin_form" action="<?php _router("admin_ajax_update", array("id" => $info["id"] )); ?>" method="post" >
				<input type="hidden" name="kindofpost" value="admin" />
				<div class="form-group">
				  <label class="control-label" >Username</label>
				  <input class="form-control" value="<?php echo $info["username"]; ?>" name="edit_username" placeholder="Username.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Email</label>
				  <input class="form-control" value="<?php echo $info["email"]; ?>" name="edit_email" placeholder="Email.."  type="text">
				</div>
				<div class="form-group">
				  <input class="form-control btn btn-primary" value="Update" type="submit">
				</div>
				<div id="edit_admin_alert" ></div>
			</form>
			<hr>
			<form id="editpass_admin_form" action="<?php _router("admin_ajax_update", array("id" => $info["id"] )); ?>" method="post" >
				<input type="hidden" name="kindofpost" value="admin" />
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
				<div id="editpass_admin_alert" ></div>
			</form>
			<?php } else { ?>
			<a class="btn btn-primary" href="<?php _router("admin_admins"); ?>?add=true" >Add new admin</a><hr>
			<div class="table-responsive">
			<?php $data = get("admins"); ?>
			<?php if(!empty($data)) { ?>
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>#ID</th>
					  <th>USERNAME</th>
					  <th>EMAIL</th>
					  <th>DATE</th>
					  <th>EDIT</th>
					</tr>
				  </thead>
				  <tbody>
					<?php foreach($data as $one) {?>
					<tr id="item_<?php echo $one["id"]; ?>" >
					  <td><?php echo $one["id"]; ?></td>
					  <td><?php echo $one["username"]; ?></td>
					  <td><?php echo $one["email"]; ?></td>
					  <td><?php if(!empty($one["created_at"])) { echo date("Y M d", $one["created_at"]);  } ?></td>
					  <td>
						<div class="btn-group">
						  <a href="<?php _router("admin_admins"); ?>?edit=<?php echo $one["id"]; ?>" type="button" class="btn btn-primary"><i class="fa fa-pencil" ></i> Edit</a>
						  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
						  <ul class="dropdown-menu">
							<li>
							<?php if($one["status"]=="1") { ?>
							<a id="status_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'admins', 'status_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Disable</a>
							<?php } else if($one["status"]=="0") { ?>
							<a id="status_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'admins', 'status_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Enable</a>
							<?php } ?>
							</li>
							<li><a href="<?php _router("admin_admins"); ?>?edit=<?php echo $one["id"]; ?>">Edit</a></li>
							<li><a onclick="del(<?php echo $one["id"]; ?>, 'admins', 'item_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Delete</a></li>
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