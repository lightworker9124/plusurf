<?php include("header.php"); ?>
	<div id="admin-body" >
		<div id="header-title"> 
			<a href="<?php _router("admin_home"); ?>" data-original-title="Admin Panel" class="tip-bottom"><i class="fa fa-home"></i> Admin Panel</a>
			<a href="<?php _router("admin_payments"); ?>" data-original-title="Payments" class="tip-bottom"><i class="fa fa-shopping-cart"></i> Payments</a>
		</div>
		<div id="admin-content" >
		<div class="row" >
		<div class="col-md-12 main panel panel-default">
		<div class="panel-body" >
			<h1 class="page-header"><i class="fa fa-shopping-cart" ></i> Payments</h1>
			<?php if($_GET["edit"]) { ?>
			<?php $info = get("info"); ?>
			<a class="btn btn-warning btn-lg" href="<?php _router("admin_payments"); ?>" > << Back</a>
			<?php if($info["status"]=="0") { ?>
			<a class="btn btn-success btn-lg" id="user_<?php echo $info["id"]; ?>" href="Javascript::void(0)" onclick="change_status(<?php echo $info["id"]; ?>, 'payments', 'user_<?php echo $info["id"]; ?>');" >Enable</a>
			<?php } else { ?>
			<a class="btn btn-success btn-lg" id="user_<?php echo $info["id"]; ?>" href="Javascript::void(0)" onclick="change_status(<?php echo $info["id"]; ?>, 'payments', 'user_<?php echo $info["id"]; ?>');" >Disable</a>
			<?php } ?>
			<?php if($info["confirmed"]=="1") { ?>
			<a class="btn btn-primary btn-lg" id="act_<?php echo $info["id"]; ?>" href="Javascript::void(0)" onclick="activate(<?php echo $info["id"]; ?>, 'payments', 'act_<?php echo $info["id"]; ?>');" >Confirm</a>
			<?php } else { ?>
			<a href="Javascript::void(0);" class="btn btn-primary btn-lg" >Confirmed</a>
			<?php } ?>
			<hr>
			<script>
			$(document).ready(function(){
				$("#edit_payment_form").submit(function(e){
					e.preventDefault();
					ajax_post('edit_payment_form', 'edit_payment_alert', 0, "", false);
				});
			});
			</script>
			<form id="edit_payment_form" action="<?php _router("admin_ajax_update", array("id" => $info["id"])); ?>" method="post" >
				<input type="hidden" name="kindofpost" value="payment" />
				<div class="form-group">
				  <label class="control-label" >User ID</label>
				  <input class="form-control" value="<?php echo $info["user_id"]; ?>" name="edit_payment_user_id" placeholder="User ID.."  type="number">
				</div>
				<div class="form-group">
				  <label class="control-label" >Plan ID</label>
				  <input class="form-control" value="<?php echo $info["plan_id"]; ?>" name="edit_payment_plan_id" placeholder="Plan ID.."  type="number">
				</div>
				<div class="form-group">
				  <label class="control-label" >Payment ID</label>
				  <input class="form-control" value="<?php echo $info["payment_id"]; ?>" name="edit_payment_id" placeholder="Payment ID.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Kind</label>
				  <input class="form-control" value="<?php echo $info["kind"]; ?>" name="edit_payment_kind" placeholder="Kind.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Amount</label>
				  <input class="form-control" value="<?php echo $info["amount"]; ?>" name="edit_payment_amount" placeholder="Amount.."  type="number">
				</div>
				<div class="form-group">
				  <label class="control-label" >Currency</label>
				  <input class="form-control" value="<?php echo $info["currency"]; ?>" name="edit_payment_currency" placeholder="Currency.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Payment service</label>
				  <input class="form-control" value="<?php echo $info["payment_service"]; ?>" name="edit_payment_service" placeholder="Service.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Payment info</label>
				  <input class="form-control" value="<?php echo $info["payment_info"]; ?>" name="edit_payment_info" placeholder="Info.."  type="text">
				</div>
				<div class="form-group">
				  <input class="form-control btn btn-primary" value="Update" type="submit">
				</div>
				<div id="edit_payment_alert" ></div>
			</form>
			<?php } else { ?>
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
							<a id="status_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'payments', 'status_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Disable</a>
							<?php } else if($one["status"]=="0") { ?>
							<a id="status_<?php echo $one["id"]; ?>" onclick="change_status(<?php echo $one["id"]; ?>, 'payments', 'status_<?php echo $one["id"]; ?>');" href="javascript::void(0)">Enable</a>
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
			<?php } ?>
        </div>
		</div>
		</div>
		</div>
	</div>
<?php include("footer.php"); ?>