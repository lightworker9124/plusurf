<?php

class Affiliate_table
{
    
    public static function install()
    {
        return Db::table(
        "affiliate",
        array(
        "id" => ":i(20) :n :a",
		"user_id" => ":v(200) :n",
		"fullname" => ":v(600) :n",
		"adresse" => ":t(900) :n",
		"country" => ":t(900) :n",
		"city" => ":t(900) :n",
		"codepostal" => ":t(900) :n",
		"paypal_email" => ":t(900) :n",
		"payoneer_email" => ":t(900) :n",
		"status" => ":i(20) :n",
        "created_at" => ":v(200) :n",
        "updated_at" => ":v(200) :n"
        ));
    }
    
    public static function uninstall()
    {
        return Db::table("affiliate", "drop");
    }
    
}

?>