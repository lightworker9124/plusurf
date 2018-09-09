<?php

class Exchange_table
{
    
    public static function install()
    {
        return Db::table(
        "exchange",
        array(
        "id" => ":i(20) :n :a",
		"user_id" => ":i(20) :n",
		"lasturl_id" => ":t(900) :n",
        "accepted_time" => ":t(900) :n",
        "last_run" => ":v(200) :n",
		"closed" => ":i(20) :n",
		"status" => ":i(20) :n",
        "created_at" => ":v(200) :n",
        "updated_at" => ":v(200) :n"
        ));
    }
    
    public static function uninstall()
    {
        return Db::table("exchange", "drop");
    }
    
}

?>