<?php

class MVideos extends CI_Model {

    var $entityType = 'videos';

    function addVideos($data)
    {
        $data['sts'] = 'NOW()';
        $this->db->insert($this->entityType, $data);
        return 1;
    }

    function editVideos($data,$id)
    {
        $data['mts'] = 'NOW()';
        $this->db->where('id', $data['id']);
        $this->db->update($this->entityType, $data);
        return 1;
    }

    function view()
    {
        $q = "SELECT * FROM `".$this->entityType."` v ";
        $results = $this->db->query($q);
        return $results;
    }

    function viewById($id)
    {
        $q = "SELECT * FROM `" . $this->entityType . "` WHERE id = '".$id."' ";
        $results = $this->db->query($q);
        return $results;
    }

    function deleteVideos($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->entityType);
        return 1;
    }

    function setStatus($id)
    {
        $this->MContent->setEntity($this->entityType);
        return $this->MContent->setStatus($id);
    }
}