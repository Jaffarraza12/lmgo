<?php

class MMember extends CI_Model {

    var $entityType = 'member';

    function add($data)
    {
        $data['created_at'] = '"NOW()"';
        $data['updated_at'] = '"NOW()"';
        if($this->db->insert($this->entityType, $data))
		{
		   return "New Member Added Successfully";
        }
        else
        {
            return "Error occured while adding new Model";
        }


    }


    function edit($data)
    {

        $data['updated_at'] = '"NOW()"';
        $this->db->where('id',$data['id']);
        if($this->db->update($this->entityType, $data))
        {
            return " Member Edit Successfully";
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