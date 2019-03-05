<?php if(!defined("BASEPATH")){ exit("No direct script access allowed"); }

class Paging{
	var $table;
	var $strquery;
	var $link;
	
	
	function  pagingfortable($table,$perpage,$frompage=1)
	{
		
		$str = "select * from ".$table;
		
		$query = mysql_query($str) or die("Reson ".mysql_error());
		
		$noofrows = mysql_num_rows($query);
				
		$str = $str ." limit ".$frompage.",".$perpage ;
				
		$link = ceil($noofrows/$perpage);
		
		
		$uniformurl='http://'.	$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];
		
		$url ='';
		$lasturl='';
		
		
		$getpage=$frompage; 
		
		if($frompage==0)
		{
			$frompage=1;
			
		}	
		
		
		if($frompage-$perpage <= 0)
		{
				$frompage=1;			
		}
		/*Important Else*/
		else
		{
			$i = $frompage - 1;
			$url .='<a  href="'.$uniformurl.'">First</a>';
			$url .='<a  href="'.$uniformurl.'?page='.$i.'"><</a>';			
			$frompage = $frompage - (floor($perpage/2)) ;  
	
			
		}
		
		if($frompage+$perpage <= $link)
		{
				$link=	$frompage +  $perpage;
				$i=$getpage + 1;
				$lasturl ='<a  href="'.$uniformurl.'?page='.$i.'">></a>';
				$lasturl .='<a  href="'.$uniformurl.'?page='.ceil($noofrows/$perpage).'">Last</a>';				
		}		
		
		
	    for($i=$frompage;$i<$link;$i++)
		{
			if($getpage==$i)
			{
				$url .='<a class="active"  href="'.$uniformurl.'?page='.$i.'">'.$i.'</a>';	
				
			}
			else
			{
			$url .='<a  href="'.$uniformurl.'?page='.$i.'">'.$i.'</a>';	
			}
		}
		
		

		
		
		
		return  $url.$lasturl;
	
	
	}
	
	
	
	function  pagingforquery($str,$perpage,$frompage=1,$urlname,$param)
	{
		
		$query = mysql_query($str) or die("Reson ".mysql_error());
		
		$noofrows = mysql_num_rows($query);
				
		$str = $str ." limit ".$frompage.",".$perpage ;
				
		$link = ceil($noofrows/$perpage);
		
		if(is_array($param))
		{
			$qs = "?";
			foreach($param as $key => $val):
					$qs .= '&'.$key.'='.$val[0];
			endforeach;
		} else {
			$qs="&";
		}
		
		if($_SERVER['SERVER_NAME'] == 'localhost'){
			$server= 'http://localhost/dubazaaro/';	
		} else {
			$server= 'http://'.$_SERVER['SERVER_NAME'];	
		}
		
		$uniformurl=$server.'/'.$urlname.$qs;
		$url ='';
		$lasturl='';
			
		if($frompage==0)
		{
			$frompage=1;
			
		}	
			$getpage=$frompage; 
		
		if($frompage-$perpage <= 0)
		{
				$frompage=1;			
		}
		/*Important Else*/
		else
		{
			$i = $frompage - 1;
			$url .='<a  class="active" href="'.$uniformurl.'">First</a>';
			$url .='<a class="active"  href="'.$uniformurl.'page='.$i.'"><</a>';			
			$frompage = $frompage - (floor($perpage/2)) ;  
	
			
		}
		
		if($frompage+$perpage <= $link)
		{
				$link=	$frompage +  $perpage;
				$i=$getpage + 1;
				$lasturl ='<a class="active"  href="'.$uniformurl.'page='.$i.'">></a>';
				$lasturl .='<a class="active"  href="'.$uniformurl.'/'.ceil($noofrows/$perpage).'">Last</a>';				
		}		
		
		
	    for($i=$frompage;$i<=$link;$i++)
		{
			if($getpage==$i)
			{
				$url.= ' <a class="active"  href="'.$uniformurl.'page='.$i.'">'.$i.'</a>';	
				
			}
			else
			{
				$url.= ' <a   href="'.$uniformurl.'page='.$i.'">'.$i.'</a>';	
			}
		}
		
		
		return  $url.$lasturl;
	
	
	}


	
	
}
