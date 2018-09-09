<?php 

if(defined("alert_error"))
{
	echo '<div class="alert alert-dismissable alert-danger">
			<div type="div" class="close" data-dismiss="alert">×</div>
			'.alert_error.'
		  </div>';
}

if(defined("alert_success"))
{
	echo '<div class="alert alert-dismissable alert-success">
			<div type="div" class="close" data-dismiss="alert">×</div>
			'.alert_success.'
		  </div>';
}

if(defined("alert_info"))
{
	echo '<div class="alert alert-dismissable alert-info">
			<div type="div" class="close" data-dismiss="alert">×</div>
			'.alert_info.'
		  </div>';
}

if(defined("alert_warning"))
{
	echo '<div class="alert alert-dismissable alert-warning">
			<div type="div" class="close" data-dismiss="alert">×</div>
			'.alert_warning.'
		  </div>';
}

?>