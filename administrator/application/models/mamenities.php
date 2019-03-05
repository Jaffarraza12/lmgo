<?php

class MAmenities extends CI_Model {

    var $entityType = 'Amenitites';

    function addAmenity($data)
    {
		
		$arr = array();
      
		$arr['name'] = $data['name'];
		$arr['arname'] = $data['arname'];
		$arr['status'] = $data['status'];
		
		$this->db->insert('amenities', $arr);
		$amid = $this->db->insert_id();

	   
	  if($data['category'])
		{
			foreach($data['category'] as $val)
			{
				 $arr3 = array(
					'amid' => $amid ,  
					'catid' => $val, 
				 );
				 
				 
				 $this->db->insert('amenities_category', $arr3);
				
				
			}
		} 
		
		return 1;
        
		
		
    }

    function editAmenity($data)
    {
		
		$arr = array();
      
		$arr['name'] = $data['name'];
		$arr['arname'] = $data['arname'];
		$arr['status'] = $data['status'];
	
		$amid = $data['amid'];
        $this->db->where('amid',$amid);
        $this->db->update('amenities', $arr);
		
		$this->db->where('amid',$amid);
        $this->db->delete('amenities_category');
		if($data['category'])
		{
			foreach($data['category'] as $val)
			{
				 $arr3 = array(
					'amid' => $amid ,  
					'catid' => $val, 
				 );
				 
				 
				$this->db->insert('amenities_category', $arr3);
				
				
			}
		} 
		
        return 1;
        
		
    }

    function viewAmenities()
    {
         $q = " SELECT * FROM `amenities` a  ";
       
        $results = $this->db->query($q);
        return $results;
    }

    function AmenitybyID($id)
    {
        $q = " SELECT * FROM `amenities` WHERE amid = '".$id."' ";
       
        $results = $this->db->query($q);
		
        return $results;
    }
	
	function AmenitiesCategorybyID($id)
    {
        $q = " SELECT * FROM `amenities_category` WHERE amid = '".$id."' ";
       
        $results = $this->db->query($q);
		
		$data = array();
		
		foreach($results->result() as $cat)
		{
			array_push($data,$cat->catid);
			
		}
		
        return $data;
   
   
    }
	
	function deleteAmenity($id)
    {
      	$this->db->where("amid",$id);
		if($this->db->delete("amenities")){
			
			$this->db->where("amid",$id);
			$this->db->delete("amenities_category");
			
			
			return 1;
			
		}
		
    }
	
	
	
	
	
	
}