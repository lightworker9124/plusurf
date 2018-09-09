<?php

class Admins_table
{
    
    public static function install()
    {
        return Db::table(
        "admins",
        array(
        "id" => ":i(20) :n :a",
        "username" => ":v(50) :n",
        "email" => ":v(120) :n",
        "password" => ":v(200) :n",
        "provider_id" => ":v(400) :n",
        "provider_name" => ":v(400) :n",
        "language" => ":v(40) :n",
        "activation_key" => ":t(900) :n",
		"rest_key" => ":t(900) :n",
		"rest_date" => ":v(200) :n",
        "logkey" => ":t(900) :n",
		"status" => ":i(20) :n",
        "created_at" => ":v(200) :n",
        "updated_at" => ":v(200) :n"
        ));
    }
    
    public static function uninstall()
    {
        return Db::table("admins", "drop");
    }
    
}

?>