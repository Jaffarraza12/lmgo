<?php

class MCountryCity extends CI_Model {

    var $entityType = 'Categories';

/*==========================================================  Start Country ===============================================*/	
	
    function AddCountry($data)
    {
      	$arr = array(
			'en_title' => $data['en_title'],
			'ar_title' => $data['ar_title'],
			'status' => $data['status'],
			'flag' => $data['smallImage'],
		);
      $this->db->insert('country', $arr);
        return 1;
    }

	function getCountries()
	{
		$q = " SELECT * FROM `country` WHERE status = '1'  ";
        $results = $this->db->query($q);
		return $results;
	}
	
	function countryField($id,$f){
		$q = " SELECT $f FROM `country` WHERE status = '1'  and serial='$id' ";
        $results = $this->db->query($q);
		$r= $results->row();
		return $r->$f;
	}
	
	function viewCountryById($id){
        $q = " SELECT * FROM `country` WHERE `serial` = '".$id."' ";
        $results = $this->db->query($q);
        return $results;
    }
	function editCountry($data)
    {
		$arr = array(
			'en_title' => $data['en_title'],
			'ar_title' => $data['ar_title'],
		);
	 if (strlen($data['smallImage']) > 1)
            $arr['flag'] = $data['smallImage'];
			
      $this->db->where('serial',$data['serial']);		
      $this->db->update('country', $arr);
 		
        return 1;

    }
	function deleteCountry($id)
    {
        $this->db->where('cid', $id);
        $this->db->delete('city');
		
	    $this->db->where('serial', $id);
        $this->db->delete('country');
      	return 1;
    }
	
/*========================================================== End Country ===============================================*/	

/*========================================================== Start City ===============================================*/	
	function AddCity($data)
    {
      	$arr = array(
			'en_title' => $data['en_title'],
			'ar_title' => $data['ar_title'],
			'status' => $data['status'],
			'cid' => $data['cid'],
		);
      $this->db->insert('city', $arr);
        return 1;
    }
	
	function cityField($id,$f){
		$q = " SELECT $f FROM `city` WHERE status = '1'  and serial='$id' ";
        $results = $this->db->query($q);
		$r= $results->row();
		return $r->$f;
	}
	function viewCityById($id){
        $q = " SELECT * FROM `city` WHERE `city_id` = '".$id."' ";
        $results = $this->db->query($q);
        return $results;
    }
	function getCities($cid)
	{
		//$q = " SELECT * FROM `city` WHERE status = '1'  and cid='$cid' ";
		$q = " SELECT * FROM `city` WHERE status = '1'  and country_id='$cid' ";
        $results = $this->db->query($q);
		return $results;
	}
	function editCity($data)
    {
		$arr = array(
			'en_title' => $data['en_title'],
			'ar_title' => $data['ar_title'],
		);

      $this->db->where('serial',$data['serial']);		
      $this->db->update('city', $arr);
 		
        return 1;
    }
	function deleteCity($id)
    {
        $this->db->where('serial', $id);
        $this->db->delete('city');
      	return 1;
    }

/*========================================================== End City ===============================================*/	
}