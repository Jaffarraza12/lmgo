<?php

class MSetting extends CI_Model {

    var $entity = 'setting';
    var $entityID = 'id';
    var $key = 'key';


    function add($data)
    {


        if ($this->db->insert($this->entity, $data))
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


        $this->db->where($this->entityID,$id);
        if($this->db->update($this->entity, $data)){
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

    function GetByKey($code,$key)
    {
        $q = "SELECT *  FROM `".$this->entity."` d WHERE  d.".$this->key." = '".$key."' AND code = '".$code."'";

        $results = $this->db->query($q);

        return $results;
    }



  
}