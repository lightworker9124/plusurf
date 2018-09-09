<?php include("header.php"); ?>
<script>
function remove_report(id, hideid)
{
	$.ajax({
		url: "<?php _router("admin_reported_websites"); ?>",
		data: "removeid="+id,
		type: "POST",
		success: function(data){
			if(data["type"] == "success")
			{
				$(hideid).hide();
			}
		},
		error: function(){
			//
		}
	});
}
</script>
	<div id="admin-body" >
		<div id="header-title">
			<a href="<?php _router("admin_home"); ?>" data-original-title="Admin Panel" class="tip-bottom"><i class="fa fa-home"></i> Admin Panel</a>
			<a href="<?php _router("admin_reported_websites"); ?>" data-original-title="Reported websites" class="tip-bottom"><i class="fa fa-flag"></i> Reported websites</a>
		</div>
		<div id="admin-content" >
		<div class="row" >
		<div class="col-md-12 main panel panel-default">
		<div class="panel-body" >
			<h1 class="page-header"><i class="fa fa-flag" ></i> Reported websites</h1>
			<div class="table-responsive">
			<?php $data = get("websites"); ?>
			<?php if(!empty($data)) { ?>
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>#ID</th>
					  <th>URL</th>
					  <th>STATUS</th>
					  <th>DATE</th>
					  <th>EDIT</th>
					</tr>
				  </thead>
				  <tbody>
					<?php foreach($data as $one) {?>
					<tr id="item_<?php echo $one["id"]; ?>" >
					  <td><?php echo $one["id"]; ?></td>
					  <td><a target="_blank" href="<?php echo $one["url"]; ?>" ><?php echo htmlentities(Sys::split($one["url"], 30)); ?></a></td>
					  <td><?php if($one["activated"]=="1") { echo "<i style='color: green' >Activated</i>"; } else { echo "<i  style='color: red' >Pending</i>"; } ?></td>
					  <td><?php if(!empty($one["created_at"])) { echo date("Y M d", $one["created_at"]);  } ?></td>
					  <td>
						<div class="btn-group">
						  <a id="act_<?php echo $one["id"]; ?>" onclick="remove_report('<?php echo $one["id"]; ?>', '#item_<?php echo $one["id"]; ?>');" href="javascript:void(0);" type="button" class="btn btn-primary"><i class="fa fa-check" ></i> Remove Report</a>
						  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
						  <ul class="dropdown-menu">
							<li>
							<?php if($one["status"]=="1") { ?>
							<a id="status_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'websites', 'status_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Disable</a>
							<?php } else if($one["status"]=="0") { ?>
							<a id="status_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'websites', 'status_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Enable</a>
							<?php } ?>
							</li>
							<li><a href="<?php _router("admin_websites", array("id" => $one["user_id"])); ?>?edit=<?php echo $one["id"]; ?>">Edit</a></li>
							<li><a onclick="del(<?php echo $one["id"]; ?>, 'websites', 'item_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Delete</a></li>
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
        </div>
		</div>
		</div>
		</div>
	</div>
<?php include("footer.php"); ?>
