<?php include("header.php"); ?>
	<div id="admin-body" >
		<div id="header-title">
			<a href="<?php _router("admin_home"); ?>" data-original-title="Admin Panel" class="tip-bottom"><i class="fa fa-home"></i> Admin Panel</a>
			<a href="<?php _router("admin_extensions"); ?>" data-original-title="Browser Extensions" class="tip-bottom"><i class="fa fa-chrome"></i> Browser Extensions</a>
		</div>
		<div id="admin-content" >
		<div class="row" >
		<div class="col-md-12 main panel panel-default">
		<div class="panel-body" >
			<h1 class="page-header"><i class="fa fa-chrome" ></i> Browser Extensions</h1>
			<a class="btn btn-warning" target="_blank" href="http://addons.plusurf.info">Build Your extensions</a><hr>

			<center><div style="margin:30px 0;width:100%; padding: 10px;color:#007fff;background: #f1f1f1;" > .XPI FILE (firefox)</div></center>

			<form action="<?php _router("admin_extensions"); ?>" method="post" enctype="multipart/form-data" >
			<div class="form-group">
			  <label class="control-label" for="inputDefault">Firefox (.XPI)</label>
			  <input type="file" accept=".xpi" name="firefox" />
			  <input type="hidden" name="firefox_ext" value="Firefox" />
			</div>
			<div class="form-group">
			  <input class="btn btn-primary" value="Upload" type="submit"/> <?php if(is_file("uploads/extensions/TE-extension.xpi")){ echo "<p class='fg-blue' ><i style=\"color:green\" >an extension is already uploaded</i></p>"; }?>
			</div>
			<?php if($_POST["firefox_ext"]) { include("alerts.php"); }  ?>
			</form>

			<center><div style="margin:30px 0;width:100%; padding: 10px;color:#007fff;background: #f1f1f1;" > .XPI FILE (firefox)</div></center>

			<form action="<?php _router("admin_extensions"); ?>" method="post"  >
			<div class="form-group">
			<a href="https://addons.mozilla.org/en-US/developers/addon/submit/distribution" target="_blank" >Add your extension to addons.mozilla.org</a><p> (it's Free)</p>
			  <label class="control-label" for="inputDefault">addon URL   </label>
			  <input class="form-control"  type="text" value="<?php _s("extension/firefox"); ?>" placeholder="https://addons.mozilla.org/en-US/firefox/addon/..." name="addonurl" />

			</div>
			<div class="form-group">
			  <input class="btn btn-primary" value="Update" type="submit"/>
			</div>
			</form>

			<center><div style="margin:30px 0;width:100%; padding: 10px;color:#007fff;background: #f1f1f1;" > .CRX FILE (opera)</div></center>

			<form action="<?php _router("admin_extensions"); ?>" method="post" enctype="multipart/form-data" >
			<div class="form-group">
			  <label class="control-label" for="inputDefault">Opera & Chrome<i>(and all Browsers Based on Google Chrome)</i></label>
			  <input type="file" accept=".crx" name="chrome" />
			  <input type="hidden" name="chrome_ext" value="Chrome" />
			</div>
			<div class="form-group">
			  <input class="btn btn-primary" value="Upload" type="submit"/> <?php if(is_file("uploads/extensions/TE-extension.crx")){ echo "<p class='fg-blue' ><i style=\"color:green\" >an extension is already uploaded</i></p>"; }?>
			</div>
			<?php if($_POST["chrome_ext"]) { include("alerts.php"); }  ?>
			</form>

			<center><div style="margin:30px 0;width:100%; padding: 10px;color:#007fff;background: #f1f1f1;" > .ZIP FILE (chrome)</div></center>

			<form action="<?php _router("admin_extensions"); ?>" method="post"  >
			<div class="form-group">
				 <a href="https://chrome.google.com/webstore/developer/dashboard" target="_blank" >Add your extension to chrome webstore (.ZIP)</a> <p>(A one-time developer registration fee of US $5.00 is required to verify your account and publish items in chrome webstore) <i style="color:red;" >(The 5$ is for Google not for me)</i></p>
			  <label class="control-label" for="inputDefault">Chrome webstore URL   </label>
			  <input class="form-control"  type="text" value="<?php _s("extension/chrome"); ?>" placeholder="https://chrome.google.com/webstore/detail/..." name="chromewebstore" />

			</div>
			<div class="form-group">
			  <input class="btn btn-primary" value="Update" type="submit"/>
			</div>
			</form>


        </div>
		</div>
		</div>
		</div>
	</div>
<?php include("footer.php"); ?>
