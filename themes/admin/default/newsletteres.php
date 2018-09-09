<?php include("header.php"); ?>
	<div id="admin-body" >
		<div id="header-title">
			<a href="<?php _router("admin_home"); ?>" data-original-title="Admin Panel" class="tip-bottom"><i class="fa fa-home"></i> Admin Panel</a>
			<a href="<?php _router("admin_newsletteres"); ?>" data-original-title="Newsletters" class="tip-bottom"><i class="fa fa-newspaper-o"></i> Newsletters</a>
		</div>
		<div id="admin-content" >

		<div class="row" >
		<div class="col-md-12 main panel panel-default">
		<div class="panel-body" >
			<h1 class="page-header"><i class="fa fa-newspaper-o" ></i> Newsletteres</h1>
			<?php if($_GET["settings"]) { ?>
			<script>
			$(document).ready(function(){
				$("#update_newsletter_settings_form").submit(function(e){
					e.preventDefault();
					ajax_post('update_newsletter_settings_form', 'update_newsletter_settings_alert', 0, '', true);
				});
			});
			</script>
            <div class="form-group">
				  <label class="control-label" >Cron Job commands</label>
				  <input onclick="this.select();" class="form-control" value="wget -O - <?php _router("cronjob_newsletteres", array("key" => Encryption::encode("newsletteres"))); ?> >/dev/null 2>&1" />
				  Or
				  <input onclick="this.select();" class="form-control" value="curl --request GET '<?php _router("cronjob_newsletteres", array("key" => Encryption::encode("newsletteres"))); ?>'" />
				  Or manually visit this URL
				  <input onclick="this.select();" class="form-control" value="<?php _router("cronjob_newsletteres", array("key" => Encryption::encode("newsletteres"))); ?>" />
			</div>
            <hr>
			<form id="update_newsletter_settings_form" action="<?php _router("admin_newsletteres"); ?>" method="post" >
				<input type="hidden" name="kindofpost" value="server_settings" />
				<div class="form-group">
				  <label class="control-label" >Email (from)</label>
				  <input class="form-control" value="<?php _s("newsletteres/from"); ?>" name="email" placeholder="Email (from).."  type="email" required>
				</div>
				<div class="form-group">
				  <label class="control-label" >Email (replyto)</label>
				  <input class="form-control" value="<?php _s("newsletteres/replyto"); ?>" name="email_replyto" placeholder="Email (replyto).."  type="email" required>
				</div>
                <div class="form-group">
				  <label class="control-label" >Max Mails per cron</label>
				  <input class="form-control" value="<?php _s("newsletteres/max"); ?>" name="max_per_cron" placeholder="Max Mails per cron.."  type="number" required>
				</div>
				<div class="form-group">
				  <label class="control-label" >Mail type</label>
				  <select class="form-control" name="mail_type" >
				  <?php Template::options(array("mail" => "Mail Function", "smtp" => "SMTP" ), s("newsletteres/type")); ?>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" >SMTP Host</label>
				  <input class="form-control" value="<?php _s("newsletteres/smtp/host"); ?>" name="smtp_host" placeholder="SMTP Host.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >SMTP Port</label>
				  <input class="form-control" value="<?php _s("newsletteres/smtp/port"); ?>" name="smtp_port" placeholder="SMTP Port.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >SMTP Secure</label>
				  <select class="form-control" name="smtp_secure" >
				  <?php Template::options(array("tls" => "TLS", "ssl" => "SSL" ), s("newsletteres/smtp/secure")); ?>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" >SMTP Auth</label>
				  <select class="form-control" name="smtp_auth" >
				  <?php
				  $auth = s("newsletteres/smtp/auth");
				  if($auth == "1"){ $auth = "yes"; } else { $auth = "no"; }
				  Template::options(array("yes" => "Yes", "no" => "No" ), $auth); ?>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" >SMTP Username</label>
				  <input class="form-control" value="<?php _s("newsletteres/smtp/username"); ?>" name="smtp_username" placeholder="SMTP Username.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >SMTP Password</label>
				  <input class="form-control" value="<?php _s("newsletteres/smtp/password"); ?>" name="smtp_password" placeholder="SMTP Password.."  type="text">
				</div>
				<br><input type="submit" value="Update Now !" class="btn btn-success" /><br><br>
			<div  id="update_newsletter_settings_alert" ></div>
			</form>
			<hr>
			<?php } else if($_GET["edit"]) { ?>
			<?php $info = get("info"); ?>
			<a class="btn btn-warning btn-lg" href="<?php _router("admin_newsletteres"); ?>" > << Back</a>
			<?php if($info["status"]=="0") { ?>
			<a class="btn btn-success btn-lg" id="newsletter_<?php echo $info["id"]; ?>" href="Javascript::void(0)" onclick="change_status(<?php echo $info["id"]; ?>, 'newsletteres', 'newsletter_<?php echo $info["id"]; ?>');" >Enable</a>
			<?php } else { ?>
			<a class="btn btn-success btn-lg" id="newsletter_<?php echo $info["id"]; ?>" href="Javascript::void(0)" onclick="change_status(<?php echo $info["id"]; ?>, 'newsletteres', 'newsletter_<?php echo $info["id"]; ?>');" >Disable</a>
			<?php } ?>
			<hr>
			<script>
			$(document).ready(function(){
				$("#update_newsletter_form").submit(function(e){
					e.preventDefault();
					ajax_post('update_newsletter_form', 'update_newsletter_alert', 1, '<?php _router("admin_newsletteres"); ?>?edit=<?php echo$info["id"]; ?>', true);
				});
			});
			</script>
			<form id="update_newsletter_form" action="<?php _router("admin_newsletteres"); ?>?edit=<?php echo$info["id"]; ?>" method="post" >
				<input type="hidden" name="kindofpost" value="update_newsletter" />
				<div class="form-group">
				  <label class="control-label" >Newsletter Name</label>
				  <input class="form-control" value="<?php echo $info["name"]; ?>" name="name" placeholder="Newsletter Name.."  type="text" required>
				</div>
				<div class="form-group">
				  <label class="control-label" >To</label>
				  <select name="to_group" class="form-control" >
				  <?php
				  Template::options(array(
				  "all" => "All Users",
				  "pro" => "All 'PRO' users",
				  "free" => "All 'FREE' users"
				  ), $info["to_group"]);
				  ?>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" >Subject</label>
				  <input class="form-control" value="<?php echo $info["subject"]; ?>" name="subject" placeholder="Subject.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Mail Content <small><i>(text/html)</i></small> - <a href="Javascript::void(0)" onclick="$('#codes').modal('show');" >Short Codes</a></label>
				  <div>
				  			<div id="codes" class="modal fade" role="dialog">
							  <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<div type="button" class="close" data-dismiss="modal">&times;</div>
									<h4 class="modal-title"> <i class="fa fa-code" ></i> user information</h4>
								  </div>
								  <div class="modal-body">

								  <a title="Click to insert" class="btn btn-warning btn-sm" onclick="document.getElementById('Mail_content').value = document.getElementById('Mail_content').value+'[USERNAME]';" href="Javascript::void(0);" >[USERNAME]</a>
								  <a title="Click to insert" class="btn btn-warning btn-sm" onclick="document.getElementById('Mail_content').value = document.getElementById('Mail_content').value+'[EMAIL]';" href="Javascript::void(0);" >[EMAIL]</a>
								  <a title="Click to insert" class="btn btn-warning btn-sm" onclick="document.getElementById('Mail_content').value = document.getElementById('Mail_content').value+'[ACCOUNT_TYPE]';" href="Javascript::void(0);" >[ACCOUNT_TYPE]</a>
								  <a title="Click to insert" class="btn btn-warning btn-sm" onclick="document.getElementById('Mail_content').value = document.getElementById('Mail_content').value+'[POINTS]';" href="Javascript::void(0);" >[POINTS]</a>
								  <br><br>
								  <a title="Click to insert" class="btn btn-warning btn-sm" onclick="document.getElementById('Mail_content').value = document.getElementById('Mail_content').value+'[WEBSITE_SLOTS]';" href="Javascript::void(0);" >[WEBSITE_SLOTS]</a>
								  <a title="Click to insert" class="btn btn-warning btn-sm" onclick="document.getElementById('Mail_content').value = document.getElementById('Mail_content').value+'[SESSION_SLOTS]';" href="Javascript::void(0);" >[SESSION_SLOTS]</a>
								  <a title="Click to insert" class="btn btn-warning btn-sm" onclick="document.getElementById('Mail_content').value = document.getElementById('Mail_content').value+'[TRAFFIC_RATIO]';" href="Javascript::void(0);" >[TRAFFIC_RATIO]</a>

								 </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
								  </div>
								</div>

							  </div>
							</div>
				  <textarea class="form-control" id="Mail_content" style="height: 400px;" name="content" placeholder="Mail content (body).."  type="text"><?php echo $info["content"]; ?></textarea>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label" >Start On <small>(hour, day, month, year)</small></label>
				  <input class="form-control" id="hour" value="<?php echo date("h:i, d, m, Y", $info["starton"]); ?>" name="starton" placeholder="18:30, day, month, year" type="text" />
				  <p>Example: 18:30, 20, 09, <?php echo date("Y"); ?></p>
				</div>
				<div class="form-group">
				  <label class="control-label" ><input name="startover" value="On" type="checkbox" /> Cancel the progress and start Over (<font color="red">!!</font>)</label><br>
				</div>
				<hr>
				<div class="form-group">
				  <input class="form-control btn btn-primary" style="width: 20%;" value="Update" type="submit">
				</div>
				<div  id="update_newsletter_alert" ></div>
			</form>
			<hr>
			<?php } else if($_GET["add"]=="new") { ?>
			<a class="btn btn-warning btn-lg" href="<?php _router("admin_newsletteres"); ?>" > << Back</a>
			<hr>
			<script>
			$(document).ready(function(){
				$("#add_newsletter_form").submit(function(e){
					e.preventDefault();
					ajax_post('add_newsletter_form', 'add_newsletter_alert', 1, '<?php _router("admin_newsletteres"); ?>', true);
				});
			});
			</script>
			<form id="add_newsletter_form" action="<?php _router("admin_newsletteres"); ?>" method="post" >
				<input type="hidden" name="kindofpost" value="add_newsletter" />
				<div class="form-group">
				  <label class="control-label" >Newsletter Name</label>
				  <input class="form-control"  name="name" placeholder="Newsletter Name.."  type="text" required>
				</div>
				<div class="form-group">
				  <label class="control-label" >To</label>
				  <select name="to_group" class="form-control" >
				  <?php
				  Template::options(array(
				  "all" => "All Users",
				  "pro" => "All 'PRO' users",
				  "free" => "All 'FREE' users"
				  ),"all");
				  ?>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" >Subject</label>
				  <input class="form-control" value="" name="subject" placeholder="Subject.."  type="text" required>
				</div>
				<div class="form-group">
				  <label class="control-label" >Mail Content <small><i>(text/html)</i></small> - <a href="Javascript::void(0)" onclick="$('#codes').modal('show');" >Short Codes</a></label>
				  <div>
				  			<div id="codes" class="modal fade" role="dialog">
							  <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<div type="button" class="close" data-dismiss="modal">&times;</div>
									<h4 class="modal-title"> <i class="fa fa-code" ></i> user information</h4>
								  </div>
								  <div class="modal-body">

								  <a title="Click to insert" class="btn btn-warning btn-sm" onclick="document.getElementById('Mail_content').value = document.getElementById('Mail_content').value+'[USERNAME]';" href="Javascript::void(0);" >[USERNAME]</a>
								  <a title="Click to insert" class="btn btn-warning btn-sm" onclick="document.getElementById('Mail_content').value = document.getElementById('Mail_content').value+'[EMAIL]';" href="Javascript::void(0);" >[EMAIL]</a>
								  <a title="Click to insert" class="btn btn-warning btn-sm" onclick="document.getElementById('Mail_content').value = document.getElementById('Mail_content').value+'[ACCOUNT_TYPE]';" href="Javascript::void(0);" >[ACCOUNT_TYPE]</a>
								  <a title="Click to insert" class="btn btn-warning btn-sm" onclick="document.getElementById('Mail_content').value = document.getElementById('Mail_content').value+'[POINTS]';" href="Javascript::void(0);" >[POINTS]</a>
								  <br><br>
								  <a title="Click to insert" class="btn btn-warning btn-sm" onclick="document.getElementById('Mail_content').value = document.getElementById('Mail_content').value+'[WEBSITE_SLOTS]';" href="Javascript::void(0);" >[WEBSITE_SLOTS]</a>
								  <a title="Click to insert" class="btn btn-warning btn-sm" onclick="document.getElementById('Mail_content').value = document.getElementById('Mail_content').value+'[SESSION_SLOTS]';" href="Javascript::void(0);" >[SESSION_SLOTS]</a>
								  <a title="Click to insert" class="btn btn-warning btn-sm" onclick="document.getElementById('Mail_content').value = document.getElementById('Mail_content').value+'[TRAFFIC_RATIO]';" href="Javascript::void(0);" >[TRAFFIC_RATIO]</a>

								 </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
								  </div>
								</div>

							  </div>
							</div>
				  <textarea class="form-control" id="Mail_content" style="height: 400px;" name="content" placeholder="Mail content (body).."  type="text" /> </textarea>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label" >Start On <small>(hour, day, month, year)</small></label><br>
				  <input class="form-control" id="hour" value="<?php echo date("h:i, d, m, Y", time()); ?>" name="starton" placeholder="18:30, day, month, year" type="text" />
				  <p>Example: 18:30, 20, 09, <?php echo date("Y"); ?></p>
				</div>
				<hr>
				<div class="form-group">
				  <input class="form-control btn btn-primary" style="width: 20%;" value="Add" type="submit">
				</div>
				<div  id="add_newsletter_alert" ></div>
			</form>
			<hr>
			<?php } else { ?>
			<a href="<?php _router("admin_newsletteres"); ?>?add=new" class="btn btn-primary" >Add New</a>
			<a href="<?php _router("admin_newsletteres"); ?>?settings=edit" class="btn btn-primary" >Server Settings</a>
            <hr>
			<div class="table-responsive">
			<?php $data = get("newsletteres"); ?>
			<?php if(!empty($data)) { ?>
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>#ID</th>
					  <th>NAME</th>
					  <th>PROGRESS</th>
					  <th>EDIT</th>
					</tr>
				  </thead>
				  <tbody>
					<?php foreach($data as $one) {?>
					<tr id="item_<?php echo $one["id"]; ?>" >
					  <td><?php echo $one["id"]; ?></td>
					  <td><?php echo $one["name"]; ?></td>
					  <td><?php echo $one["progress"]; ?>%
						<div class="progress progress-striped active">
						  <div class="progress-bar" style="width: <?php echo $one["progress"]; ?>%"></div>
						</div></td>
					  <td>
						<div class="btn-group">
						  <a href="<?php _router("admin_newsletteres"); ?>?edit=<?php echo $one["id"]; ?>" type="button" class="btn btn-primary"><i class="fa fa-pencil" ></i> Edit</a>
						  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
						  <ul class="dropdown-menu">
							<li>
							<?php if($one["status"]=="1") { ?>
							<a id="status_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'newsletteres', 'status_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Disable</a>
							<?php } else if($one["status"]=="0") { ?>
							<a id="status_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'newsletteres', 'status_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Enable</a>
							<?php } ?>
							</li>
							<li><a href="<?php _router("admin_newsletteres"); ?>?edit=<?php echo $one["id"]; ?>">Edit</a></li>
							<li><a onclick="del(<?php echo $one["id"]; ?>, 'newsletteres', 'item_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Delete</a></li>
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
