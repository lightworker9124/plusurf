<?php include("header.php"); ?>
	<div id="admin-body" >
		<div id="header-title">
			<a href="<?php _router("admin_home"); ?>" data-original-title="Admin Panel" class="tip-bottom"><i class="fa fa-home"></i> Admin Panel</a>
			<a href="<?php _router("admin_websites", array("id" => get("user_id"))); ?>" data-original-title="Websites" class="tip-bottom"><i class="fa fa-globe"></i> Websites</a>
		</div>
		<div id="admin-content" >
		<div class="row" >
		<div class="col-md-12 main panel panel-default">
		<div class="panel-body" >
			<h1 class="page-header"><i class="fa fa-globe" ></i> Websites  ID: <?php _get("user_id"); ?></h1>
			<?php if($_GET["edit"]) { ?>
			<?php $info = get("info"); ?>
			<a class="btn btn-warning btn-lg" href="<?php _router("admin_websites", array("id" => get("user_id"))); ?>" > << Back</a>
			<?php if($info["status"]=="0") { ?>
			<a class="btn btn-success btn-lg" id="user_<?php echo $info["id"]; ?>" href="Javascript::void(0)" onclick="change_status(<?php echo $info["id"]; ?>, 'websites', 'user_<?php echo $info["id"]; ?>');" >Enable</a>
			<?php } else { ?>
			<a class="btn btn-success btn-lg" id="user_<?php echo $info["id"]; ?>" href="Javascript::void(0)" onclick="change_status(<?php echo $info["id"]; ?>, 'websites', 'user_<?php echo $info["id"]; ?>');" >Disable</a>
			<?php } ?>
			<?php if($info["activated"]=="0") { ?>
			<a class="btn btn-primary btn-lg" id="act_<?php echo $info["id"]; ?>" href="Javascript::void(0)" onclick="activate(<?php echo $info["id"]; ?>, 'websites', 'act_<?php echo $info["id"]; ?>');" >Confirm</a>
			<?php } else { ?>
			<a class="btn btn-primary btn-lg" id="act_<?php echo $info["id"]; ?>" href="Javascript::void(0)" onclick="activate(<?php echo $info["id"]; ?>, 'websites', 'act_<?php echo $info["id"]; ?>');">Disable Confirmation</a>
			<?php } ?>
			<hr>
			<script>
			$(document).ready(function(){
				$("#edit_website_form").submit(function(e){
					e.preventDefault();
					ajax_post('edit_website_form', 'edit_website_alert', 0, "", false);
				});
			});
			</script>
			<form id="edit_website_form" action="<?php _router("admin_ajax_update", array("id" => $info["id"])); ?>" method="post" >
				<input type="hidden" name="kindofpost" value="website" />
				<div class="form-group">
				  <label class="control-label" >User ID</label>
				  <input class="form-control" value="<?php echo $info["user_id"]; ?>" name="edit_user_id" placeholder="User ID.."  type="number">
				</div>
				<div class="form-group">
				  <label class="control-label" >Website URL</label>
				  <input class="form-control" value="<?php echo htmlentities($info["url"]); ?>" name="edit_website_url" placeholder="Website URL.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Hits Limit(0 = unlimited)</label>
				  <input class="form-control" value="<?php echo $info["max_hits"]; ?>" name="edit_website_max_hits" placeholder="Hits Limit.."  type="number">
				</div>
				<div class="form-group">
				  <label class="control-label" >Hits Limit per hour</label>
				  <input class="form-control" value="<?php echo $info["max_hour_hits"]; ?>" name="edit_website_max_hour_hits" placeholder="Hits Limit per hour.."  type="number">
				</div>
				<div class="form-group">
				  <label class="control-label" >Duration</label>
				  <input class="form-control" value="<?php echo $info["duration"]; ?>" name="edit_website_duration" placeholder="Duration.."  type="number">
				</div>
				<div class="form-group">
				  <label class="control-label" >Source URL</label>
				  <input class="form-control" value="<?php echo $info["source"]; ?>" name="edit_website_source" placeholder="Source URL.."  type="text">
				</div>
                <div class="form-group">
				  <label class="control-label" >User Agent</label>
				  <select class="form-control" name="edit_website_useragent" >
                  <?php Template::options(array(
                              "all" => "Random",
                              "firefox" => "Firefox",
                              "chrome" => "Chrome",
                              "opera" => "Opera",
                              "ie" => "Internet Explorer",
                              "safari" => "Safari",
                              "android" => "Android (phones/tablets)",
                              "iphone" => "Iphone",
                              "ipad" => "Ipad"
                              ), $info["useragent"]); ?>
                  </select>
				</div>
                <div class="form-group">
				  <label class="control-label" >Geo Target</label>
                  <select class="form-control" multiple="multiple" name="edit_website_geotarget[]" >
                  <?php
                    $locations = $info["geolocation"];
                    $exlocation = explode("]", $locations);
                    $new_location = array();
                    if(!empty($exlocation) && is_array($exlocation))
                    {
                        foreach($exlocation as $loc)
                        {
                            $loc = str_replace(array("[", "]"), "", $loc);
                            if(!empty($loc))
                            {
                                $new_location[] = $loc;
                            }
                        }
                    }
                   Template::options(s("geotarget/list"), $new_location);
                  ?>
                  </select>
				</div>
				<div class="form-group">
				  <input class="form-control btn btn-primary" value="Update" type="submit">
				</div>
				<div id="edit_website_alert" ></div>
			</form>
			<?php } else { ?>
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
						  <a href="<?php _router("admin_websites", array("id" => $one["user_id"])); ?>?edit=<?php echo $one["id"]; ?>" type="button" class="btn btn-primary"><i class="fa fa-pencil" ></i> Edit</a>
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
			<?php } ?>
        </div>
		</div>
		</div>
		</div>
	</div>
<?php include("footer.php"); ?>
