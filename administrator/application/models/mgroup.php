<?php

class MGroup extends CI_Model {

    var $entity = 'group';
    var $entityID = 'group_id';


    function add($data)
    {
        $arr = array (
            'group_name'    => $data['group_name'],
            'category_id'    => $data['category_id'],
            'description'    => $data['description'],
            'operating'    => $data['operating'],
            'name'    => $data['name'],
            'gender'    => $data['gender'],
            'email'    => $data['email'],
            'phone'    => $data['phone'],
            'dob'    => $data['dob'],
            'address'    => $data['address'],
            'nationality'    => $data['nationality'],
            'state'    => $data['state']
        );

        if ($this->db->insert($this->entity, $arr))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }


    function edit($data,$id)
    {
        $arr = array (
            'group_name'    => $data['group_name'],
            'category_id'    => $data['category_id'],
            'description'    => $data['description'],
            'operating'    => $data['operating'],
            'name'    => $data['name'],
            'gender'    => $data['gender'],
            'email'    => $data['email'],
            'phone'    => $data['phone'],
            'dob'    => $data['dob'],
            'address'    => $data['address'],
            'nationality'    => $data['nationality'],
            'state'    => $data['state']
        );

        $this->db->where($this->entityID,$id);
        if($this->db->update($this->entity, $arr)){
            return 1;
        } else {
            return 0;
        }

    }

    function GetAll()
    {
        $q = "SELECT * ,(SELECT `name` FROM `category` WHERE `category_id`= d.category_id) as 'industry',
              (SELECT count(*) FROM `user` WHERE `group_id`= d.group_id) as 'member'
              FROM `$this->entity` d";
        $results = $this->db->query($q);
        return $results;
    }

    function GetById($id)
    {
        $q = "SELECT *  FROM `".$this->entity."` d WHERE  d.".$this->entityID." = '".$id."'";

        $results = $this->db->query($q);

        return $results;
    }

    function Delete($id)
    {

        $this->db->where($this->entityID, $id);
        if ($this->db->delete($this->entity))
        {
            return 1;

        } else {
            return 0;
        }
    }

  
}