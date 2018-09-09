<?php

class Payments_table
{
    
    public static function install()
    {
        return Db::table(
        "payments",
        array(
        "id" => ":i(20) :n :a",
        "user_id" => ":i(20) :n",
		"plan_id" => ":i(20) :n",
		"kind" => ":v(900) :n",
		"payment_id" => ":v(500) :n",
        "amount" => ":v(200) :n",
		"currency" => ":v(200) :n",
		"ip" => ":v(200) :n",
        "confirmed" => ":i(20) :n",
		"payment_service" => ":v(200) :n",
		"payment_info" => ":v(200) :n",
		"status" => ":i(20) :n",
        "created_at" => ":v(200) :n",
        "updated_at" => ":v(200) :n"
        ));
    }
    
    public static function uninstall()
    {
        return Db::table("payments", "drop");
    }
    
}

?>