<?php

/*
|---------------------------------------------------------------
| PHP FRAMEWORK
|---------------------------------------------------------------
| 
| -> PACKAGE / PHP FRAMEWORK
| -> AUTHOR / wesparkle solutions
| -> DATE / 2015-04-01
| -> CODECANYON / http://wesparklesolutions.com
| -> VERSION / 1.0.0
|
|---------------------------------------------------------------
| Copyright (c) 2015 , All rights reserved.
|---------------------------------------------------------------
*/

class Pagination extends BaseModel
{

    private static function pages($total_pages, $adjacents, $targetpage, $limit, $page, $start, $scroll, $met)
	{
	
		/* Setup page vars for display. */
 
        if ($page == 0) $page = 1;                    //if no page var is given, default to 1.
        $prev = $page - 1;                            //previous page is page - 1
        $next = $page + 1;                            //next page is page + 1
        $lastpage = ceil($total_pages/$limit);        //lastpage is = total pages / items per page, rounded up.
        $lpm1 = $lastpage - 1;     
 
		/*
		Now we apply our rules and draw the pagination object.
		We're actually saving the code to a variable in case we want to draw it more than once.
		*/
 
        $pagination = "";
        if($lastpage > 1)
        {
			$pagination .= "";
			
			//previous button
			
			if ($page > 1)
			{
				$pagination.= "<li><a class='' href=\"$targetpage".$met."".$prev."".$scroll."\"> « </a></li>";
			}
			else
			{
				$pagination.= "<li><a class='' class=\"disabled\" href=\"#\" > « </a></li>";
			}
				

			//pages
			
			if ($lastpage < 7 + ($adjacents * 2))    //not enough pages to bother breaking it up
			{
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
					{
						$pagination.= "<li><a class=\"active\" href=\"#\" >$counter</a></li>";
					}
					else
					{
						$pagination.= "<li><a  href=\"$targetpage".$met."$counter".$scroll."\">$counter</a></li>";
					}
				}
			}
			elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
			{
			
			//close to beginning; only hide later pages
			
				if($page < 1 + ($adjacents * 2))
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
						{
							$pagination.= "<li><a class=\"active\" href=\"#\" >$counter</a></li>";
						}
						else
						{
							$pagination.= "<li><a  href=\"$targetpage".$met."$counter".$scroll."\">$counter</a></li>";
						}
					}
					$pagination.= "<li><a  href=\"#\">...</a></li>";
					$pagination.= "<li><a  href=\"$targetpage".$met."$lpm1".$scroll."\">$lpm1</a></li>";
					$pagination.= "<li><a  href=\"$targetpage".$met."$lastpage".$scroll."\">$lastpage</a></li>";
				}
			
				//in middle; hide some front and some back
			
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
					$pagination.= "<li><a  href=\"$targetpage".$met."1".$scroll."\">1</a></li>";
					$pagination.= "<li><a  href=\"$targetpage".$met."2".$scroll."\">2</a></li>";
					$pagination.= "<li><a  href=\"#\">...</a></li>";
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
						{
							$pagination.= "<li><a  class=\"active\" href=\"#\" >$counter</a></li>";
						}
						else
						{
							$pagination.= "<li><a  href=\"$targetpage".$met."$counter".$scroll."\">$counter</a></li>";
						}
					}
					$pagination.= "<li><a  class='' href=\"#\">...</a></li>";
					$pagination.= "<li><a  href=\"$targetpage".$met."$lpm1".$scroll."\">$lpm1</a></li>";
					$pagination.= "<li><a  href=\"$targetpage".$met."$lastpage".$scroll."\">$lastpage</a></li>";
				}
			
				//close to end; only hide early pages
			
				else
				{
					$pagination.= "<li><a  href=\"$targetpage".$met."1".$scroll."\">1</a></li>";
					$pagination.= "<li><a  href=\"$targetpage".$met."2".$scroll."\">2</a></li>";
					$pagination.= "<li><a  href=\"#\">...</a></li>";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
						{
							$pagination.= "<li><a class=\"active\"  href=\"#\" >$counter</a></li>";
						}
						else
						{
							$pagination.= "<li><a  href=\"$targetpage".$met."$counter".$scroll."\">$counter</a></li>";
						}
					}
				}
			}
			
			//next button
			
			if ($page < $counter - 1)
			{
				$pagination.= "<li><a href=\"$targetpage".$met."$next".$scroll."\"> » </a></li>";
			}
			else
			{
				$pagination.= "<li><a class=\"disabled\" href=\"#\">  » </a></li>";
				$pagination.= "";
			} 
        }
		return $pagination;
    }

	private static function make($total, $target, $numberpage, $limit = 30, $adjacents = 2, $scroll="", $tags="?p=")
	{
        $total_pages = $total;
        // How many adjacent pages should be shown on each side?
        $adjacents = $adjacents;	
		//* Setup vars for query. */

        //your file name  (the name of the current file)
        $targetpage = $target;
		 //how many items to show per page
        $limit = $limit;
        $page = $numberpage;
        if($page)
		    //first item to display on this page
            $start = ($page - 1) * $limit;
        else
            $start = 0;     
		    $pag = self::pages($total_pages, $adjacents, $targetpage, $limit, $page, $start, $scroll, $tags);
		    $res_fetch = array($start, $limit, $pag, $total_pages);
            return $res_fetch;
	}
	
	public static function build($router="", $table, $perpage=30, $adjacents=2, $scroll="", $getparams="?p=")
	{
        if(is_array($table))
        {
            $count_query = $table["query"];
            $binds = $table["binds"];
        }
        else
        {
            $count_query = $table;
            $binds = array();
        }
		$current_page = preg_replace("/[^0-9]/", "", Request::get("p"));
		$target = $router;
		$total  = Getdata::howmany($count_query, $binds);
		$make   = self::make($total, $target, $current_page, $perpage, $adjacents, $scroll, $getparams);
		return $make;/* [0] START , [1] LIMIT , [2] PGINATION , [3] TOTAL */
	}
	
}
?>