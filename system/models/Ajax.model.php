<?php

/*
|---------------------------------------------------------------
| WS FRAMEWORK
|---------------------------------------------------------------
| 
| -> PACKAGE / WS FRAMEWORK
| -> AUTHOR / wesparkle solutions
| -> DATE / 2015-04-01
| -> WEBSITE / http://wesparklesolutions.com
| -> VERSION / 1.0.0
|
|---------------------------------------------------------------
| Copyright (c) 2015 , All rights reserved.
|---------------------------------------------------------------
*/

class Ajax extends BaseModel
{
    
    public static function typeahead($match="")
    {
        header('Content-Type: application/json');
        $array = array("results" => array("arrow", "Hello", "Yeah", "alaska", "alomba", "alo", "aslomp", "Héééy", "Alaska", "alamontayn", "alsss"));
        echo json_encode($array);
    }
	
    public static function rating($match="")
    {
        $id     = Request::post("id");
        $rate   = Request::post("rate");
        $select = Request::post("select");
        if(!empty($id) && !empty($rate) && !empty($select))
        {
            $number_of_stars = strip_tags($rate);
	        $not_rated = 5-$number_of_stars;
	        $returned = "";
	        for($i=0;$i<$number_of_stars;$i++){
                $new_rate = $i+1;
                if($new_rate > 0 && $new_rate <= 5)
                {
                    $returned .= "<li onclick=\"rate(".$new_rate.", ".$id.", '".$select."');\" class=\"rated\"></li>";
                }
	        }
	        for($i=0;$i<$not_rated;$i++){
                $new_rate = $number_of_stars+$i+1;
                if($new_rate > 0 && $new_rate <= 5)
                {
                    $returned .= "<li onclick=\"rate(".$new_rate.", ".$id.", '".$select."');\" ></li>";
                }
	        }
            echo "true|||".$returned."|||".l("thank_you");
        }
        else
        {
            echo "false|||something went wrong Please try again !";
        }

    }
	
}

?>