<?php

class MMenu extends CI_Model {

    var $entityType = 'menu_item';
    var $entityId = 'group_id';

    function add($data)
    {
        $id = 0;
        foreach($data as $row){
            $d = array(
                'title' =>$row['title'],
                'link' => $row['link'],
                'code' => $row['code']
            );
            $this->db->insert($this->entityType, $d);
            $insertId = $this->db->insert_id();
            if($id == 0){
                $id = $insertId;
            }
            $a = array('group_id'=> $id);
            $this->db->where('id',$insertId);
            $this->db->update($this->entityType,$a);
        }


    }

    function edit($data,$id)
    {
        $this->db->where('group_id',$id);
        $this->db->where('code',$data['code']);
        $this->db->update($this->entityType,$data);

    }

    function view()
    {
        $sql = $this->db->query('SELECT * FROM '.$this->entityType);
        return $sql;
    }

    function viewById($id)
    {
        $sql = $this->db->query('SELECT * FROM '.$this->entityType .' WHERE  '.$this->entityId.'="'.$id.'"' );
        return $sql;

    }
    function viewByType($type,$value)
    {
        $sql = $this->db->query('SELECT * FROM '.$this->entityType .' WHERE '.$type.' = "'.$value.'"');
        return $sql;
    }

    function delete($id)
    {
        $this->MContent->setEntity($this->entityType);
        return $this->MContent->delete($id);
    }

    function setStatus($id)
    {
        $this->MContent->setEntity($this->entityType);
        return $this->MContent->setStatus($id);
    }
}