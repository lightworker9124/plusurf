<?php

class Services_table
{
    
    public static function install()
    {
        return Db::table(
        "services",
        array(
        "id" => ":i(20) :n :a",
		"name" => ":v(200) :n",
		"description" => ":t(800) :n",
		"url" => ":t(800) :n",
		"type" => ":v(200) :n",
		"status" => ":i(20) :n",
        "created_at" => ":v(200) :n",
        "updated_at" => ":v(200) :n"
        ));
    }
    
    public static function uninstall()
    {
        return Db::table("services", "drop");
    }
    
}

?>