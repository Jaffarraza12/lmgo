<?php

class MLanguage extends CI_Model
{

    function getLanguages()
    {
        //TODO: Implement Caching later on languges section. Also apply sorting by sort_order..
        //$this->db->order_by("id", "desc");
        $query = $this->db->get("language");
        return $query;
    }


}