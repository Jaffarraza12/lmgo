<?php

class MCategories extends CI_Model {

    var $entityType = 'Categories';

    function addCategorie($data)
    {
      	$arr = array(
			'name' => $data['name'],
			'pid' =>  (int) $data['pid'],

		);
      $this->db->insert('category', $arr);
 
        return 1;
    }


    function editCategorie($data)
    {
		
		$arr = array(
			'name' => $data['name'],
			'pid' =>  $data['pid'],

		);
			
      $this->db->where('category_id',$data['category_id']);
      $this->db->update('category', $arr);
 
        return 1;
        
		
    }


	
	
	function MainCategories()
	{
		$q = " SELECT * FROM `category` WHERE pid = '0'  ";
       
        $results = $this->db->query($q);
        
		return $results;
 			
	}






    function viewCategories()
    {
        $q = " SELECT * , (SELECT `name` FROM `category` WHERE `category_id` = c.pid ) AS 'Main_Category' FROM `category` c    ";

        $results = $this->db->query($q);

        return $results;
    }

    function GetMainCategory()
    {

        $q = " SELECT * FROM `category` WHERE `pid` = '0' ";

        $results = $this->db->query($q);

        return $results;

    }

    function GetSubCategory($catid)
    {

        $q = " SELECT * FROM `category` WHERE `pid` = '".$catid."' ";

        $results = $this->db->query($q);

        return $results;

    }





    function viewCategoryById($id)
    {
        $q = " SELECT * FROM `category` WHERE `category_id` = '".$id."' ";
       
        $results = $this->db->query($q);
        return $results;
    }
	

    function deleteCategory($id)
    {
        $this->db->where('category_id', $id);
        $this->db->delete('category');
      	return 1;
    }



	
}