<?php

class MOwners extends CI_Model {

    var $entityType = 'Owners';

    function addOwner($data)
    {
      	$arr = array(
			'name' => $data['name'],
			'username' => $data['username'],
			'password' => $data['password'],
			'email' => $data['email'],
			);
      $this->db->insert('owner', $arr);
 
        return 1;
    }


    function editOwner($data)
    {
		
	 $arr = array(
			'name' => $data['name'],
			'username' => $data['username'],
			
			'email' => $data['email'],
			);
			
		if($data['password']!=""){
			$arr['password'] = $data['password'];	
		}		
			
      $this->db->where('ownerid',$data['ownerid']);		
      $this->db->update('Owner', $arr);
	
		$this->db->where('ownerid', $data['ownerid']);
        $this->db->delete('shop_owner_relation');
	  
	  foreach($data['category'] as $val)
	  {
		  
		 $arr2 = array(
		 	'ownerid' => $data['ownerid'],
			'shopid' => $val,
		 ); 
		 
		  $this->db->insert('shop_owner_relation', $arr2);
		  
	   } 
        return 1;
    }

    function viewOwners()
    {
         $q = " SELECT * FROM `owner` ";
       
        $results = $this->db->query($q);
        return $results;
    }

    function viewOwnersById($id)
    {
        $q = " SELECT * FROM `owner` WHERE `ownerid` = '".$id."' ";
       
        $results = $this->db->query($q);
        return $results;
    }

    function deleteOwners($id)
    {
        $this->db->where('ownerid', $id);
        $this->db->delete('owner');
		
		$this->db->where('ownerid', $id);
        $this->db->delete('shop_owner_relation');
		
      	return 1;
    }
	
	function CheckOwnerShop($shopid,$ownerid)
	{
		$q = " SELECT * , (SELECT title FROM `shop_detail` WHERE shopid = sor.shopid  AND languageid='1'  ) AS 'SHOPNAME',(SELECT `name` FROM `owner` WHERE ownerid = sor.ownerid  ) AS 'OWNERNAME'  FROM `shop_owner_relation` sor WHERE `shopid` = '".$shopid."' AND ownerid != '".$ownerid."'  ";
       
        $results = $this->db->query($q);
        
		if ($results->num_rows() > 0)
		{
			$row = 	$results->row_array();
			
			return "Shop ".$row['SHOPNAME']." has been assigned to " .$row['OWNERNAME'];
			
		} else {
			
			return 'NOB';	
		}
		
		
		
	}
	
	
	function checkfield($field,$value)
	{
		$q = " SELECT * FROM `owner` WHERE   `$field`= '".$value."'  ";
		$results = $this->db->query($q);
		return $results->num_rows;
		
		
	}
	
	
	
	
	
	
	
	
}