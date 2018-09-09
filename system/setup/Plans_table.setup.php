<?php

class Plans_table
{
    
    public static function install()
    {
        return Db::table(
        "plans",
        array(
        "id" => ":i(20) :n :a",
		"name" => ":v(900) :n",
        "type" => ":t(900) :n",/* upgrade, websites , sessions, traffic */
        "website_slots" => ":v(900) :n",
		"session_slots" => ":v(900) :n",
		"traffic_ratio" => ":v(900) :n",/* 100% or less */
        "price" => ":v(900) :n",
		"currency" => ":v(900) :n",
		"points" => ":v(900) :n",
		"status" => ":i(20) :n",
        "created_at" => ":v(200) :n",
        "updated_at" => ":v(200) :n"
        ));
    }
    
    public static function uninstall()
    {
        return Db::table("plans", "drop");
    }
    
}

?>