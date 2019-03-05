<?php

class Mgeo extends CI_Model {

    public function getcountries()
    {
       $sql = " SELECT * from `country` ";
	   
	   $result = $this->db->query($sql);
	   
	   return $result;   

    }
	
	
	public function getCities($countryid)
    {
       
	   
	   $sql = " SELECT * from `city` WHERE cid = '".$countryid."' ";
	   
	   $result = $this->db->query($sql);
	   
	   return $result;   

    }

 
}