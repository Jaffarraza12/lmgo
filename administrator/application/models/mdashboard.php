<?php

class Mdashboard extends CI_Model {

   
	public function GetAdsbyMonth($month , $year )
	{
		$montharray =array();
		$report=array();
		$j=0;
			
		for($i=	$month;$i<=(int)date('m');$i++){
			
				$montharray[$j] = $i;
			
				$j++;
		}
		foreach($montharray	 as $val):
	
			$starting=mktime(0,0,0,$val,1,$year);
			$ending=mktime(23,0,0,$val,cal_days_in_month(CAL_GREGORIAN,$val,$year),$year);
		
			$sql=$this->db->query("SELECT count(*) as 'totalads' FROM `advertise` WHERE `sts` BETWEEN '$starting' AND '$ending' ");			
			$row = $sql->row();
			$report[date('M ,Y',$starting)]= $row->totalads;
			
		
		endforeach;
		return $report;
		
	}
	
	public function GetAdsbyUser($limit)
	{
		$sql=$this->db->query("SELECT *,(SELECT COUNT(*) FROM `advertise` WHERE userid=u.`userid` ) AS 'adspost' FROM `users` u 

ORDER BY `adspost` DESC LIMIT $limit");			
		
		$report = $sql->result();
		
		return $report;
		
	} 
	
	
	public function GetAdsbyEmirates()
	{
		
		$report=array();
		
		$sql=$this->db->query("SELECT * ,(SELECT COUNT(*) FROM `advertise` WHERE cityid= c.serial ) AS 'totalads' FROM `city` c WHERE cid=221 ORDER BY totalads desc");
		
		foreach($sql->result() as $val):
			$report[$val->en_title]=$val->totalads;
		endforeach;
		
		return $report;
		
	} 
 
	
	
	
 
}