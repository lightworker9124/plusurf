<?php include("header.php"); ?>
	<div id="admin-body" >
		<div id="header-title"> 
			<a href="<?php _router("admin_home"); ?>" data-original-title="Admin Panel" class="tip-bottom"><i class="fa fa-home"></i> Admin Panel</a>
			<a href="<?php _router("admin_referrals"); ?>" data-original-title="Referrals" class="tip-bottom"><i class="fa fa-share"></i> Referrals</a>
		</div>
		<div id="admin-content" >
		<div class="row" >
		<div class="col-md-12 main panel panel-default">
		<div class="panel-body" >
			<h1 class="page-header"><i class="fa fa-share" ></i> Referrals</h1>
			<?php if($_GET["edit"]) { ?>
			<?php $info = get("info"); ?>
			<a class="btn btn-warning btn-lg" href="<?php _router("admin_referrals"); ?>" > << Back</a>
			<?php if($info["status"]=="0") { ?>
			<a class="btn btn-success btn-lg" id="user_<?php echo $info["id"]; ?>" href="Javascript::void(0)" onclick="change_status(<?php echo $info["id"]; ?>, 'referrals', 'user_<?php echo $info["id"]; ?>');" >Enable</a>
			<?php } else { ?>
			<a class="btn btn-success btn-lg" id="user_<?php echo $info["id"]; ?>" href="Javascript::void(0)" onclick="change_status(<?php echo $info["id"]; ?>, 'referrals', 'user_<?php echo $info["id"]; ?>');" >Disable</a>
			<?php } ?>
			<?php if($info["confirmed"]=="0") { ?>
			<a class="btn btn-primary btn-lg" id="act_<?php echo $info["id"]; ?>" href="Javascript::void(0)" onclick="activate(<?php echo $info["id"]; ?>, 'referrals', 'act_<?php echo $info["id"]; ?>');" >Confirm</a>
			<?php } else { ?>
			<a href="Javascript::void(0);" class="btn btn-primary btn-lg" >Confirmed</a>
			<?php } ?>
			<hr>
			<?php } else { ?>
			<div class="table-responsive">
			<?php $data = get("referrals"); ?>
			<?php if(!empty($data)) { ?>
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>#ID</th>
					  <th>USER</th>
					  <th>IP</th>
					  <th>DATE</th>
					  <th>EDIT</th>
					</tr>
				  </thead>
				  <tbody>
					<?php foreach($data as $one) {?>
					<tr id="item_<?php echo $one["id"]; ?>" >
					  <td><?php echo $one["id"]; ?></td>
					  <td><a href="<?php _router("admin_users"); ?>?edit=<?php echo $one["new_id"]; ?>"><?php echo $one["new_id"]; ?></a> By <a href="<?php _router("admin_users"); ?>?edit=<?php echo $one["user_id"]; ?>"><?php echo $one["user_id"]; ?></a></td>
					  <td><?php echo $one["ip"]; ?></td>
					  <td><?php if(!empty($one["created_at"])) { echo date("Y M d", $one["created_at"]);  } ?></td>
					  <td>
						<div class="btn-group">
						  <a href="<?php _router("admin_referrals"); ?>?edit=<?php echo $one["id"]; ?>" type="button" class="btn btn-primary"><i class="fa fa-pencil" ></i> Edit</a>
						  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
						  <ul class="dropdown-menu">
							<li>
							<?php if($one["status"]=="1") { ?>
							<a id="status_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'referrals', 'status_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Disable</a>
							<?php } else if($one["status"]=="0") { ?>
							<a id="status_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'referrals', 'status_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Enable</a>
							<?php } ?>
							</li>
							<li><a href="<?php _router("admin_referrals"); ?>?edit=<?php echo $one["id"]; ?>">Edit</a></li>
							<li><a onclick="del(<?php echo $one["id"]; ?>, 'referrals', 'item_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Delete</a></li>
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