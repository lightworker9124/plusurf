<?php

class Hits_table
{
    
    public static function install()
    {
        return Db::table(
        "hits",
        array(
        "id" => ":i(20) :n :a",
        "website_id" => ":i(20) :n",
		"user_id" => ":i(20) :n",
		"point" => ":v(200) :n",
        "ip" => ":v(200) :n",
		"browser" => ":v(600) :n",
		"os" => ":v(600) :n",
        "created_at" => ":v(200) :n",
        "updated_at" => ":v(200) :n"
        ));
    }
    
    public static function uninstall()
    {
        return Db::table("hits", "drop");
    }
    
}

?>