<?php include("header.php"); ?>
	<div id="admin-body" >
		<div id="header-title">
			<a href="<?php _router("admin_home"); ?>" data-original-title="Admin Panel" class="tip-bottom"><i class="fa fa-home"></i> Admin Panel</a>
			<a href="<?php _router("admin_search"); ?>" data-original-title="Search" class="tip-bottom"><i class="fa fa-search"></i> Search</a>
		</div>
		<div id="admin-content" >
		<div class="row" >
		<div class="col-md-12 main panel panel-default">
		<div class="panel-body" >
			<h1 class="page-header"><i class="fa fa-search" ></i> Smart Search</h1>
            <center>
            <form action="<?php _router("admin_search"); ?>" method="get" >
            <div class="form-group row">
            <div class="col-lg-7" >
				<input class="form-control" placeholder="Search anything... username,email,id,name..." type="text" value="<?php echo strip_tags(Request::get("q")); ?>" name="q" />
            </div>
            <div class="col-lg-3" >
				<select class="form-control" name="kind" >
                <?php Template::options(array(
                "users" => "Users",
                "websites" => "Websites",
                "payments" => "Payments",
                "plans" => "Plans",
                "newsletteres" => "Newsletteres"
                ), strip_tags(Request::get("kind")));?>
                </select>
            </div>
            <div class="col-lg-2" >
                <input style="width: 100%;" class="btn btn-md btn-primary" type="submit" value="Search"  />
            </div>
			</div>
            </form>
            </center>
            <hr>
            <?php if(!empty($_GET["q"]) && !empty($_GET["kind"])){ ?>
            <blockquote>
              <p>Search results for <b><?php echo strip_tags(Request::get("q")); ?></b></p>
              <small><i><?php echo strip_tags(Request::get("kind")); ?></i></small>
            </blockquote>
            <?php } ?>
            <?php if($_GET["kind"]=="payments") { ?>
			<div class="table-responsive">
			<?php $data = get("payments"); ?>
			<?php if(!empty($data)) { ?>
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>#ID</th>
					  <th>UID</th>
					  <th>KIND</th>
					  <th>AMOUNT</th>
					  <th>DATE</th>
					  <th>EDIT</th>
					</tr>
				  </thead>
				  <tbody>
					<?php foreach($data as $one) {?>
					<tr id="item_<?php echo $one["id"]; ?>" >
					  <td><?php echo $one["id"]; ?></td>
					  <td><?php echo $one["user_id"]; ?></td>
					  <td><?php echo $one["kind"]; ?></td>
					  <td><?php echo $one["amount"]; ?> <?php echo $one["currency"]; ?> <?php if($one["payment_service"]=="paypal") { echo "<i style='color: blue' >Paypal</i>"; } else if($one["payment_service"]=="payza"){ echo "<i style='color: green' >Payza</i>"; } else { echo "<i style='color: black' >".$one["payment_service"]."</i>"; } ?></td>
					  <td><?php if(!empty($one["created_at"])) { echo date("Y M d", $one["created_at"]);  } ?></td>
					  <td>
						<div class="btn-group">
						  <a href="<?php _router("admin_payments"); ?>?edit=<?php echo $one["id"]; ?>" type="button" class="btn btn-primary"><i class="fa fa-pencil" ></i> Edit</a>
						  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
						  <ul class="dropdown-menu">
							<li>
							<?php if($one["status"]=="1") { ?>
							<a id="payments_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'payments', 'payments_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Disable</a>
							<?php } else if($one["status"]=="0") { ?>
							<a id="payments_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'payments', 'payments_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Enable</a>
							<?php } ?>
							</li>
							<li><a href="<?php _router("admin_payments"); ?>?edit=<?php echo $one["id"]; ?>">Edit</a></li>
							<li><a onclick="del(<?php echo $one["id"]; ?>, 'payments', 'item_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Delete</a></li>
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
            <?php } else if($_GET["kind"]=="plans") { ?>
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
							<a id="plans_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'plans', 'plans_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Disable</a>
							<?php } else if($one["status"]=="0") { ?>
							<a id="plans_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'plans', 'plans_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Enable</a>
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
            <?php } else if($_GET["kind"]=="newsletteres") { ?>
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
					  <td><?php echo htmlentities($one["name"]); ?></td>
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
							<a id="newsletteres_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'newsletteres', 'newsletteres_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Disable</a>
							<?php } else if($one["status"]=="0") { ?>
							<a id="newsletteres_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'newsletteres', 'newsletteres_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Enable</a>
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
			<?php } else if($_GET["kind"]=="websites") { ?>
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
							<a id="websites_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'websites', 'websites_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Disable</a>
							<?php } else if($one["status"]=="0") { ?>
							<a id="websites_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'websites', 'websites_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Enable</a>
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
			<?php } else if($_GET["kind"]=="users") { ?>
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
							<a id="users_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'users', 'users_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Disable</a>
							<?php } else if($one["status"]=="0") { ?>
							<a id="users_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'users', 'users_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Enable</a>
							<?php } ?>
							</li>
                            <li>
                            <?php if($one["type"]=="pro") { ?>
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
