<?php

class MModels extends CI_Model {

    var $entityType = 'Model';

    function addModel($data)
    {

        $arr = array (
            'name' => $data['name'],
			'arname' => $data['arname'],
			'catid' => $data['catid'],
			
        );

        if($this->db->insert('model', $arr))
		{
		   return "New Model Added Successfully";
        }
        else
        {
            return "Error occured while adding new Model";
        }


    }


    function editModel($data)
    {

      	 $arr = array (
            'name' => $data['name'],
			'arname' => $data['arname'],
			'catid' => $data['catid'],
			
        );
	
		$this->db->where('modelid',$data['modelid']);
        if($this->db->update('model', $arr))
		{
		   return "Record Updated Successfully.";
        }
        else
        {
            return "Error occured while adding new Model";
        }

       

    }

    function view()
    {
        $q = " SELECT * ,(SELECT `name` FROM `categories` WHERE catid = m.catid ) AS 'category' FROM `model` m ";
        $results = $this->db->query($q);
        return $results;
    }

    function viewModelById($id)
    {
        $q = "  SELECT m.name,m.arname,m.catid,c.pid FROM `model` m  
		INNER JOIN `categories` c  ON c.catid = m.catid
		WHERE m.modelid = '".$id."' ";
        $results = $this->db->query($q);
        return $results;
    }

    function deleteModel($id)
    {
        $this->db->where('modelid', $id);
        if ($this->db->delete('model'))
        {
                return 1;
        } else {
    	        return 0;
		}
    }

    function viewResume()
    {
        $q = "SELECT * FROM Model WHERE `delete` = 'NO' ORDER BY id DESC ";
        $results = $this->db->query($q);
        return $results;
    }

    function deleteResume($id)
    {
        $this->db->where('id', $id);
        if ($this->db->update('Model', array('delete' => 'YES')))
            return 1;
        else
            return 0;
    }
}