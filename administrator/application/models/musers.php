<?php

class MUsers extends CI_Model {

    function authenticate($data)
    {
        $rec = $this->db->get_where('administrator', array('username' => $data['username']));

        if (sizeof($rec->result()) > 0)
        {
            $user = $rec->result();
            if($user[0]->password == md5($data['password']))
                return $rec;
        }
        else
            return 0;
    }

    function feeds()
    {
		$this->db->order_by("sts", "desc");
        $rec = $this->db->get('feeds', 50);
        return $rec;
    }

    function updatePass($data)
    {
       // print_r($this->session);
        $user_id = $this->session->userdata('adminId');

        $rec = $this->db->get_where('administrator', array('admin_id' => $user_id));

        if (sizeof($rec->result()) > 0)
        {
            $user = $rec->result();
            if($user[0]->password == md5($data['old_password']))
            {
                $this->db->where('admin_id', $user_id);
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
	
	function getUsers()
	{
		$q = " SELECT u.* ,
                (SELECT `name` FROM `category` WHERE  `category_id` = ud.category_id) as 'industry',
                (SELECT `group_name` FROM `group` WHERE  `group_id` = u.group_id) as 'group' FROM `user` u
                INNER JOIN  `user_detail` ud ON u.user_id = ud.user_id ";
        $results = $this->db->query($q);
		return $results;
	}
	
	function getUserbyID($id)
	{
		$q = " SELECT u.*,ud.*,(SELECT `en_title` FROM `country` WHERE  `country_id` = ud.country_id) as 'country',

               (SELECT `name` FROM `category` WHERE  `category_id` = ud.category_id) as 'industry' FROM `user` u

              INNER JOIN  `user_detail` ud ON u.user_id = ud.user_id WHERE u.`user_id` = '".$id."' ";

        $results = $this->db->query($q);
		return $results;
	}
	
	
	function UserFile($id,$type){
		$q = " SELECT * FROM `user_file` WHERE  user_id='$id' AND `type`='".$type."' ";
        $results = $this->db->query($q);
		$r= $results->row();
		return $r->file;
	}
	
	function DeleteUserbyID($id)
	{
		
		if($id){
			$this->db->where("user_id",$id);
			$this->db->delete("user");

			
			return 1;
		} else {
			return 0;	
		}
		
		
	}
	
	public function UpdateUserlimit($data,$userid){

		
		$this->db->where('user_id', $userid);
       if( $this->db->update('user', $data ) )
	   {
		    return 1;
	   } else {
		    return 0;   
	   }
	}
	
	

}

?>