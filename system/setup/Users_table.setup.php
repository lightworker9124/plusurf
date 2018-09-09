<?php

class Users_table
{
    
    public static function install()
    {
        return Db::table(
        "users",
        array(
        "id" => ":i(20) :n :a",
        "username" => ":v(50) :n",
        "email" => ":v(120) :n",
        "password" => ":v(200) :n",
        "provider_id" => ":v(400) :n",
        "provider_name" => ":v(400) :n",
        "language" => ":v(40) :n",
		"website_slots" => ":v(200) :n",
		"session_slots" => ":v(200) :n",
		"traffic_ratio" => ":v(200) :n",
		"points" => ":t(900) :n",
		"currency" => ":v(200) :n",
        "activation_key" => ":t(900) :n",
		"type" => ":t(900) :n",
		"pro_exp" => ":v(200) :n",
		"rest_key" => ":t(900) :n",
		"rest_date" => ":v(200) :n",
        "logkey" => "LONGTEXT :n",
		"status" => ":i(20) :n",
        "created_at" => ":v(200) :n",
        "updated_at" => ":v(200) :n"
        ));
    }
    
    public static function uninstall()
    {
        return Db::table("users", "drop");
    }
    
}

?>