<?php

/*
|---------------------------------------------------------------
| PHP FRAMEWORK
|---------------------------------------------------------------
| 
| -> PACKAGE / PHP FRAMEWORK
| -> AUTHOR / wesparkle solutions
| -> DATE / 2015-04-01
| -> CODECANYON / http://wesparklesolutions.com
| -> VERSION / 1.0.0
|
|---------------------------------------------------------------
| Copyright (c) 2015 , All rights reserved.
|---------------------------------------------------------------
*/

class Update extends BaseModel
{
	public static function fix_payments_after_update()
	{
		$payments = Db::query("SELECT * FROM payments");
		if(empty($payments) && is_array($payments))
		{
			foreach($payments as $payment)
			{
				$paypal = $payment["payment_service"];
				$payza  = $payment["payment_info"];
				if($paypal!="paypal" && $paypal!="payza")
				{
					if(!empty($paypal))
					{
						Db::bind("pid", $payment["id"]);
						Db::bind("service", "paypal");
						Db::bind("info", $paypal);
						Db::query("UPDATE payments SET `payment_service` = :service, `payment_info` = :info WHERE id = :pid");
					}
					else if(!empty($payza))
					{
						Db::bind("pid", $payment["id"]);
						Db::bind("service", "payza");
						Db::bind("info", $payza);
						Db::query("UPDATE payments SET `payment_service` = :service, `payment_info` = :info WHERE id = :pid");
					}
				}
			}
		}
	}
}
?>