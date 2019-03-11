<?php

class MContent extends CI_Model {

    var $entityType = 'News';

    function setEntity($val)
    {
        $this->entityType = $val;
    }

    function add($data)
    {
        if (isset($data['latitude']))
            $lat = $data['latitude'];
        else
            $lat = '';

        if (isset($data['longitude']))
            $lon = $data['longitude'];
        else
            $lon = '';

        if (isset($data['date']))
            $sts = strtotime($data['date']);
        else
            $sts = time();


        $arr = array (
            'image' => $data['image'],
            'type' => $this->entityType,
            'sts' => $sts,
            'mts' => time(),
            'order' => 0,
            'status' => 1,
            'tag' => str_replace(" ", "_", $data['seo_url']),
            'latitude' => $lat,
            'longitude' => $lon
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
                    'sub_title' => ($data['sub_title_' . $code]) ,
                    'short_desc' => ($data['short_desc_' . $code]) ,
                    'long_desc' => ($data['editor_' . $code]) ,
                    'meta_title' => ($data['meta_title_' . $code]) ,
                    'meta_keyword' => ($data['meta_keywords_' . $code]) ,
                    'meta_desc' => ($data['meta_desc_' . $code])
                );

                $this->db->insert('content_data', $arr);
            }
            return 1;
        }
        else
        {
            return 0;
        }


    }


    function edit($data)
    {

        if (isset($data['latitude']))
            $lat = $data['latitude'];
        else
            $lat = '';

        if (isset($data['longitude']))
            $lon = $data['longitude'];
        else
            $lon = '';

        if (isset($data['date']))
            $sts = strtotime($data['date']);
        else
            $sts = time();

        $arr = array (
            'mts' => time(),
            'sts' => $sts,
            'tag' => str_replace(" ", "_", $data['seo_url']),
            'latitude' => $lat,
            'longitude' => $lon,
            'tag' => str_replace(" ", "_", $data['seo_url'])
        );

        if (strlen($data['image']) > 1)
            $arr['image'] = $data['image'];

        $this->db->where('contentid', $data['id']);
        $this->db->update('content', $arr);



        foreach ($data['Languages'] as $lang)
        {
            $code = $lang->code;

            $arr = array(
                'title' => ($data['title_' . $code]) ,
                'sub_title' => ($data['sub_title_' . $code]) ,
                'short_desc' => ($data['short_desc_' . $code]) ,
                'long_desc' => ($data['editor_' . $code]) ,
                'meta_title' => ($data['meta_title_' . $code]) ,
                'meta_keyword' => ($data['meta_keywords_' . $code]) ,
                'meta_desc' => ($data['meta_desc_' . $code])
            );

            $this->db->where('cdid', $data['cd_id_' . $code]);
            $this->db->update('content_data', $arr);
        }

        return 1;

    }

    function view()
    {
        $q = "SELECT c.contentid cid, c.type, c.tag, c.sts, c.latitude, c.longitude, cd.cdid cdid, cd.contentid content_id, cd.languageid languageid, cd.title, cd.sub_title, cd.short_desc short_desc, cd.long_desc long_desc, cd.meta_title meta_title, cd.meta_desc meta_desc, cd.meta_keyword meta_keywords, c.image, l.code, c.pdf, c.show_image, c.show_slider, c.show_recent_news, cd.pdf_ids, cd.pdf_ids2, cd.year FROM content c ";
        $q .= "INNER JOIN content_data cd ON cd.contentid = c.contentid ";
        $q .= "INNER JOIN language l ON l.id = cd.languageid ";
        $q .= "WHERE c.type='". $this->entityType . "' ";
        $q .= "ORDER BY c.contentid DESC";
        $results = $this->db->query($q);
        return $results;
    }

    function viewById($id)
    {
        $q = "SELECT c.contentid cid, c.type, c.tag, c.sts, c.latitude, c.longitude, cd.cdid cdid, cd.contentid content_id, cd.languageid languageid, cd.title, cd.sub_title, cd.short_desc short_desc, cd.long_desc long_desc, cd.meta_title meta_title, cd.meta_desc meta_desc, cd.meta_keyword meta_keywords, c.image, l.code, c.pdf, c.show_image, c.show_slider, c.show_recent_news, cd.pdf_ids, cd.pdf_ids2, cd.year FROM content c ";
        $q .= "INNER JOIN content_data cd ON cd.contentid = c.contentid ";
        $q .= "INNER JOIN language l ON l.id = cd.languageid ";
        $q .= "WHERE c.contentid=" . $id;
        $results = $this->db->query($q);
        return $results;
    }

    function viewByTerm($term)
    {
        $q = "SELECT c.contentid cid, c.tag, c.sts, c.latitude, c.longitude, cd.cdid cdid, cd.contentid content_id, cd.languageid languageid, cd.title, cd.sub_title, cd.short_desc short_desc, cd.long_desc long_desc, cd.meta_title meta_title, cd.meta_desc meta_desc, cd.meta_keyword meta_keywords, c.image, l.code, c.pdf, c.show_image, c.show_slider, c.show_recent_news, cd.pdf_ids, cd.year,c.show_recent_news  FROM content c ";
        $q .= "INNER JOIN content_data cd ON cd.contentid = c.contentid ";
        $q .= "INNER JOIN language l ON l.id = cd.languageid ";
        $q .= "WHERE c.tag='" . $term."'";
        $results = $this->db->query($q);
        return $results;
    }


    function delete($id)
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

    function sort($ids)
    {
        $arr = explode(",", $ids);
        $num = 0;
        foreach ($arr as $item)
        {
            $this->db->where('id', $item);
            $this->db->update('content', array('sort_order' => $num++));
        }
    }

    function setStatus($id)
    {

        $q = "SELECT status FROM content WHERE contentid=" . $id;

        $results = $this->db->query($q);
        $results = $results->result();

        $val = 1;

        if ($results[0]->status == 1)
            $val = 0;

        $this->db->where('contentid', $id);
        if ($this->db->update('content', array('status' => $val)))
            return 1;
        else
            return 0;
    }
}