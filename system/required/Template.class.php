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

class Template
{
	
	public static $on_header = array();
    public static $themes_path = "themes/user/";
	public static $admin_path = "themes/admin/";
    public static $save_opened_file = array();
	public static $set_admin = false;
	
	public static $mixed  = false;
	public static $inside = false;
	
	public static function set_as_admin()
	{
		self::$set_admin = true;
	}
	
    public static function default_template()
    {
        $default_template = s("generale/template");
		$default_admin_template = s("generale/admin_template");
		if(self::$set_admin)
		{
			if(!empty($default_admin_template))
			{
				return $default_admin_template;
			}
			else
			{
				return $GLOBALS["_SETTINGS"]["ADMIN_TEMPLATE"];
			}
		}
        else
		{
			if(!empty($default_template))
			{
				return $default_template;
			}
			else
			{
				return $GLOBALS["_SETTINGS"]["TEMPLATE"];
			}
		}
    }
	
	public static function protocol_in_files()
	{
		$prtcl = $GLOBALS["_SETTINGS"]["PROTOCOL"];
		switch($prtcl)
		{
			case 'http':
				self::$mixed = false;
				self::$inside = true;
			break;
			case 'https':
				self::$mixed = true;
				self::$inside = false;
			break;
			default:
				self::$mixed = false;
				self::$inside = false;
			break;
		}
	}
	
    public static function themes_path()
    {
		if(self::$set_admin)
		{
			return self::$admin_path;
		}
		else
		{
			return self::$themes_path;
		}
        
    }
    
    public static function url()
    {
        return Sys::url().'/'.self::themes_path().self::default_template();
    }
    
	public static function charset($charset="")
	{
		if(!empty($charset)){
			$charset = strip_tags($charset);
			echo "".'<meta charset="'.$charset.'">'."\n";
		} else {
			echo "".'<meta charset="UTF-8">'."\n";
		}
	}
	
	public static function title($title="")
	{
		$title = strip_tags($title);
		echo "".'<title>'.$title.'</title>'."\n";
	}
	
	public static function description($description="")
	{
		$description = strip_tags($description);
		echo "".'<meta name="description" content="'.$description.'">'."\n";
	}
	
	public static function keywords($keywords="")
	{
		$keywords = strip_tags($keywords);
		echo "".'<meta name="keywords" content="'.$keywords.'">'."\n";
	}
	
	public static function og_title($title="")
	{
		$title = strip_tags($title);
		echo "".'<meta property="og:title" content="'.$title.'">'."\n";
	}

	public static function og_image($image="")
	{
		$image = strip_tags($image);
		echo "".'<meta property="og:image" content="'.$image.'">'."\n";
	}
	
	public static function og_site_name($site_name="")
	{
		$site_name = strip_tags($site_name);
		echo "".'<meta property="og:site_name" content="'.$site_name.'">'."\n";
	}
	
	public static function og_description($description="")
	{
		$description = strip_tags($description);
		echo "".'<meta property="og:description" content="'.$description.'">'."\n";
	}
	
	public static function author($author="")
	{
		$author = strip_tags($author);
		echo "".'<meta name="author" content="'.$author.'">'."\n";
	}
	
	public static function favicon($path="")
	{
        if(Request::is_url($path))
        {
		    echo "" . '<link rel="icon" type="image/x-icon" href="'.$path.'" >' . "\n";
        }
        else
        {
            echo "" . '<link rel="icon" type="image/x-icon" href="'.url("", "", false, true).'/'.self::themes_path().self::default_template().$path.'" >' . "\n";
        }
	}
    
	public static function css($csspath="")
	{
		self::protocol_in_files();
		if(is_array($csspath)){
			foreach($csspath as $path){
                if(Request::is_url($path))
                {
                    echo "" . '<link href="'.$path.'" rel="stylesheet" type="text/css"/>' . " \n\t\t";
                }
                else
                {
                    echo "" . '<link href="'.url("", "", self::$mixed, self::$inside).'/'.self::themes_path().self::default_template().$path.'" rel="stylesheet" type="text/css"/>' . " \n\t\t";
                }
			}
		} else {
            if(Request::is_url($csspath))
            {
			    echo "" . '<link href="'.$csspath.'" rel="stylesheet" type="text/css"/>' . "\n";
            }
            else
            {
                echo "" . '<link href="'.url("", "", self::$mixed, self::$inside).'/'.self::themes_path().self::default_template().$csspath.'" rel="stylesheet" type="text/css"/>' . "\n";
            }
		}
	}
	
	public static function js($jspath="")
	{
		self::protocol_in_files();
		if(is_array($jspath)){
			foreach($jspath as $path){
                if(Request::is_url($path))
                {
                    echo "" . '<script src="'.$path.'"  type="text/javascript" ></script>' . " \n\t\t";
                }
                else
                {
                    echo "" . '<script src="'.url("", "", self::$mixed, self::$inside).'/'.self::themes_path().self::default_template().$path.'"  type="text/javascript" ></script>' . " \n\t\t";
                }
			}
		} else {
            if(Request::is_url($jspath))
            {
			    echo "" . '<script src="'.$jspath.'"  type="text/javascript" ></script>' . "\n";
            }
            else
            {
                echo "" . '<script src="'.url("", "", self::$mixed, self::$inside).'/'.self::themes_path().self::default_template().$jspath.'"  type="text/javascript" ></script>' . "\n";
            }
		}
	}
    
	public static function jsconfig()
	{
		self::protocol_in_files();
		if(self::$set_admin)
		{
			$url = router("admin_jsconfig", array("rand" => Encryption::generate()), self::$mixed, self::$inside);
		}
		else
		{
			$url = router("jsconfig", array("rand" => Encryption::generate()), self::$mixed, self::$inside);
		}
		echo "" . '<script src="'.$url.'"  type="text/javascript" ></script>' . " \n\t\t";
	}
	
	public static function style($style="")
	{
		echo "".'<style>'.$style.'</style>'."\n";
	}
	
	public static function script($style="")
	{
		echo "".'<script>'.$style.'</script>'."\n";
	}
    
	public static function bg($bg="", $style="")
	{
		$bg = strip_tags($bg);
		echo "".'<style>body{ background: '.$bg.' !important; '.$style.'}</style>'."\n";
	}
    
	public static function bg_color($bg="", $style="")
	{
		$bg = strip_tags($bg);
		echo "".'<style>body{ background-color: '.$bg.' !important; '.$style.' }</style>'."\n";
	}
    
	public static function bg_image($bg="", $style=false, $newstyle="")
	{
		$bg = strip_tags($bg);
        if(Request::is_url($bg))
        {
            if($style)
            {
                $style = "; background-repeat: repeat";
            }
            else
            {
                $style = "; min-width: 100%; min-height: 120%; width: auto; height: auto; position: absolute; background-repeat: no-repeat";
            }
            echo "".'<style>body{ background-image: url('.$bg.')'.$style.' !important; '.$newstyle.' }</style>'."\n";
        }
        else
        {
            if($style)
            {
                $style = "; background-repeat: repeat";
            }
            else
            {
                $style = "; min-width: 100%; min-height: 120%; width: 100%; height: 120%; position: fixed; background-repeat: no-repeat";
            }
            echo "".'<style>body{ background-image: url('.Sys::url().'/'.self::themes_path().self::default_template().$bg.')'.$style.' !important; '.$newstyle.'  }</style>'."\n";
        }
	}
    
	/// IE 5>=8
	public static function only_ie($version="")
	{
		$versions = array("all", "7", "6", "5", "5.5", "<6", "<7", "<8", ">6", ">7", ">8");
		if(in_array($version, $versions)){
			switch($version){
				case '7': 
				    //Target IE 7 ONLY
		            echo "<!--[if IE 7]> \n";
				break;
				case '6': 
				    //Target IE 6 ONLY
		            echo "<!--[if IE 6]> \n";
				break;
				case '5': 
				    //Target IE 5 ONLY
		            echo "<!--[if IE 5]> \n";
				break;
				case '5.5': 
				    //Target IE 5.5 ONLY
		            echo "<!--[if IE 5.5000]> \n";
				break;
				case '<6': 
				    //Target IE 6 and LOWER
		            echo "<!--[if lte IE 6]> \n";
				break;
				case '<7': 
				    //Target IE 7 and LOWER
		            echo "<!--[if lte IE 7]> \n";
				break;
				case '<8': 
				    //Target IE 8 and LOWER
		            echo "<!--[if lte IE 8]> \n";
				break;
				case '>6': 
				    //Target IE 6 and HIGHER
		            echo "<!--[if gte IE 6]> \n";
				break;
				case '>7': 
				    //Target IE 7 and HIGHER
		            echo "<!--[if gte IE 7]> \n";
				break;
				case '>8': 
				    //Target IE 8 and HIGHER
		            echo "<!--[if gte IE 8]> \n";
				break;
				default:
				    //Target ALL VERSIONS of IE
		            echo "<!--[if IE]> \n";
				break;
			}
		} else {
			echo "<!--[if IE]> \n";
		}
	}
	
	public static function end_ie()
	{
		echo "<![endif]--> \n"; 
	}
	
	public static function comment($text="")
	{
		$text = strip_tags($text);
		$text = str_replace("!", "", $text);
		$text = str_replace("<", "", $text);
		$text = str_replace(">", "", $text);
		echo "<!-- ".$text." --> \n";
	}
    
	public static function options($options=array(), $select="", $ret="")
	{
		if(!empty($options) && is_array($options))
        {
            $option = '';
            foreach($options as $key => $value)
            {
                $option .= '<option value="'.$key.'" >'.$value.'</option>';
            }
        }
		if(!empty($select))
        {
			if(is_array($select))
			{
                foreach($select as $value)
                {
                    $option = str_replace('value="'.$value.'"', ' selected="selected" value="'.$value.'"', $option);
                }
			}
			else
			{
				$option = str_replace('value="'.$select.'"', ' selected="selected" value="'.$select.'"', $option);
			}
        }
		if($ret == "return")
		{
			return $option;
		}
		else
		{
			echo $option. " \n";
		}
	}
	
	
	public static function load($file)
	{
		$file = self::themes_path().self::default_template()."/".$file.".php";
		if(is_file($file)){
			include($file);
		}
	}
	
	public static function view($view)
	{
		$file = self::themes_path().self::default_template()."/".$view.".php";
		if(is_file($file)){
			include($file);
		}
	}
	    
	public static function route($form, $params=array(), $mixed=false, $inside=false)
	{
		return Sys::url("host", "", $mixed, $inside).Router::generate(strip_tags($form), $params);
	}
	
	public static function on_header($value="")
	{
		self::$on_header[] = $value;
	}
	
	public static function put_header()
	{
		if(!empty(self::$on_header))
		{
		    foreach(self::$on_header as $new_value)
		    {
			    echo $new_value;
		    }
			echo " \n";
		}
	}
	
	public static function build_row($nfile="", $info=array())
	{
		$file = self::themes_path().self::default_template()."/builds/".$nfile.".build";
		$anotherfile = self::themes_path().self::default_template()."/builds/".$nfile."";
		if(!empty(self::$save_opened_file[$nfile]))
		{
			$old_content = self::$save_opened_file[$nfile];
		}
		else if(is_file($file))
		{
			$f = fopen($file, "r");
			$old_content = fread($f, filesize($file));
			fclose($f);
		}
		else if(is_file($anotherfile))
		{
			$f = fopen($file, "r");
			$old_content = fread($f, filesize($file));
			fclose($f);
			$file = $anotherfile;
		}
		else
		{
			return "";
		}
		if(!empty($info) && is_array($info))
		{
			self::$save_opened_file[$nfile] = $old_content;
			foreach($info as $old => $new)
			{
				$old_content = str_replace(":".$old.":", $new, $old_content);
			}
			return $old_content;
		}
		else
		{
			return "";
		}
	}
	
}
?>