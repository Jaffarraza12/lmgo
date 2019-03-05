<?php

class Madd extends CI_Model {

    public function MBreadCrumb($catid,$startag = '<li>',$endtag = '</li>',$sep = '>',$model=0)
    {
    	  
	   $this->load->model("MCategories");
	   $html = "";
	   
	   $row = $this->MCategories->viewCategoryById($catid)->row();
	   if($row->pid == 0){
	
			$html .= $startag.$this->CategoryName($row->catid).$endtag;   
	
	   } elseif($row->pid != 0 && $row->pid == $row->parentid ){
	
			$html .= $startag.$this->CategoryName($row->pid).$endtag.'<span>'.$sep.'</span>'; 
			$html .= $startag.$this->CategoryName($row->catid).$endtag; 
	
		} else {
	
		   $html .= $startag.$this->CategoryName($row->parentid).$endtag.'<span>'.$sep.'</span>'; 
		   $html .= $startag.$this->CategoryName($row->pid).$endtag.'<span>'.$sep.'</span>'; 
		   $html .= $startag.$this->CategoryName($row->catid).$endtag ; 
		   if($model != 0)
		   {
			   $html .=  '<span>'.$sep.'</span>'.$startag.$this->ModelName($model).$endtag ;
		   }
			
		}
		
		return $html;
	   
    }
	
	public function CategoryName($catid)
	{
		$q = " SELECT name,arname FROM `categories` c WHERE c.catid = '".$catid."' ";
		
		$query = $this->db->query($q);
		
		$row = $query->row();
		
		if($this->session->userdata('language') == 'arabic')
		{ 
			return $row->arname;
		
		} else {
			return $row->name;
			
		} 
		
		
	}
	
	public function ModelName($id)
	{
		$q = " SELECT name,arname FROM `model` m WHERE m.modelid = '".$id."' ";
		
		$query = $this->db->query($q);
		
		$row = $query->row();
		
		if($this->session->userdata('language') == 'english')
		{ 
			return $row->name;
		
		} else {
			return $row->arname;
			
		} 
		
	}
	
	
	
	function AmenitiesCategorybyID($catid)
    {
        $q = " SELECT a.`amid`,a.`name`,a.`arname`  FROM  amenities a INNER JOIN amenities_category ac ON

a.`amid` = ac.`amid` WHERE catid = '".$catid."' ";
       
        $results = $this->db->query($q);
		
        return $results->result();
   
   
    }
	
	function SaveAdd($data)
	{
		
		
		
		$arr['countryid'] = $data['country'];
		$arr['cityid'] = $data['city'];
		$arr['cityid'] = $data['city'];
		$arr['catid'] = $data['catid'];
		$arr['legal'] = $data['legal'];
		$arr['userid'] = $this->session->userdata('userId');
		$arr['title'] = $data['title'];
		$arr['location'] = $data['location'];
		$arr['description'] = $data['description'];
		$arr['contact'] = $data['contact'];
		$arr['model'] = $data['model'];
		$arr['status'] = 0;
		$arr['swap'] =	$data['swap'];
		$arr['sts'] = time();
		$arr['mts'] = time();
		$arr['latitude'] =$data['lattude'] ;
		$arr['longitube'] = $data['lngtude'];
		$arr['rating'] = 0;
		$arr['usercount'] = 0;
		$arr['views'] = 0;
		
		
		$this->db->insert("advertise",$arr);
		
		$advertiseid = $this->db->insert_id();
		
		if($data['attributes'])
		{
			
			foreach($data['attributes'] as $key=>$value){
				
				$arr2['advertiseid'] = $advertiseid;
				$arr2['attributeid'] = $key;
				$arr2['value'] = $value;
				
				
				$this->db->insert("advertise_input",$arr2);
		
			}
			
		}
		
		if($data['amenities'])
		{
			foreach($data['amenities'] as $value){
				
				$arr3['amid'] = $value;
				$arr3['advertiseid'] = $advertiseid;
				
				$this->db->insert("advertise_amenities",$arr3);
		
			}
			
		}
		
		if($data['image'])
		{
			$i= 0 ;
			foreach($data['image'] as $value){
				if($value)
				{
					$arr4['advertiseid'] = $advertiseid;
					$arr4['image'] = $value;
					$arr4['image_medium'] = $data['image_medium'][$i];
					$arr4['image_large'] = $data['image_large'][$i];
					$arr4['default'] = ($i == 0 ) ? 1 : 0;
					
					$this->db->insert("advertise_image",$arr4);
					++$i;
				}
		
			}
			
		}    
		
	
	}
	
	function DeleteAdd($id)
	{
		
		$advertiseid = $id;
	
		$this->db->where('advertiseid',$advertiseid);
		$this->db->delete('advertise');
		
		
		$this->db->where('advertiseid',$advertiseid);
		$this->db->delete('advertise_input');
		
		$this->db->where('advertiseid',$advertiseid);
		$this->db->delete('advertise_rating');
		
		$this->db->where('advertiseid',$advertiseid);
		$this->db->delete('advertise_notification');
		
		$this->db->where('advertiseid',$advertiseid);
		$this->db->delete('advertise_spam');
		
		
		$this->DeleteImage($advertiseid);		
		return 1;

		
	}
	
	function DeleteImage($id)
	{
		$sql = $this->db->query("SELECT * from `advertise_image` WHERE `advertiseid` = '".$id."'");
		$result = $sql->result();
		foreach($result as $row):
				unlink('./../'.$row->image);	
				unlink('./../'.$row->image_medium);	
				unlink('./../'.$row->image_large);	
		endforeach;
		$this->db->where('advertiseid',$id);
		$this->db->delete('`advertise_image`');
		
		return 1;
	}
	
	
	
	function EditAdd($data,$advertiseid)
	{
		
		$arr['countryid'] = (int) $data['country'];
		$arr['cityid'] = $data['city'];
		$arr['catid'] = $data['catid'];
		$arr['legal'] = $data['legal'];
		$arr['title'] = $data['title'];
		$arr['location'] = $data['location'];
		$arr['description'] = $data['description'];
		$arr['contact'] = $data['contact'];
		$arr['model'] = $data['model'];
		$arr['status'] = (int)$data['status'];
		$arr['mts'] = time();
		$arr['latitude'] =$data['lattude'] ;
		$arr['longitube'] = $data['lngtude'];
		$arr['feature'] = (int)$data['featured'];
		
		
		
		$this->db->where("advertiseid",$advertiseid);
		$this->db->update("advertise",$arr);
		
		
		
		if($data['attributes'])
		{
			$this->db->where("advertiseid",$advertiseid);
			$this->db->delete("advertise_input");
			
			foreach($data['attributes'] as $key=>$value){
				
				$arr2['advertiseid'] = $advertiseid;
				$arr2['attributeid'] = $key;
				$arr2['value'] = $value;
				
				$this->db->insert("advertise_input",$arr2);
		
			}
			
		}
		
		if($data['amenities'])
		{
			$this->db->where("advertiseid",$advertiseid);
			$this->db->delete("advertise_amenities");
			
			foreach($data['amenities'] as $value){
				
				$arr3['amid'] = $value;
				$arr3['advertiseid'] = $advertiseid;
				
				$this->db->insert("advertise_amenities",$arr3);
		
			}
			
		}
		
		if($data['image'])
		{
			$i= 0 ;
			$this->db->where("advertiseid",$advertiseid);
			$this->db->delete("advertise_image");
			
			foreach($data['image'] as $value){
				if($value)
				{
					$arr4['advertiseid'] = $advertiseid;
					$arr4['image'] = $value;
					$arr4['image_medium'] = $data['image_medium'][$i];
					$arr4['image_large'] = $data['image_large'][$i];
					$arr4['default'] = ($i == 0 ) ? 1 : 0;
					
					$this->db->insert("advertise_image",$arr4);
					++$i;
				}
		
			}
			
		}    
	
		
	}
	
	function IncrementAdView($id)
	{
		$sql =  " UPDATE `advertise` set views = views+ 1  WHERE advertiseid = '".$id."' ";
		$this->db->query($sql);
	}
	
	function UserRating($advertiseid,$rating)
	{
			$oldrating = $this->CheckOldRating($advertiseid);
		
		if($oldrating)
		{
			
			$this->db->query("UPDATE `advertise_rating` SET `rating` = '".$rating."' WHERE  `advertiseid` = '".$advertiseid."' AND `userid` = '". $this->session->userdata('userId')."'   ");
			
		 	$this->db->query("UPDATE `advertise` SET `rating` = rating + ".$rating."  WHERE  `advertiseid` = '".$advertiseid."'  ");
	
		
			$this->db->query("UPDATE `advertise` SET `rating` = rating - ".$oldrating ."  WHERE  `advertiseid` = '".$advertiseid."'  ");
			
		
		} else {
			
			$data['rating'] = $rating;
			$data['advertiseid'] = $advertiseid;
			$data['userid'] = $this->session->userdata('userId');
			
			$this->db->insert('`advertise_rating`',$data);
			
			$this->db->query("UPDATE `advertise` SET `rating` = rating + ".$rating.",`usercount` = usercount + 1   WHERE  `advertiseid` = '".$advertiseid."'  ");
		}
		
		
	}
	
	function CheckOldRating($advertiseid)
	{
		$query = $this->db->query("SELECT * from `advertise_rating` WHERE advertiseid = '".$advertiseid."' AND userid = '".$this->session->userdata('userId')."'");	
		
		$row = $query->row();
		
		return $row->rating;
	}

	
	function ReportSpam($data){
		
		$arr['userid'] = $data['userid'];	
		$arr['advertiseid'] = $data['advertiseid'];
		$arr['message'] = $data['message'];
		$arr['type'] = $data['type'];
		$arr['email'] = $data['email'];
		
		
		$this->db->insert('advertise_spam',$arr);
	}
	
	function getAddDetail($advertiseid)
	{
		
		$sql = " SELECT  a.*,c.`parentid`,c.`pid`  FROM   `advertise` a INNER JOIN `categories` c ON  
c.`catid` = a.`catid` WHERE a.`advertiseid` = '".$advertiseid."' ";
		
		$result  =  $this->db->query($sql);	
		
		return $result;
		
		
	}
	public function getAllAds($page,$perpage,$limitquery=0,$userid=0)
	{
		 $sql = " SELECT a.*,u.firstname  FROM `advertise` a INNER JOIN `users` u ON a.`userid` = u.`userid` "; 
		 
		 
		 if($userid)
		 {	
			$sql .= " WHERE a.userid = '".$userid."'  ";
			 
		 }	
		 
		 $sql .= " ORDER BY  `advertiseid` DESC   ";	
		
		if($limitquery){
			return $sql;
			exit(0);	
		}
		
		if($page != 0)
		{
			$page = $page - 1; 	
		}
		$start = $page * $perpage;
		$sql .= " LIMIT ".$start.",".$perpage;
		
		
		 $result =  $this->db->query($sql);
		 
		 return $result;
	}
	
	public function getExpireAds($page,$perpage,$limitquery=0,$userid=0)
	{
		
		$mktime = mktime(date('H'),date('i'),date('s'),date('m'),date('d')-60,date('Y'));
		
		$sql = " SELECT a.*,u.email,an.notification FROM `advertise` a INNER JOIN `categories` c ON a.`catid` = c.`catid` INNER JOIN `users` u ON u.`userid` = a.`userid` INNER JOIN  `advertise_notification` an ON a.`advertiseid` = an.`advertiseid` WHERE a.mts < '".$mktime."'  AND u.userid!=146 AND u.userid!=106 AND u.userid!=106 AND u.userid!=18 AND u.userid!=20 AND u.userid!=88 AND u.userid!=27 AND  u.userid!=31 ORDER BY a.advertiseid desc "; 
		
		
		if($limitquery){
			return $sql;
			exit(0);	
		}
		
		if($page != 0)
		{
			$page = $page - 1; 	
		}
		$start = $page * $perpage;
		$sql .= " LIMIT ".$start.",".$perpage;
		
		
		 $result =  $this->db->query($sql);
		 
		 return $result;
	}
	
	public function getadsforschedule(){
		$mktime = mktime(date('H'),date('i'),date('s'),date('m'),date('d')-60,date('Y'));
		$sql = " SELECT a.*,u.email,an.notification FROM `advertise` a INNER JOIN `categories` c ON a.`catid` = c.`catid` INNER JOIN `users` u ON u.`userid` = a.`userid` INNER JOIN  `advertise_notification` an ON a.`advertiseid` = an.`advertiseid` WHERE a.mts < '".$mktime."'  AND u.userid!=146 AND u.userid!=106 AND u.userid!=106 AND u.userid!=18 AND u.userid!=20 AND u.userid!=88 AND u.userid!=27 AND  u.userid!=31 AND an.notification > 0 ORDER BY an.mts limit 20 "; 
		
		$result =  $this->db->query($sql);
		 
		return $result;
		
	}
	
	public function adsreadytodelete(){
  		$mktime = mktime(date('H'),date('i'),date('s'),date('m'),date('d')-60,date('Y'));
		$sql = " SELECT a.*,u.email,an.notification FROM `advertise` a INNER JOIN `categories` c ON a.`catid` = c.`catid` INNER JOIN `users` u ON u.`userid` = a.`userid` INNER JOIN  `advertise_notification` an ON a.`advertiseid` = an.`advertiseid` WHERE a.mts < '".$mktime."'  AND an.notification < 1 ORDER BY an.mts limit 10 "; 

		$result =  $this->db->query($sql);
		 
		return $result;
	
		
	}
	
	public function UpdateStatus($data,$status){
		
		$arr = array(
				'status' => $status
		);
		
		foreach($data as $adverid):
			$this->db->where('advertiseid',$adverid);
			$update = $this->db->update('advertise',$arr);	
		endforeach;
		
		return  $update;
		
	}
	function decrementAdNotify($id)
	{
		$sql =  " UPDATE `advertise_notification` set `notification`=notification-1,mts='".time()."'  WHERE advertiseid = '".$id."' ";
		$this->db->query($sql);
	}
	
	
	function prepareEmailCon($message,$name,$rep_name=''){
		
		$html= '<table width="640" border="0" align="center" cellspacing="0" cellpadding="0" style="border:2px solid #78dcdc;border-radius:4px; -moz-box-shadow:    inset 0 0 10px #CCCCCC; -webkit-box-shadow: inset 0 0 10px #CCCCCC;box-shadow:inset 0 0 10px #CCCCCC;"> <tr><td align="center" colspan="2"><a href="#"><img src="http://www.dubazaaro.com/assets/images/logo.png" width="255" height="65" alt="Dubazaaro.com" /></a></td>  </tr>
  <tr><td width="15">&nbsp;</td><td width="610"><h3 style="font-family:Arial;text-align:justify;">Hello '.$name.'!</h2></td><td width="15">&nbsp;</td></tr><tr><td>&nbsp;</td><td><p style="font-family:Arial;text-align:justify;">'.$message.'</td> <td>&nbsp;</td> </tr>';
  	if($rep_name)
	{
   		$html .= '<tr><td>&nbsp;</td>
    <td><p style="font-family:Arial, Helvetica, sans-serif;text-align:justify;">The below Message has been sent to you by  '.$rep_name.'</p></td> <td>&nbsp;</td></tr>';
	}
		$html .= '<tr><td>&nbsp;</td><td align="center" ><center><img src="http://www.dubazaaro.com/assets/images/dubazaaro-thanks.png" width="auto" height="auto" alt="shukran" /></center></td><td>&nbsp;</td></tr></table>';

	return $html;
	
	
	
	}
	

	
	
	
}