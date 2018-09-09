<?php include("header.php"); ?>
	<div id="admin-body" >
		<div id="header-title"> 
			<a href="<?php _router("admin_home"); ?>" data-original-title="Admin Panel" class="tip-bottom"><i class="fa fa-home"></i> Admin Panel</a>
			<a href="<?php _router("admin_withdrawals"); ?>" data-original-title="Withdrawals" class="tip-bottom"><i class="fa fa-bank"></i> Withdrawals</a>
		</div>
		<div id="admin-content" >
		<div class="row" >
		<div class="col-md-12 main panel panel-default">
		<div class="panel-body" >
			<h1 class="page-header"><i class="fa fa-bank" ></i> Withdrawals</h1>
			<?php if($_GET["show"]) { ?>
			<?php $info = get("info"); ?>
			User ID : <strong><?php echo $info["user_id"]; ?><br></strong>
			Full name : <strong><?php echo htmlentities($info["fullname"]); ?><br></strong>
			Adresse : <strong><?php echo htmlentities($info["adresse"]); ?><br></strong>
			Country : <strong><?php echo htmlentities($info["country"]); ?><br></strong>
			City : <strong><?php echo htmlentities($info["city"]); ?><br></strong>
			Code postal : <strong><?php echo htmlentities($info["codepostal"]); ?><br></strong>
			Paypal email : <strong><?php echo htmlentities($info["paypal_email"]); ?><br></strong>
			Payoneer email : <strong><?php echo htmlentities($info["payoneer_email"]); ?><br></strong>
			Created at : <strong><?php echo date("Y M d", $info["created_at"]); ?><br></strong>
			Updated at : <strong><?php echo date("Y M d", $info["updated_at"]); ?><br></strong>
			<hr>
			<a href="<?php _router("admin_withdrawals"); ?>" class="btn btn-primary"  ><i class="fa fa-arrow-left"></i> back </a>
			<a href="<?php _router("admin_withdrawals"); ?>?done=<?php echo $info["user_id"]; ?>" class="btn btn-danger"  ><i class="fa fa-close"></i> Money sent </a>
			<?php } else { ?>
			<div class="table-responsive">
			<?php $data = get("withdrawals"); ?>
			<?php if(!empty($data)) { ?>
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>#ID</th>
					  <th>UID</th>
					  <th>AMOUNT</th>
					  <th>TO</th>
					  <th>DATE</th>
					  <th>SHOW</th>
					  <th>DEL</th>
					</tr>
				  </thead>
				  <tbody>
					<?php foreach($data as $one) {?>
					<tr id="item_<?php echo $one["id"]; ?>" >
					  <td><?php echo $one["id"]; ?></td>
					  <td><?php echo $one["user_id"]; ?></td>
					  <td><?php echo $one["withdrawal_sold"]; ?> USD </td>
					  <td><?php echo $one["withdrawal_to"]; ?></td>
					  <td><?php if(!empty($one["created_at"])) { echo date("Y M d", $one["created_at"]);  } ?></td>
					  <td><a href="<?php _router("admin_withdrawals"); ?>?show=<?php echo $one["user_id"]; ?>" class="btn btn-primary"><i class="fa fa-eye" ></i> Affiliate info</a></td>
					  <td><a href="<?php _router("admin_withdrawals"); ?>?done=<?php echo $one["user_id"]; ?>" class="btn btn-danger"  ><i class="fa fa-close"></i> Money sent </a></td>
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