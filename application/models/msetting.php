<?php

class Msetting extends CI_Model {
    var $table = "setting";
    var $id = "id";
    var $entity = 'setting';
    var $entityID = 'id';
    var $key = 'key';
	
	public function getAll()
    {

	   $sql = " SELECT * from ".$this->table." ";
	   
	   $result = $this->db->query($sql);
	   
	   return $result->rows;

    }

    public function delete($id)
    {

        $sql = " DELETE  from '".$this->table."' WHERE ".$this->id." = '".$id."'";

        $result = $this->db->query($sql);

        return $result->rows;

    }


    public function increment(){
        $sql = " SELECT * from ".$this->table." ";

        $result = $this->db->query($sql);
        $r =  $result->row();

        $arr = array();
        $arr['value'] =$r->value +1;
        $this->db->where('key', 'visitor');
        $this->db->update("setting",$arr);
    }

    public function getbyKey($key){
        $sql = " SELECT * from ".$this->table." WHERE `key` = '".$key."' ";

        $result = $this->db->query($sql);

        $r =  $result->row();

        return $r->value;
    }

    function GetByKeyCode($code,$key)
    {
        $q = "SELECT *  FROM `".$this->entity."` d WHERE  d.".$this->key." = '".$key."' AND code = '".$code."'";

        $results = $this->db->query($q);

        return $results;
    }



    }