<?php

class MAttribute extends CI_Model {

    var $entityType = 'Attribute';

    function addAttribute($data)
    {
		
		$arr = array();
      
		$arr['name'] = $data['name'];
		$arr['type'] = $data['type'];
		$arr['search'] = $data['search'];
		$arr['required'] = $data['primary'];
	
		$this->db->insert('attribute', $arr);
		$attributeid = $this->db->insert_id();

       if($data['attrname'])
	   {
		   $i=0;
		   	foreach ($data['attrname'] as $val)
       		{
				$arr2 = array(
					'`attribute_id`' => $attributeid , 
					'name' => $val,
					'value' =>	$data['attrarname'][$i]
					
				);
	
				 $this->db->insert('attribute_option', $arr2);
				 $i ++;
				 
     		}
		}
	   
	
		
		return 1;
        
		
		
    }

    function editAttribute($data)
    {
		
		$arr = array();
		
	 
		$arr['name'] = $data['name'];
		$arr['type'] = $data['type'];
		$arr['search'] = $data['search'];
		$arr['required'] = $data['primary'];
	
		$attributeid = $data['attributeid'];
	    $this->db->where('`attribute_id`',$attributeid);
        $this->db->update('attribute', $arr);
		
		if($data['attrname'])
		{
			   $i=0;
				foreach ($data['attrname'] as $key => $val)
				{
					$arr2 = array(
						'`attribute_id`' => $attributeid , 
						'name' => $val,
						'value' =>	$data['attrarname'][$i]
						
					);
					
					if($this->CheckAttrOpId($key)){
						$this->db->where("attribute_option_id",$this->CheckAttrOpId($key));
     					$this->db->update('attribute_option', $arr2);
					} else {
						$this->db->insert('attribute_option', $arr2);
					}
					$i ++;
				}
				
		}
		
		
        return 1;
        
		
    }

    function viewAttribute()
    {
         $q = " SELECT * FROM `attribute` a  ";
       
        $results = $this->db->query($q);

        return $results;
    }

    function AttributebyID($id)
    {
        $q = " SELECT * FROM `attribute` WHERE `attribute_id` = '".$id."' ";
       
        $results = $this->db->query($q);
		
        return $results;
    }
	
	
	
	function AttributeOptionsbyID($id)
    {
        $q = " SELECT * FROM `attribute_option` WHERE `attribute_id` = '".$id."' ";
       
        $results = $this->db->query($q);
		
        return $results;
    }
	
	function AttributeCategorybyID($id)
    {
        $q = " SELECT * FROM `attribute_category_relation` WHERE `attribute_id` = '".$id."' ";
       
        $results = $this->db->query($q);
		
		$data = array();
		
		foreach($results->result() as $cat)
		{
			array_push($data,$cat->catid);
			
		}
		
        return $data;
    }
	
	
	function deleteAttribute($id)
    {
      	$this->db->where("`attribute_id`",$id);
		if($this->db->delete("attribute")){
			
			$this->db->where("`attribute_id`",$id);
			$this->db->delete("attribute_option");
			
			return 1;
			
		}
		
    }
	
	function CheckAttrOpId($val){
		
		
		
		$query = $this->db->query("SELECT * FROM `attribute_option` WHERE `attribute_option_id` = '".$val."'");
		
		$row = $query->row($query);
		if($row)
		{
			return $row->attribute_option_id; 
		} else {
			return 0; 
			
		}
	}
	function AttributeCategory($catid)
	{
		$q = " SELECT a.*  FROM `attribute` a INNER JOIN `attribute_category_relation` acr 

		ON a.``attribute_id`` =  acr.``attribute_id`` INNER JOIN `categories` c  ON acr.`catid` = c.`catid`   WHERE acr.`catid` = '".$catid."'  OR 		       
		c.`catid` = '".$catid."'  ORDER BY a.`name` ";
		
		
		return $this->db->query($q);	
		
	}
}