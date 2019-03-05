<?php
class Seo  {


	function SetMeta()
	{
		//echo $_REQUEST['co'];
		switch($_REQUEST['co']){
			
			case '':
    				echo '<title>Dubazaaro.com | best place to buy &amp; sell items through No 1 Classified in UAE </title>'.PHP_EOL;	
    				echo '<meta name="description" content="Dubazaaro is the first site for ✔ FREE classifieds ads ✔ in Dubai UAE. Buy and sell items, cars, properties, and find or offer jobs in your area. Success!"/>'.PHP_EOL;
					
			break; 			
			
			case 'category':
    				echo '<title>'.$GLOBALS['categoryname'] .' in '.$this->Cityname() .' UAE | dubazaaro.com</title>'.PHP_EOL;	
    				$meta = '<meta name="description" content="'.$GLOBALS['categoryname'].' in '.$this->Cityname() .', UAE on dubazaaro.com, search for ';		
					$i=1;
					foreach($GLOBALS['sibling'] as $CAT){
						if($i!=count($GLOBALS['sibling']))
						{
							$meta.= $CAT->name.',';	
						} else{
							$meta.= $CAT->name.'"';	
							
						}
						
					$i++;
					}
					$meta.= '/>'.PHP_EOL;
					echo $meta;					
			break; 	
			
			
			case 'models':
    				echo '<title>'.$GLOBALS['modelname'] .' in '.$this->Cityname() .' UAE | dubazaaro.com</title>'.PHP_EOL;	
    				$meta = '<meta name="description" content="'.$GLOBALS['modelname'].' in '.$this->Cityname() .', UAE on dubazaaro.com, search for ';		
					$i=1;
					foreach($GLOBALS['sibling'] as $CAT){
						if($i!=count($GLOBALS['sibling']))
						{
							$meta.= $CAT->name.',';	
						} else{
							$meta.= $CAT->name.'"';	
							
						}
						
					$i++;
					}
					$meta.= '/>'.PHP_EOL;
					echo $meta;					
			break; 
			
			
			case 'detail':
    				echo '<title>'.$GLOBALS['ad']->title .' in '.$this->Cityname($GLOBALS['ad']->cityid) .' UAE | dubazaaro.com</title>'.PHP_EOL;	
    				$meta = '<meta name="description" content="'.str_replace("<br>","",$GLOBALS['ad']->description).'"';		
					$meta.= '/>'.PHP_EOL;
					echo $meta;					
			break; 	
			
			
		
			default:
    				echo '<title>Dubazaaro.com | best place to buy &amp; sell your goods through No 1 Classified in UAE</title>'.PHP_EOL;	
    				echo '<meta name="description" content="Dubazaaro is the first site for ✔ FREE classifieds ads ✔ in Dubai UAE. Buy and sell items, cars, properties, and find or offer jobs in your area. Success!"/>'.PHP_EOL;
					
			break;	
		
		}
		 
	
	}
	
	function Cityname($cityid=0)
	{
		
		$ci = new CI_Controller();
		if($cityid){
		 	$sql = $ci->db->query("SELECT `en_title` FROM `city` WHERE serial ='".$cityid."' ");
			
			$row =$sql->row();
			
			return $row->en_title;  
		
		
		} elseif ($ci->session->userdata('cityid') ){
			$sql = $ci->db->query("SELECT `en_title` FROM `city` WHERE serial ='".$ci->session->userdata('cityid') ."' ");
			
			$row =$sql->row();
			
			return $row->en_title;  
		
		}	else {
			return 'Dubai';	
			
		}
				
		
		
	}
	
	

}

?>