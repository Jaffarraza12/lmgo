<?php

class MConfig extends CI_Model {

    function saveValue($data, $key)
    {
        $rec = $this->db->get_where('config', array('key' => $key));


        if (sizeof($rec->result())==0)
        {
            $arr = array(
                'key' => $key,
                //'value' => mysql_real_escape_string($this->$data)
                'value' => str_replace("&", "&amp;", $data)
            );

            if ($this->db->insert('config', $arr))
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
        else
        {
            $arr = array(
                //'value' => mysql_real_escape_string($data)
                'value' => str_replace("&", "&amp;", $data)
            );

            $this->db->where('key', $key);
            if ($this->db->update('config', $arr))
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

    }

    function getValue($key)
    {
        
		
		$rec = $this->db->query("SELECT * FROM `config` WHERE `key` = '".$key."'");
        $obj = $rec->result();
		
		
		$arr = $this->MUtils->xml2array($obj[0]->value);

        while (list($key, $value) = each($arr['data']))
        {
            if (is_array($value))
            {
                $arr['data'][$key] = "";
            }
        }

        return $arr;

    }
}