<?php include("header.php"); ?>
<?php 
$currencies = get("currencies");
$convert    = get("usd_convert");
?>
	<div id="admin-body" >
		<div id="header-title"> 
			<a href="<?php _router("admin_home"); ?>" data-original-title="Admin Panel" class="tip-bottom"><i class="fa fa-home"></i> Admin Panel</a>
			<a href="<?php _router("admin_payments"); ?>" data-original-title="Payments" class="tip-bottom"><i class="fa fa-shopping-cart"></i> Payments</a>
			<a href="<?php _router("admin_currencies"); ?>" data-original-title="Currencies" class="tip-bottom"><i class="fa fa-money"></i> Currencies</a>
		</div>
		<div id="admin-content" >
		<div class="row" >
		<div class="col-md-12 main panel panel-default">
		<div class="panel-body" >
			<h1 class="page-header"><i class="fa fa-money" ></i> Currencies</h1>
			<div id="currency_<?php echo $code; ?>" class="row" >
			<form action="<?php _router("admin_currencies"); ?>?kind=add" method="post" >
				<div class="form-group col-md-2">
				  <input class="form-control" value="" name="currency_code"  placeholder="Currency code" type="text">
				</div>
				<div class="form-group col-md-3">
				  <input class="form-control" value="" name="currency_name"  placeholder="Currency name" type="text">
				</div>
				<div class="form-group col-md-2">
				  <input class="form-control" value="" name="currency_value"  placeholder="1 USD convert" type="text">
				</div>
				<div class="form-group col-md-5">
				  <a href="http://www.xe.com" target="_blank" class="btn btn-info" >XE <i class="fa fa-share" ></i></a>
				  <input type="submit" class="btn btn-success" value="Add +" />
				</div>
			</form>
			</div>
			<hr>
			<?php 
			if(!empty($currencies) && is_array($currencies)) 
			{
				foreach($currencies as $code => $name)
				{
			?>
			<div id="currency_<?php echo $code; ?>" class="row" >
				<div class="form-group col-md-2">
				  <input class="form-control" value="<?php echo $code; ?>" name="code[]" id="currency_<?php echo $code; ?>_code" disabled="disabled" placeholder="Currency code" type="text">
				</div>
				<div class="form-group col-md-3">
				  <input class="form-control" value="<?php echo $name; ?>" name="name[]" id="currency_<?php echo $code; ?>_name" placeholder="Currency name" type="text">
				</div>
				<div class="form-group col-md-2">
				  <input class="form-control" value="<?php echo $convert[$code]; ?>" name="value[]" id="currency_<?php echo $code; ?>_value" placeholder="1 USD convert" type="text">
				</div>
				<div class="form-group col-md-5">
				  <a href="http://www.xe.com/currencyconverter/convert/?Amount=1&From=USD&To=<?php echo $code; ?>" target="_blank" class="btn btn-info" >Check (XE.COM) <i class="fa fa-share" ></i></a>
				  <a href="Javascript::void(0)" class="btn btn-primary" onclick="currency_update('<?php echo $code; ?>', '<?php _router("admin_currencies"); ?>?kind=update');" >Update <i class="fa fa-check" ></i></a> 
				  <a href="Javascript::void(0)" class="btn btn-default" onclick="currency_delete('<?php echo $code; ?>', '<?php _router("admin_currencies"); ?>?kind=remove');" > remove <i class="fa fa-close" ></i></a> 
				</div>
			</div>
			<?php
				}
			}
			else
			{
				echo "Sorry, Nothing Found ! ";
			}
			?>
        </div>
		</div>
		</div>
		</div>
	</div>
<?php include("footer.php"); ?>