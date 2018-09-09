<?php

class Newsletteres_table
{
    
    public static function install()
    {
        return Db::table(
        "newsletteres",
        array(
        "id" => ":i(20) :n :a",
		"status" => ":i(20) :n",
		"name" => ":v(200) :n",
        "to_group" => ":v(200) :n",
        "subject" => ":t(900) :n",
		"content" => "LONGTEXT :n",
		"starton" => ":v(200) :n",
		"progress" => ":v(200) :n",
		"offset" => ":v(200) :n",
        "created_at" => ":v(200) :n",
        "updated_at" => ":v(200) :n"
        ));
    }
    
    public static function uninstall()
    {
        return Db::table("newsletteres", "drop");
    }
    
}

?>