<?php

class MCareer extends CI_Model {

    var $entityType = 'career';

    function addCareer($data)
    {

        $arr = array (
            'image' => '',
            'type' => $this->entityType,
            'sts' => time(),
            'mts' => time(),
            'order' => 0,
            'status' => 1,
            'tag' => '',
            'latitude' => 0,
            'longitude' => 0
        );

        if ($this->db->insert('content', $arr))
        {
            $insertId = $this->db->insert_id();
            foreach ($data['Languages'] as $lang)
            {
                $code = $lang->code;

                $arr = array(
                    'contentid' => $insertId,
                    'languageid' => $lang->id,
                    'title' => ($data['title_' . $code]) ,
                    'short_desc' => '',
                    'long_desc' => $data['long_desc_' . $code] ,
                    'meta_title' => '',
                    'meta_keyword' => '',
                    'meta_desc' => ''
                );

                $this->db->insert('content_data', $arr);
            }
            return "New Career Added Successfully";
        }
        else
        {
            return "Error occured while adding new Career";
        }


    }


    function editCareer($data)
    {

        foreach ($data['Languages'] as $lang)
        {
            $code = $lang->code;

            $arr = array(
                'title' => $data['title_' . $code] ,
                'long_desc' => $data['long_desc_' . $code] ,
            );

            $this->db->where('cdid', $data['cd_id_' . $code]);
            $this->db->update('content_data', $arr);
        }

        return "Record Updated Successfully.";

    }

    function view()
    {
        $q = "SELECT c.contentid cid, cd.cdid cdid, cd.contentid content_id, cd.languageid languageid, cd.title, cd.long_desc long_desc, l.code FROM content c ";
        $q .= "INNER JOIN content_data cd ON cd.contentid = c.contentid ";
        $q .= "INNER JOIN languages l ON l.id = cd.languageid ";
        $q .= "WHERE c.type='". $this->entityType . "'";
        $results = $this->db->query($q);
        return $results;
    }

    function viewWhyById($id)
    {
        $q = "SELECT c.contentid cid, cd.cdid cdid, cd.contentid content_id, cd.languageid languageid, cd.title, cd.short_desc short_desc, cd.long_desc long_desc, cd.meta_title meta_title, cd.meta_desc meta_desc, cd.meta_keyword meta_keywords, l.code FROM content c ";
        $q .= "INNER JOIN content_data cd ON cd.contentid = c.contentid ";
        $q .= "INNER JOIN languages l ON l.id = cd.languageid ";
        $q .= "WHERE c.type='". $this->entityType . "' AND c.contentid=" . $id;
        $results = $this->db->query($q);
        return $results;
    }

    function deleteWhy($id)
    {
        $this->db->where('contentid', $id);
        if ($this->db->delete('content'))
        {
            $this->db->where('contentid', $id);
            if ($this->db->delete('content_data') > 0)
                return 1;
            else
                return 0;
        }
        else
            return 0;
    }

    function viewResume()
    {
        $q = "SELECT * FROM career WHERE `delete` = 'NO' ORDER BY id DESC ";
        $results = $this->db->query($q);
        return $results;
    }

    function deleteResume($id)
    {
        $this->db->where('id', $id);
        if ($this->db->update('career', array('delete' => 'YES')))
            return 1;
        else
            return 0;
    }
}