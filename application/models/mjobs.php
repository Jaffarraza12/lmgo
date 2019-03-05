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
		$arr['latitude'] =$data['lattude'] ;
		$arr['longitube'] = $data['lngtude'];
		
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
        $arr['latitude'] =$data['lattude'] ;
        $arr['longitube'] = $data['lngtude'];
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
		 $sql = " SELECT j.*,e.name  FROM `job` j INNER JOIN `employer` e ON j.`employer_id` = e.`employer_id` "; 
		 
		 
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

    function GetJobsForGrid($job_type = '',$per_page=0,$page_number=0){

        $this->db->select('job.job_id, job.title, job.job_type_id, job.country_id, job.city_id, job.category_id, job.employer_id,
						   job.latitude, job.longitube, job.sts, job.mts, job_type.job_type_id, job_type.name AS job_typ,
						   country.country_id, country.en_title AS country_name, city.city_id, city.en_title AS city_name,
						   employer.employer_id, employer.account_name AS employer_name, employer.logo');
        $this->db->from('job');
        $this->db->join('job_type', 'job_type.job_type_id = job.job_type_id', 'left');
        $this->db->join('country', 'country.country_id = job.country_id', 'left');
        $this->db->join('city', 'city.city_id = job.city_id', 'left');
        $this->db->join('employer', 'employer.employer_id = job.employer_id', 'left');
        if($job_type){
            $this->db->where_in("job.job_type_id",$job_type);
        }
        $this->db->order_by('job_id','DESC');
        //$this->db->limit();
        if($per_page){
            $this->db->limit($per_page,$page_number);
        }
        $query = $this->db->get();

        return $query ;


    }

    function do_search($field,$attr,$per_page=0,$page_number=0){
        // $this->output->enable_profiler(TRUE);


                $this->db->select('DISTINCT(job.job_id), job.title, job.job_type_id, job.country_id, job.city_id, job.category_id, job.employer_id,
                                       job.latitude, job.longitube, job.sts, job.mts, job_type.job_type_id, job_type.name AS job_typ,
                                       country.country_id, country.en_title AS country_name, city.city_id, city.en_title AS city_name,
                                       employer.employer_id, employer.account_name AS employer_name, employer.logo');
                $this->db->from('job');
                $this->db->join('job_type', 'job_type.job_type_id = job.job_type_id', 'inner');
                $this->db->join('country', 'country.country_id = job.country_id', 'inner');
                $this->db->join('city', 'city.city_id = job.city_id', 'inner');
                $this->db->join('category', 'category.category_id = job.category_id', 'inner');
                $this->db->join('employer', 'employer.employer_id = job.employer_id', 'inner');
                $this->db->join('job_attribute', 'job_attribute.job_id = job.job_id', 'inner');

                if($field['search_keywords']){
                    $this->db->like('job.title', $field['search_keywords']);
                }
                if($field['job_type_id']){
                    $this->db->where('job.job_type_id', $field['job_type_id']);
                }
                if($field['country_id']){
                    $this->db->where('country.country_id', $field['country_id']);
                }
                if($field['city_id']){
                    $this->db->where('city.city_id', $field['city_id']);
                }

                if($field['category_id']){
                    $this->db->where('category.category_id', $field['category_id']);
                }
                if($attr){

                    $this->db->where_in('job_attribute.attribute_option_id',$attr);

                }
        if($per_page){
            $this->db->limit($per_page,$page_number);
        }


        $query = $this->db->get();
       /* echo $this->db->last_query();
        exit();*/

        return  $query;

    }

    public function GetJobsCity($city,$per_page,$page_number){

        $this->db->select('DISTINCT(job.job_id), job.title, job.job_type_id, job.country_id, job.city_id, job.category_id, job.employer_id,
                                   job.latitude, job.longitube, job.sts, job.mts, job_type.job_type_id, job_type.name AS job_typ,
                                   country.country_id, country.en_title AS country_name, city.city_id, city.en_title AS city_name,
                                   employer.employer_id, employer.account_name AS employer_name, employer.logo');
        $this->db->from('job');
        $this->db->join('job_type', 'job_type.job_type_id = job.job_type_id', 'inner');
        $this->db->join('country', 'country.country_id = job.country_id', 'inner');
        $this->db->join('city', 'city.city_id = job.city_id', 'inner');
        $this->db->join('employer', 'employer.employer_id = job.employer_id', 'inner');
        $this->db->join('job_attribute', 'job_attribute.job_id = job.job_id', 'inner');

            $this->db->where('job_attribute.attribute_option_id',$this->getCity($city   ));


        $query = $this->db->get();
      // echo $this->db->last_query();



        return $query;
    }

    function GetJobsCordinate(){

        $this->db->select('job_id, latitude, longitube, title');
        $this->db->from('job');
        $this->db->order_by('job_id','DESC');
        $this->db->limit(10);

        $MapQuery = $this->db->get();


        return $MapQuery;

    }

    public function getCity($city){
        $query = $this->db->query('SELECT * FROM `attribute_option` WHERE attribute_id="7" AND name="'.$city.'"  ');

        $result =  $query->row();

        return $result->attribute_option_id;


    }
	

	
	
	
}