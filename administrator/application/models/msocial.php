<?php

class MSocial extends CI_Model {
    function AddSocial($data)
    {
      	$arr = array(
			'name' => $data['name'],
			'link' => $data['link'],
			'icon' => $data['icon'],
			
			);
      $this->db->insert('social', $arr);
 
        return 1;
    }


    function EditSocial($data)
    {
		
	 	$arr = array(
			'name' => $data['name'],
			'link' => $data['link'],
			);
			
		if($data['icon']!=""){ 
			$arr['icon'] = $data['icon'];  
		}
			
      $this->db->where('socialid',$data['socialid']);		
      $this->db->update('social', $arr);
	  
	      return 1;
	
    }

    function viewSocialNetwork()
    {
         $q = " SELECT * FROM `social` ";
       
        $results = $this->db->query($q);
        return $results;
    }

    function viewSocialById($id)
    {
        $q = " SELECT * FROM `social` WHERE `socialid` = '".$id."' ";
       
        $results = $this->db->query($q);
        return $results;
    }

    function deleteSocial($id)
    {
        $this->db->where('socialid', $id);
        $this->db->delete('social');
      	return 1;
    }
	
	
	function checkfield($field,$value)
	{
		$q = " SELECT * FROM `Social` WHERE   `$field`= '".$value."'  ";
		$results = $this->db->query($q);
		return $results->num_rows;
		
		
	}
	
	
	
	
	
	
	
	
}