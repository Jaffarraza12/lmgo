<?php
class ProductView {

protected $ci;	
	
	public function __construct() {
		
        $this->ci  = new CI_Controller();
		$this->ci->lang->load("common/home",$this->ci->session->userdata("language"));
		
    } 
	 


function ShowGrid($pro)
	{
			
				$html = 	'<li>';
				
				if($pro->image) {
					
					if($pro->status)
					{
					
					$html .= '<div class="img"><a href="'.base_url().'ad/'.$pro->advertiseid.'/'.strtolower(str_replace(array(' '),array('-'),$pro->title)).'"><img src="'.base_url().$pro->image.'" width="auto" height="154" alt="'.$pro->title.'" border="0" /></a></div> ' ;
					} else { 
					$html .= '<div class="img"><a href="'.base_url().'ad/'.$pro->advertiseid.'/'.strtolower(str_replace(array(' '),array('-'),$pro->title)).'"><img src="'.base_url().'assets/images/waitingapproval.png" width="auto" height="auto" alt="'.$pro->title.'" border="0"/></a></div> ' ;
					}
					
				} else {
				$html .= '<div class="img"><a href="'.base_url().'ad/'.$pro->advertiseid.'/'.strtolower(str_replace(array(' '),array('-'),$pro->title)).'"><img src="'.base_url().'assets/images/tmpimg.png" width="auto" height="auto" alt="'.$pro->title.'" border="0"/></a></div> ' ;
				}
				$afterprice =  (strlen($pro->price) > 7) ? '..' : '';
				$html .=    '<div class="name">'.substr($pro->title , 0 , 60).'...'.' </div>	
                            <div class="date">'.date("d M Y",$pro->sts) .'</div>
                          	<div class="desc">'.substr($pro->title , 0 , 60).'...'.'</div>
                            <div class="price">'.$pro->price.'</div>
                            <div id="readmore"><a href="'.base_url().'ad/'.$pro->advertiseid.'/'.strtolower(str_replace(array(' '),array('-'),$pro->title)).'">'.$this->ci->lang->line('text_read_more').'</a></div>
                            <div class="location"><icon id="locator"></icon><span>Located: '.$pro->location.'</span></div>
                            <div id="widgetaction">
                            	<icon id="iconwishlist"></icon>
                                <icon id="iconspamer"></icon>
                                
                            </div>
                         </li>	'	;
						 
						 
						 
			return $html;
		
	}
	

function ShowToDist($pro)
	{
			$html = 	'<li>';
				
				if($pro->image) {
                
					if($pro->status) { 
						$html .= '<div class="img"><a href="'.base_url().'ad/'.$pro->advertiseid.'/'.strtolower(str_replace(array(' '),array('-'),$pro->title)).'"><img src="'.base_url().$pro->image.'" width="auto" height="154" alt="'.$pro->title.'" border="0"/></a></div> ' ;
					} else {
						$html .= '<div class="img"><a href="'.base_url().'ad/'.$pro->advertiseid.'/'.strtolower(str_replace(array(' '),array('-'),$pro->title)).'"><img src="'.base_url().'assets/images/waitingapproval.png" width="auto" height="auto" alt="'.$pro->title.'" border="0"/></a></div> ' ;
						
					} 
				} else {
				$html .= '<div class="img"><a href="'.base_url().'ad/'.$pro->advertiseid.'/'.strtolower(str_replace(array(' '),array('-'),$pro->title)).'"><img src="'.base_url().'assets/images/tmpimg.png" width="auto" height="auto" alt="'.$pro->title.'" border="0"/></a></div> ' ;
				}
				$afterprice =  (strlen($pro->price) > 7) ? '..' : '';
                $html .= 	'<div class="name">'.substr(html_entity_decode($pro->title), 0 , 60).'...'.'  </div>	
                            <div class="date">'.date("d M Y",$pro->sts) .'</div>
                          	<div class="desc">'.substr(html_entity_decode($pro->title), 0 , 60).'...'.'</div>
                             <div class="price">'.$pro->price .'</div>
                            <div id="readmore"><a href="'.base_url().'ad/'.$pro->advertiseid.'/'.strtolower(str_replace(array(' '),array('-'),$pro->title)).'">'.$this->ci->lang->line('text_read_more').'</a></div>
                        
                            <div id="widgetaction">
                            	<icon id="iconwishlist"></icon>
                                <icon id="iconspamer"></icon>
                            </div>
                            <div class="distance"><icon id="locator"></icon> <span>Located:</span> <span id="km">10km</span></div> 
                        
                        </li>'	;
						 
			return $html;
		
	}
function ShowToJob($pro)
	{
			$html = 	'<ol>
							<div class="dottedborder"></div>
                        	<div class="name">'.$pro->title.' </div>	
                          	<div class="desc">'.substr(html_entity_decode($pro->description) , 0 , 60).'...'.'</div>
                            <div class="date">'.date("d M Y",$pro->sts) .'</div>
                          	<div id="readmore"><a href="'.base_url().'ad/'.$pro->advertiseid.'/'.strtolower(str_replace(array(' '),array('-'),$pro->title)).'">'.$this->ci->lang->line('text_detail').'</a></div>
                            <div class="location"><icon id="locator"></icon><span>Located: '.$pro->location.'</span></div>
                            <div id="widgetaction">
                            	<icon id="iconwishlist"></icon>
                                <icon id="iconspamer"></icon>
                                
                            </div>
                         </ol>';
						 
			return $html;
		
	}	
	
	function ShowToDirectory($pro)
		{
				$html = 	'<ol class="dir">
								<div class="bigdottedborder"></div>';
				if($pro->image) {
					if($pro->status){
						$html .= '<div class="img"><a href="'.base_url().'ad/'.$pro->advertiseid.'/'.strtolower(str_replace(array(' ','%'),array('-',''),$pro->title)).'"><img src="'.base_url().$pro->image.'" width="auto" height="auto" alt="'.$pro->title.'" border="0"/></a></div> ' ;
					} else {
						$html .= '<div class="img"><a href="'.base_url().'ad/'.$pro->advertiseid.'/'.strtolower(str_replace(array(' ','%'),array('-',''),$pro->title)).'"><img src="'.base_url().'assets/images/waitingapproval-110x95.png" width="auto" height="auto" alt="'.$pro->title.'" border="0"/></a></div> ' ;
					}
				
				} else {
				$html .= '<div class="img"><a href="'.base_url().'ad/'.$pro->advertiseid.'/'.strtolower(str_replace(array(' ','%'),array('-',''),$pro->title)).'"><img src="'.base_url().'assets/images/tmpimg.png" width="auto" height="95" alt="'.$pro->title.'" border="0"/></a></div> ' ;
				}
								
				$html .= '      <div class="name">'.$pro->title.' </div>	
								<div class="desc">'.substr(html_entity_decode($pro->description) , 0 , 30).'...'.'</div>
								<div class="date">'.$pro->contact .'</div>
								<div id="readmore"><a href="'.base_url().'ad/'.$pro->advertiseid.'/'.strtolower(str_replace(array(' ','%'),array('-',''),$pro->title)).'">'.$this->ci->lang->line('text_read_more').'</a></div>
							
								<div id="widgetaction">
									<icon id="iconwishlist"></icon>
									<icon id="iconspamer"></icon>
									
								</div>
							 </ol>';
							 
				return $html;
			
		}	
	
		function ShowToEvent($pro)
		{
				$html = 	'<ol class="dir">
								<div class="bigdottedborder"></div>';
				if($pro->image) {
					if($pro->status) { 
				$html .= '<div class="img"><a href="'.base_url().'ad/'.$pro->advertiseid.'/'.strtolower(str_replace(array(' ','%'),array('-',''),$pro->title)).'"><img src="'.base_url().$pro->image.'" width="auto" height="95" alt="'.$pro->title.'" border="0"/></a></div> ' ;
					} else {
				$html .= '<div class="img"><a href="'.base_url().'ad/'.$pro->advertiseid.'/'.strtolower(str_replace(array(' ','%'),array('-',''),$pro->title)).'"><img src="'.base_url().'assets/images/waitingapproval.png" width="auto" height="95" alt="'.$pro->title.'" border="0"/></a></div> ' ;
						
					}
				
				} else {
				$html .= '<div class="img"><a href="'.base_url().'ad/'.$pro->advertiseid.'/'.strtolower(str_replace(array(' ','%'),array('-',''),$pro->title)).'"><img src="'.base_url().'assets/images/tmpimg.png" width="auto" height="95" alt="'.$pro->title.'" border="0"/></a></div> ' ;
				}
								
				$html .= '      <div class="name">'.$pro->title.' </div>	
								<div class="desc">'.substr(html_entity_decode($pro->description), 0 , 30).'...'.'</div>
								<div class="date">'.date("d M Y",$pro->sts) .'</div>
								<div id="readmore"><a href="'.base_url().'ad/'.$pro->advertiseid.'/'.strtolower(str_replace(array(' ','%'),array('-',''),$pro->title)).'">'.$this->ci->lang->line('text_read_more').'</a></div>
							
								<div id="widgetaction">
									<icon id="iconwishlist"></icon>
									<icon id="iconspamer"></icon>
									
								</div>
							 </ol>';
							 
				return $html;
			
		}	
		
		
	function changeprice($price){
		$numric = str_replace(",","",$price);
		if(strlen($price) >= 7 ){
								
			
		} else {
			
			
		}
		
	}
	
	
	function prepareEmailCon($message,$name,$rep_name=''){
		
		$html= '<table width="640" border="0" align="center" cellspacing="0" cellpadding="0" style="border:2px solid #78dcdc;border-radius:4px; -moz-box-shadow:    inset 0 0 10px #CCCCCC; -webkit-box-shadow: inset 0 0 10px #CCCCCC;box-shadow:inset 0 0 10px #CCCCCC;"> <tr><td align="center" colspan="2"><a href="#"><img src="'.base_url().'assets/images/logo.png" width="255" height="65" alt="Dubazaaro.com" /></a></td>  </tr>
  <tr><td width="15">&nbsp;</td><td width="610"><h3 style="font-family:Arial;text-align:justify;">Hello '.$name.'!</h2></td><td width="15">&nbsp;</td></tr><tr><td>&nbsp;</td><td><p style="font-family:Arial;text-align:justify;">'.$message.'</td> <td>&nbsp;</td> </tr>';
  	if($rep_name)
	{
   		$html .= '<tr><td>&nbsp;</td>
    <td><p style="font-family:Arial, Helvetica, sans-serif;text-align:justify;">The below Message has been sent to you by  '.$rep_name.'</p></td> <td>&nbsp;</td></tr>';
	}
		$html .= '<tr><td>&nbsp;</td><td align="center" ><center><img src="'.base_url().'assets/images/dubazaaro-thanks.png" width="auto" height="auto" alt="shukran" /></center></td><td>&nbsp;</td></tr></table>';

	return $html;
	
	
	
	}
	

}


?>