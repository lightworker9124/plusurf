<?php 
$currency = s("currency");
if(!empty($currency) && is_array($currency))
{
	echo "<ul style='margin: 0px; padding: 0px;' class='pagination pagination-sm' >";
	echo "<li><a href='".router("payments")."' > <i class='fa fa-arrow-left'></i></a></li>";
	foreach($currency as $cur => $value)
	{
		Db::bind("status", "1");
		Db::bind("cur", $cur);
		$plans = Db::query("SELECT * FROM plans WHERE currency = :cur and status = :status");
		if(!empty($plans) && is_array($plans))
		{
			echo "<li><a href='".router("payments")."?currency=".$cur."' >".$cur."</a></li>";
		}
	}
	echo "</ul>";
}
?>