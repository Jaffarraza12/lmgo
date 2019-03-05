<?php

class MMenu extends CI_Model {

    var $entityType = 'menu_item';

    function add($data)
    {
       return  $this->db->insert($this->entityType,$data);;
    }

    function edit($data)
    {
        $this->MContent->setEntity($this->entityType);
        return $this->MContent->edit($data);
    }

    function view()
    {
        $sql = $this->db->query('SELECT * FROM '.$this->entityType);
        return $sql;
    }

    function viewById($id)
    {
        $this->MContent->setEntity($this->entityType);
        return $this->MContent->viewById($id);
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