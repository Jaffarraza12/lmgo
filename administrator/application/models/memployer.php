<?php

class MEmployer extends CI_Model {

    function authenticate($data)
    {
        $rec = $this->db->get_where('administrator', array('name' => $data['username']));

        if (sizeof($rec->result()) > 0)
        {
            $user = $rec->result();
            if($user[0]->password == md5($data['password']))
                return $rec;
        }
        else
            return 0;
    }

    function addEmployer($data)
    {

        $arr = array();

        $arr['name'] = $data['name_eng'];
        $arr['account_name'] = $data['account_name_eng'];
        $arr['account_description'] = $data['account_description_eng'];
        $arr['description'] = $data['description_eng'];
        $arr['email'] = $data['email'];
        $arr['logo'] = $data['logo'];
        $arr['password'] = md5($data['password']);
        $arr['account_phone'] = $data['contact'];
        $arr['sts'] = time() ;
        $arr['mts'] = time();


        $this->db->insert('employer', $arr);
        $employer_id = $this->db->insert_id();

        return $employer_id;
    }

    function editEmployer($data)
    {

        $arr = array();

        $arr['name'] = $data['name_eng'];
        $arr['account_name'] = $data['account_name_eng'];
        $arr['account_description'] = $data['account_description_eng'];
        $arr['description'] = $data['description_eng'];
        $arr['email'] = $data['email'];
        $arr['mts'] = time();
        if($data['password']){
            $arr['password'] = md5($data['password']);
        }
        if($data['logo']) {
            $arr['logo'] = $data['logo'];
        }

        $arr['account_phone'] = $data['account_phone'];

        $this->db->where('employer_id', $data['employer_id']);
        $this->db->update('employer', $arr);

        return 1;
    }


    function feeds()
    {
		$this->db->order_by("sts", "desc");
        $rec = $this->db->get('feeds', 50);
        return $rec;
    }

    function updatePass($data)
    {
        $userId = $this->session->userdata('userId');
        $rec = $this->db->get_where('administrator', array('id' => $userId));

        if (sizeof($rec->result()) > 0)
        {
            $user = $rec->result();
            if($user[0]->password == md5($data['old_password']))
            {
                $this->db->where('id', $userId);
                $this->db->update('administrator', array('password'=> md5($data['new_password'])));
                return 1;
            }
            else
                return -1;
        }
        else
            return 0;
    }
	
	function viewsetting()
    {
        $q = "SELECT * FROM `setting` WHERE  id = '1' ";
        $query = $this->db->query($q);
        return $query->row();
    }
	
	function updatesetting($data)
    {
              
		$this->db->where('id', 1);
		$this->db->update('setting',$data);
		return 1;
       
    }
	
	function GetAll()
	{
		$q = " SELECT * , (SELECT count(*) from `job` WHERE employer_id = e.employer_id ) as 'job' FROM `employer` e ";
        $results = $this->db->query($q);
		return $results;
	}
	
	function GetbyId($id)
	{
        $q = " SELECT * , (SELECT count(*) from `job` WHERE employer_id = e.employer_id ) as 'job' FROM `employer` e WHERE e.employer_id =$id ";
        $results = $this->db->query($q);
        return $results;

    }
	
	
	function userField($id,$f){
		$q = " SELECT $f FROM `users` WHERE  userid='$id' ";
        $results = $this->db->query($q);
		$r= $results->row();
		return $r->$f;
	}
	
	function DeleteUserbyID($id)
	{
		
		if($id){
			$this->db->where("userid",$id);
			$this->db->delete("users");	
			
			$this->db->where("userid",$id);
			$this->db->delete("user_wishlist");
			
			$this->db->where("userid",$id);
			$this->db->delete("user_watchlist");
			
			return 1;
		} else {
			return 0;	
		}
		
		
	}
	
	public function UpdateUserlimit($data,$userid){
		
		$this->db->where('userid', $userid);
       if( $this->db->update('users', $data ) )
	   {
		    return 1;
	   } else {
		    return 0;   
	   }
	}
	
	

}

?>