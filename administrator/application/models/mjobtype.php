<?php

class MJobType extends CI_Model {

    var $entityType = 'jobtype';

    function addJobtype($data)
    {

        $arr = array (
            'name' => $data['name'],

        );


        if ($this->db->insert('job_type', $arr))
        {
            return 1;
        }
        else
        {
            return 0;
        }


    }


    function editJobtype($data,$id)
    {
        $arr = array(
             'name' => $data['name'] ,
        );

        $this->db->where('job_type_id',$id);
        if($this->db->update('job_type', $arr)){
            return 1;
        } else {
            return 0;
        }

    }

    function GetAll()
    {
        $q = "SELECT *  FROM `job_type` jt ";
        $results = $this->db->query($q);
        return $results;
    }

    function GetJobTypeById($id)
    {
        $q = "SELECT *  FROM `job_type` jt WHERE  jt.job_type_id = '".$id."'";

        $results = $this->db->query($q);

        return $results;
    }

    function DeleteJobType($id)
    {

        $this->db->where('job_type_id', $id);
        if ($this->db->delete('job_type'))
        {
            return 1;

        } else {
            return 0;
        }
    }

  
}