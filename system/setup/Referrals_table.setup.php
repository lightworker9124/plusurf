<?php

class Referrals_table
{
    
    public static function install()
    {
        return Db::table(
        "referrals",
        array(
        "id" => ":i(20) :n :a",
        "user_id" => ":i(20) :n",
        "new_id" => ":i(20) :n",
		"ip" => ":v(200) :n",
        "confirmed" => ":i(20) :n",
		"status" => ":i(20) :n",
        "created_at" => ":v(200) :n",
        "updated_at" => ":v(200) :n"
        ));
    }
    
    public static function uninstall()
    {
        return Db::table("referrals", "drop");
    }
    
}

?>