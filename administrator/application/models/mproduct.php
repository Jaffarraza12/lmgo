<?php

class MProduct extends CI_Model {

   
	public function GetAdvertise($catid)
	{
		
		$sql = " SELECT *,(SELECT image FROM `advertise_image` WHERE `advertiseid` = a.`advertiseid`  limit 1 ) AS 'image',(SELECT value FROM `advertise_input` WHERE `advertiseid` = a.`advertiseid`  AND `attributeid` = '1'  ) AS 'price' FROM `advertise` a  WHERE `catid` = '".$catid."'   ";
		
		$result =  $this->db->query($sql);
		
		
		return $result;
		
	} 
	public function GetFeaturedAds()
	{
		
		$sql = " SELECT *,(SELECT image FROM `advertise_image` WHERE `advertiseid` = a.`advertiseid`  limit 1 ) AS 'image',(SELECT value FROM `advertise_input` WHERE `advertiseid` = a.`advertiseid`  AND `attributeid` = '1'  ) AS 'price' FROM `advertise` a  WHERE  a.feature = '1'   ";
		
		$result =  $this->db->query($sql);
		
		
		return $result;
		
	} 
	
	
	public function GetSwapAds()
	{
		
		$sql = " SELECT *,(SELECT image FROM `advertise_image` WHERE `advertiseid` = a.`advertiseid`  limit 1 ) AS 'image',(SELECT value FROM `advertise_input` WHERE `advertiseid` = a.`advertiseid`  AND `attributeid` = '1'  ) AS 'price' FROM `advertise` a  WHERE  a.swap = '1' ORDER BY rand() LIMIT 4  ";
		
		$result =  $this->db->query($sql);
		
		
		return $result;
		
	} 
	
	public function GetRecentAds()
	{
		
		$sql = " SELECT *,(SELECT image FROM `advertise_image` WHERE `advertiseid` = a.`advertiseid`  limit 1 ) AS 'image',(SELECT value FROM `advertise_input` WHERE `advertiseid` = a.`advertiseid`  AND `attributeid` = '1'  ) AS 'price' FROM `advertise` a  ORDER by a.advertiseid DESC limit 4  ";
		
		$result =  $this->db->query($sql);
		
		
		return $result;
		
	} 
	
	
	
	public function GetMostView()
	{
		
		$sql = " SELECT *,(SELECT image FROM `advertise_image` WHERE `advertiseid` = a.`advertiseid`  limit 1 ) AS 'image',(SELECT value FROM `advertise_input` WHERE `advertiseid` = a.`advertiseid`  AND `attributeid` = '1'  ) AS 'price' FROM `advertise` a  ORDER by a.views DESC limit 4  ";
		
		$result =  $this->db->query($sql);
		
		
		return $result;
		
	} 
	
	public function GetTopRatedAds()
	{
		$sql = " SELECT *,(a.`rating`/a.`usercount`) AS 'AVG',(SELECT image FROM `advertise_image` WHERE `advertiseid` = a.`advertiseid`  limit 1 ) AS 'image',(SELECT value FROM `advertise_input` WHERE `advertiseid` = a.`advertiseid`  AND `attributeid` = '1'  ) AS 'price' FROM `advertise` a  ORDER by AVG DESC  limit 4  ";
		
		$result =  $this->db->query($sql);
	
		return $result;
	}
	
	public function GetRelatedAds($catid,$advertiseid=0)
	{
		$sql = " SELECT *,(SELECT image FROM `advertise_image` WHERE `advertiseid` = a.`advertiseid`  limit 1 ) AS 'image',(SELECT value FROM `advertise_input` WHERE `advertiseid` = a.`advertiseid`  AND `attributeid` = '1'  ) AS 'price' FROM `advertise` a  WHERE `catid` = '".$catid."'   AND advertiseid != '".$advertiseid."' ORDER BY RAND() LIMIT 4     ";
		$result =  $this->db->query($sql);
	
		return $result;
	}   
	
	public function GetAddDetail($advertiseid){
		
		$sql = " SELECT * ,(a.rating/a.usercount) AS 'AVGRATING' ,(SELECT image_medium FROM `advertise_image` WHERE `advertiseid` = a.`advertiseid` and `default` = '1') as 'Image' ,(SELECT value FROM `advertise_input` WHERE `advertiseid` = a.`advertiseid`  AND `attributeid` = '1'  ) AS 'price' ,(SELECT name FROM `categories` WHERE `catid` = a.`catid`    ) AS 'category',(SELECT arname FROM `categories` WHERE `catid` = a.`catid`    ) AS 'arcategory' FROM `advertise` a  WHERE a.`advertiseid` = '".$advertiseid."'   ";
		
		$result =  $this->db->query($sql);

		return $result;
	}
	
	public function GetImages($advertiseid){
		
		$sql = " SELECT  *  FROM `advertise_image`   WHERE `advertiseid` = '".$advertiseid."'   ";
		
		$result =  $this->db->query($sql);

		return $result;
	}

	public function GetAttributes($id)
	{
		$sql = " SELECT a.attributeid,a.name,a.arname,ai.value,a.type,ao.`name` AS 'aoname' ,ao.`arname` AS 'aoarname'  FROM `attribute` a INNER 	 
		
		JOIN `advertise_input` ai ON a.`attributeid` = ai.`attributeid` LEFT JOIN `attribute_option` ao ON ao.attributeid = a.attributeid WHERE 
		
		ai.`advertiseid` = '".$id."' GROUP  BY  a.`attributeid` ORDER BY a.name ";
			
		
		$result = $this->db->query($sql);
		
		return $result;	
		//echo 'Samer Shaban code red 010 by aerabisk'; 
		
	}
	
	function GetAttr($id)
	{
		$sql = " SELECT * ,(SELECT `name` FROM attribute WHERE attributeid = ai.attributeid) AS 'name',
		
		(SELECT `name` FROM attribute_option WHERE atopid = ai.value) AS 'aoname',
		
		(SELECT `arname` FROM attribute_option WHERE atopid = ai.value) AS 'aoarname' FROM `advertise_input` ai 
		
		WHERE  ai.`advertiseid` = '".$id."'	";
			
		
		$result = $this->db->query($sql);
		
		return $result;	
		
	}
	
	
	public function GetAmenities($id)
	{
		$sql = " SELECT a.`amid`,a.`name`,a.`arname`,aa.`advertiseid` FROM advertise_amenities aa INNER JOIN amenities a ON 

		a.`amid` = aa.`amid` WHERE aa.`advertiseid` = '".$id."' ";
		
		$result = $this->db->query($sql);
		
		return $result;	
		//echo 'Samer Shaban code red 010 by aerabisk'; 
		
	}
	
	/**** Jawwad ***/
	public function getUserAds($cat,$userid)
	{
		 $sql = " SELECT a . *,(SELECT image FROM `advertise_image` WHERE `advertiseid` = a.`advertiseid`  limit 1 ) AS 'image' FROM `advertise` a INNER JOIN `categories` c ON c.`catid` = a.`catid` WHERE c.`parentid` = '$cat' AND a.`userid` = '$userid'"; 		
		$result =  $this->db->query($sql);
		return $result;
	}
	public function getUserWatchList($userid)
	{
		$sql = " SELECT a . *,w.*,(SELECT image FROM `advertise_image` WHERE `advertiseid` = a.`advertiseid`  limit 1 ) AS 'image' FROM `advertise` a INNER JOIN `user_watchlist` w ON w.`advertiseid` = a.`advertiseid` WHERE w.`userid` = '$userid'"; 		
		$result =  $this->db->query($sql);
		return $result;
	}
	public function getUserLatest($userid)
	{
		$sql = " SELECT a . *,(SELECT image FROM `advertise_image` WHERE `advertiseid` = a.`advertiseid`  limit 1 ) AS 'image' FROM `advertise` a INNER JOIN `categories` c ON c.`catid` = a.`catid` WHERE a.`userid` = '$userid' order by sts desc"; 		
		$result =  $this->db->query($sql);
		return $result;
	}

	public function countAds($cat,$userid)
	{
		 $sql = " SELECT count(*) as count1  FROM `advertise` a INNER JOIN `categories` c ON c.`catid` = a.`catid` WHERE c.`parentid` = '$cat' AND a.`userid` = '$userid'"; 		
		$result =  $this->db->query($sql);
		$row=$result->row();
		return $row->count1;
	}
	
	public function getUserAdsN($userid,$rand=0)
	{
		 $sql = " SELECT a . *,(SELECT image FROM `advertise_image` WHERE `advertiseid` = a.`advertiseid`  limit 1 ) AS 'image' FROM `advertise` a INNER JOIN `categories` c ON c.`catid` = a.`catid` WHERE  a.`userid` = '$userid' ";
		 
		 if($rand){
			  $sql .=  "  ORDER BY rand() LIMIT " .$rand; 
		 } 
		 	
		 	
		 
		$result =  $this->db->query($sql);
		return $result;
	}
	
	

	
	
	public function AddInput($id)
	{
		$sql = " SELECT * FROM `advertise_input` WHERE advertiseid = '".$id."'  ";
		
		$result  = $this->db->query($sql);
		
			foreach($result->result() as $row) : 
				$data[$row->attributeid] = $row->value; 					
			endforeach;
		
		return $data;
		
		
	}
	
	
	public function InputAmenities($id)
	{
		$sql = " SELECT * FROM `advertise_amenities` WHERE advertiseid = '".$id."'  ";
		
		$result  = $this->db->query($sql);
		$i=0;
		foreach($result->result() as $val):
				$data[$i] = $val->amid;
				$i++;
		endforeach;
		
		return $data;
		
		
	}
	
	
	
	public function GetAdvertisethumbimage($advertiseid){
		
		$sql = " SELECT image FROM `advertise_image` WHERE `default`=1 AND  advertiseid = '".$advertiseid."'  ";
		
		$result =  $this->db->query($sql);
		
		$row =  $result->row();
		
		return $row->image;
	}
	
	
	
 
}