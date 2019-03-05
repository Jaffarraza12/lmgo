<?php

class MTeam extends CI_Model {

    function addTeam($data)
    {
        $imageId = $this->MUtils->saveImagePath($data['image']);


        $arr = array (
            'image' => $imageId,
            'sts' => time()
        );

        if ($this->db->insert('team', $arr))
        {
            $insertId = $this->db->insert_id();
            foreach ($data['Languages'] as $lang)
            {
                $code = $lang->code;

                $arr = array(
                    'team_id' => $insertId,
                    'language_id' => $lang->id,
                    'title' => "" ,
                    'position' => "" ,
                    'mts' => time()
                );

                $this->db->insert('team_data', $arr);
            }
            return $insertId;
        }
        else
        {
            return 0;
        }

    }

    function editTeam($data)
    {
        print_r($data);

        $smallImageId = 0;
        if (isset($data['smallImage']))
        {
            if (strlen($data['smallImage']) > 0)
                $smallImageId = $this->MUtils->saveImagePath($data['smallImage']);
        }

        if ($smallImageId > 0)
        {

            $arr = array (
                'image' => $smallImageId
            );

            print_r($arr);
            echo "tid : " . $data['tid'];
            $this->db->where('id', $data['tid']);
            $this->db->update('team', $arr);
        }



        foreach ($data['Languages'] as $lang)
        {
            $code = $lang->code;

            $arr = array(
                'title' => $data['title_' . $code],
                'position' => $data['position_' . $code],
                'mts' => time()
            );


            $this->db->where('id', $data['td_id_' . $code]);
            $this->db->update('team_data', $arr);
        }

        return 1;

    }

    function loadAllData()
    {
        $q = "SELECT t.id tid, m.image, td.id tdid, td.language_id, l.code, td.title, td.position FROM team t ";
        $q .= "INNER JOIN media m ON m.id = t.image ";
        $q .= "INNER JOIN team_data td ON td.team_id = t.id ";
        $q .= "INNER JOIN languages l ON l.id = td.language_id ";
        $q .= " WHERE td.language_id = " . $this->MUtils->getDefaultLanguage();
        $q .= " ORDER BY t.sort_order ASC";
        $results = $this->db->query($q);
        return $results;
    }

    function loadWorkById($id)
    {
        $q = "SELECT t.id tid, m.image, td.id tdid, td.language_id, l.code, td.title, td.position FROM team t ";
        $q .= "INNER JOIN media m ON m.id = t.image ";
        $q .= "INNER JOIN team_data td ON td.team_id = t.id ";
        $q .= "INNER JOIN languages l ON l.id = td.language_id ";
        $q .= " WHERE t.id = " . $id;
        $results = $this->db->query($q);
        return $results;
    }


    function loadImages()
    {
        $q = "SELECT t.id tid, m.image FROM team t ";
        $q .= "INNER JOIN media m ON m.id = t.image";
        $q .= " ORDER BY t.sort_order ASC";
        $results = $this->db->query($q);
        return $results;
    }


    function deleteWork($id)
    {
        $this->db->where('id', $id);
        if ($this->db->delete('team'))
        {
            $this->db->where('team_id', $id);
            if ($this->db->delete('team_data') > 0)
                return 1;
            else
                return 0;
        }
        else
            return 0;
    }

    function sortTeam($ids)
    {
        $arr = explode(",", $ids);
        $num = 0;
        foreach ($arr as $item)
        {
            $this->db->where('id', $item);
            $this->db->update('team', array('sort_order' => $num++));
        }
    }
}