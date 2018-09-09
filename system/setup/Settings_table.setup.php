<?php

class Settings_table
{
    
    public static function install()
    {
        return Db::table(
        "settings",
        array(
        "id" => ":i(20) :n :a",
        "option_name" => ":v(500) :n",
        "option_value" => "LONGTEXT :n",
        "created_at" => ":v(200) :n",
        "updated_at" => ":v(200) :n"
        ));
    }
    
    public static function uninstall()
    {
        return Db::table("settings", "drop");
    }
    
}

?>