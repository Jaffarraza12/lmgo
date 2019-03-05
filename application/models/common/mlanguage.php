<?php

class MLanguage extends CI_Model
{

    function getLanguages()
    {
        //TODO: Implement Caching later on languges section. Also apply sorting by sort_order..
        $query = $this->db->get("language");
        return $query;
    }


}