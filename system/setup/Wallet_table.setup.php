<?php

class Wallet_table
{
    
    public static function install()
    {
        return Db::table(
        "wallet",
        array(
        "id" => ":i(20) :n :a",
		"user_id" => ":v(200) :n",
		"confirmed_sold" => ":v(600) :n",
		"pending_sold" => ":v(600) :n",
		"withdrawal_sold" => ":v(600) :n",
		"withdrawal_to" => ":v(200) :n",
		"status" => ":i(20) :n",
        "created_at" => ":v(200) :n",
        "updated_at" => ":v(200) :n"
        ));
    }
    
    public static function uninstall()
    {
        return Db::table("wallet", "drop");
    }
    
}

?>