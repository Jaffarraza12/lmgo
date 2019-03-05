<?php

class MContact extends CI_Model {


    function viewContact()
    {
        $q = "SELECT * FROM contact WHERE `delete` = 'NO' ORDER BY id DESC ";
        $results = $this->db->query($q);
        return $results;
    }

    function deleteContact($id)
    {
        $this->db->where('id', $id);
        if ($this->db->update('contact', array('delete' => 'YES')))
            return 1;
        else
            return 0;
    }

    function updateContact($id)
    {
        $this->db->where('id', $id);
        if ($this->db->update('contact', array('status' => 'READ')))
            return 1;
        else
            return 0;
    }

    function unread($id)
    {
        $this->db->where('id', $id);
        if ($this->db->update('contact', array('status' => 'UNREAD')))
            return 1;
        else
            return 0;
    }



 }