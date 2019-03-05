<?php

class MJobs extends CI_Model {

   	function AddJob($data,$attributes)
	{
		$arr['title'] = $data['title_eng'];
		$arr['description'] = $data['description_eng'];
		$arr['country_id'] = $data['country_id'];
		$arr['city_id'] = $data['city_id'];
		$arr['category_id'] = $data['category_id'];
		$arr['job_type_id'] = $data['job_type_id'];
		$arr['employer_id'] = $data['employer_id'];
		$arr['sts'] = time();
		$arr['mts'] = time();
		$arr['latitude'] =$data['latitude'] ;
		$arr['longitube'] = $data['longitude'];
		
		$this->db->insert("job",$arr);
		
		$job_id = $this->db->insert_id();
		$this->load->model('MAttribute');
		
		if($attributes)
		{
			
			foreach($attributes as $key => $val){
				
				$attribute=$this->MAttribute->AttributebyID($key)->row();
				
				$arr2['job_id'] = $job_id;
				$arr2['attribute_id'] = $key;
				
				if($attribute->type == 'SELECT') {
					$arr2['attribute_option_id'] = $val;
					$arr2['value'] = $this->GetOptionValue($val);
				} else {
					$arr2['attribute_option_id'] = 0;
					$arr2['value'] = $val;
						
				}
				$this->db->insert("job_attribute",$arr2);
		
			}
			
		}
		return 1;

	}
	
	function DeleteJob($id)
	{
		$job_id = $id;
	
        $this->db->where('job_id',$job_id);
        if($this->db->delete('job')) {
            return 1;
        }
	}

	
	function EditJob($data,$attributes)
	{

        $arr['title'] = $data['title_eng'];
        $arr['description'] = $data['description_eng'];
        $arr['country_id'] = $data['country_id'];
        $arr['city_id'] = $data['city_id'];
        $arr['category_id'] = $data['category_id'];
        $arr['job_type_id'] = $data['job_type_id'];
        $arr['employer_id'] = $data['employer_id'];
        $arr['sts'] = time();
        $arr['mts'] = time();
        $arr['latitude'] =$data['latitude'] ;
        $arr['longitube'] = $data['longitude'];
        $job_id = $data['job_id'];

        $this->db->where("job_id",$job_id);
        $this->db->update("job",$arr);


        $this->load->model('MAttribute');

        if($attributes)
        {
            $this->db->where('job_id',$job_id);
            $this->db->delete("job_attribute");


            foreach($attributes as $key => $val){
                $attribute=$this->MAttribute->AttributebyID($key)->row();
                $arr2['job_id'] = $job_id;
                $arr2['attribute_id'] = $key;

                if($attribute->type == 'SELECT') {
                    $arr2['attribute_option_id'] = $val;
                    $arr2['value'] = $this->GetOptionValue($val);
                } else {
                    $arr2['attribute_option_id'] = 0;
                    $arr2['value'] = $val;
                }
                $this->db->insert("job_attribute",$arr2);

            }

        }
        return 1;
		
	}
	
	function GetOptionValue($attribute_option_id){
		
		$sql= " SELECT  * from `attribute_option` where `attribute_option_id` = '".$attribute_option_id."'";
		$dataset = $this->db->query($sql);
		$row = $dataset->row();

		
		return $row->name; 
	
	}
	
	function IncrementJobView($id)
	{
		$sql =  " UPDATE `advertise` set views = views+ 1  WHERE advertiseid = '".$id."' ";
		$this->db->query($sql);
	}


	
	function ReportSpam($data){
		
		$arr['userid'] = $data['userid'];	
		$arr['advertiseid'] = $data['advertiseid'];
		$arr['message'] = $data['message'];
		$arr['type'] = $data['type'];
		$arr['email'] = $data['email'];
		
		
		$this->db->insert('advertise_spam',$arr);
	}
	

    public function GetJob($job_id)
    {
        $sql = " SELECT  * from `job` WHERE  `job_id` = '".$job_id."' ";

        $result  =  $this->db->query($sql);

		return $result;

    }

    public function GetJobAttribute($job_id){
        $sql = " SELECT  * from `job_attribute` WHERE  `job_id` = '".$job_id."' ";

        $result  =  $this->db->query($sql);

        return $result;

    }



	public function getAllJobs($page,$perpage,$limitquery=0,$employer_id=0)
	{
		 $sql = " SELECT j.*,e.account_name  FROM `job` j INNER JOIN `employer` e ON j.`employer_id` = e.`employer_id` ";
		 
		 
		 if($employer_id)
		 {	
			$sql .= " WHERE e.`employer_id` = '".$employer_id."'  ";
			 
		 }	
		 
		 $sql .= " ORDER BY  `job_id` DESC   ";	
		
		if($limitquery){
			return $sql;
			exit(0);	
		}
		
		if($page != 0)
		{
			$page = $page - 1; 	
		}
		$start = $page * $perpage;
		$sql .= " LIMIT ".$start.",".$perpage;
		
		
		 $result =  $this->db->query($sql);
		 
		 return $result;
	}
	
	public function getExpireJobs($page,$perpage,$limitquery=0,$userid=0)
	{
		
		$mktime = mktime(date('H'),date('i'),date('s'),date('m'),date('d')-60,date('Y'));
		
		$sql = " SELECT a.*,u.email,an.notification FROM `advertise` a INNER JOIN `categories` c ON a.`catid` = c.`catid` INNER JOIN `users` u ON u.`userid` = a.`userid` INNER JOIN  `advertise_notification` an ON a.`advertiseid` = an.`advertiseid` WHERE a.mts < '".$mktime."'  AND u.userid!=146 AND u.userid!=106 AND u.userid!=106 AND u.userid!=18 AND u.userid!=20 AND u.userid!=88 AND u.userid!=27 AND  u.userid!=31 ORDER BY a.advertiseid desc "; 
		
		
		if($limitquery){
			return $sql;
			exit(0);	
		}
		
		if($page != 0)
		{
			$page = $page - 1; 	
		}
		$start = $page * $perpage;
		$sql .= " LIMIT ".$start.",".$perpage;
		
		
		 $result =  $this->db->query($sql);
		 
		 return $result;
	}
	
	public function GetJobsForSchedule(){
		$mktime = mktime(date('H'),date('i'),date('s'),date('m'),date('d')-60,date('Y'));
		$sql = " SELECT a.*,u.email,an.notification FROM `advertise` a INNER JOIN `categories` c ON a.`catid` = c.`catid` INNER JOIN `users` u ON u.`userid` = a.`userid` INNER JOIN  `advertise_notification` an ON a.`advertiseid` = an.`advertiseid` WHERE a.mts < '".$mktime."'  AND u.userid!=146 AND u.userid!=106 AND u.userid!=106 AND u.userid!=18 AND u.userid!=20 AND u.userid!=88 AND u.userid!=27 AND  u.userid!=31 AND an.notification > 0 ORDER BY an.mts limit 20 "; 
		
		$result =  $this->db->query($sql);
		 
		return $result;
		
	}
	
	
	public function UpdateStatus($data,$status){
		
		$arr = array(
				'status' => $status
		);
		
		foreach($data as $adverid):
			$this->db->where('advertiseid',$adverid);
			$update = $this->db->update('advertise',$arr);	
		endforeach;
		
		return  $update;
		
	}
	
	function prepareEmailCon($message,$name,$rep_name=''){
		
		$html= '<table width="640" border="0" align="center" cellspacing="0" cellpadding="0" style="border:2px solid #78dcdc;border-radius:4px; -moz-box-shadow:    inset 0 0 10px #CCCCCC; -webkit-box-shadow: inset 0 0 10px #CCCCCC;box-shadow:inset 0 0 10px #CCCCCC;"> <tr><td align="center" colspan="2"><a href="#"><img src="http://www.dubazaaro.com/assets/images/logo.png" width="255" height="65" alt="Dubazaaro.com" /></a></td>  </tr>
  <tr><td width="15">&nbsp;</td><td width="610"><h3 style="font-family:Arial;text-align:justify;">Hello '.$name.'!</h2></td><td width="15">&nbsp;</td></tr><tr><td>&nbsp;</td><td><p style="font-family:Arial;text-align:justify;">'.$message.'</td> <td>&nbsp;</td> </tr>';
  	if($rep_name)
	{
   		$html .= '<tr><td>&nbsp;</td>
    <td><p style="font-family:Arial, Helvetica, sans-serif;text-align:justify;">The below Message has been sent to you by  '.$rep_name.'</p></td> <td>&nbsp;</td></tr>';
	}
		$html .= '<tr><td>&nbsp;</td><td align="center" ><center><img src="http://www.dubazaaro.com/assets/images/dubazaaro-thanks.png" width="auto" height="auto" alt="shukran" /></center></td><td>&nbsp;</td></tr></table>';

	return $html;
	
	
	
	}
	

	
	
	
}