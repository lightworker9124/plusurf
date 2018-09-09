<?php

class Websites_table
{
    
    public static function install()
    {
        return Db::table(
        "websites",
        array(
        "id" => ":i(20) :n :a",
		"user_id" => ":i(20) :n",
		"user_points" => ":v(40) :n",
        "url" => ":t(900) :n",
        "hits" => ":v(900) :n",
        "max_hits" => ":v(900) :n",
		"max_hour_hits" => ":v(900) :n",
		"last_run" => ":v(900) :n",
		"duration" => ":v(900) :n",
        "source" => ":v(900) :n",
		"enabled" => ":i(20):n",
		"activated" => ":i(20):n",
		"status" => ":i(20) :n",
        "created_at" => ":v(200) :n",
        "updated_at" => ":v(200) :n"
        ));
    }
    
    public static function uninstall()
    {
        return Db::table("websites", "drop");
    }
    
}

?>