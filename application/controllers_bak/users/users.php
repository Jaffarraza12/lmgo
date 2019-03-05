<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Users extends CI_Controller {



	 public function __construct() {

        parent::__construct();      

		$this->lang->load("common/home",$this->session->userdata("language"));

        $this->lang->load("common/register",$this->session->userdata("language"));

		$userid=intval($this->session->userdata('userId'));

		

	

    }

	

	public function updatePassword(){

		

		

		if($this->input->post('command')=='changePass'){

			$c=addslashes($this->input->post('c'));

			$fcode=addslashes($this->input->post('fcode'));

			$fcode=addslashes($fcode);

			$r=$this->db->query("select * from users where actcode='$fcode'");

			if($r->num_rows()>0){	

				$row=$r->row();

				$cemail=md5($row->email."%dubaz@");

				if($cemail==$c){

					 $ac=md5(time());

					 $password=md5($this->input->post('password'));

					$this->db->query("update users set actcode='$ac',password='$password' where userid=".$row->userid);

					$this->session->set_userdata('msgChangePass', $this->lang->line('txt_changeP'));

					redirect("users/users/Register");

				}

			}

		}else{

	

			redirect(base_url()."signup/");

		}

			$this->Register($data);

	}

	

	public function forgotPassword(){

		

		if($this->input->post('command')=='forgot'){

			$this->load->library('email');

			$email = $this->input->post('email');

			$email=trim(addslashes($email));

			$query=$this->db->query("select * from users where email='$email'");

			$data['erForgot']="";

			$data['info_information'] = $this->MPages->viewpagelist('Information')->result();

			$data['info_category'] = $this->MPages->viewpagelist('Categories')->result();

		

		

			if($query->num_rows()>0){	

				$row=$query->row();



				$actcode=md5(time()."@#4");

				$this->db->query("update users set actcode='$actcode' where userid=".$row->userid);

				

				$em=md5($row->email."%dubaz@");

				 $m="For changing your password click on the bellow link.<br /><br />".base_url()."index.php/users/users/changePassword?fcode=$actcode&c=$em ";

				

				$toname=$row->firstname ." ".$row->lastname;

				//$body=getMessage(33);

				$body=$m;

				$ok=true;

				

				$conf['protocol'] = 'mail';

				$conf['charset'] = 'iso-8859-1';

				$conf['wordwrap'] = TRUE;

				

				$this->email->initialize($conf);



				$this->email->from("info@dubazaaro.com", "Dubazaaro Admin");

				$this->email->to($row->email);



				$this->email->subject("Forgot Password");



				$this->email->message($m);



				if($this->email->send())

					$data['erLogin']=$this->lang->line('txt_checkMail');

				else

					$data['erForgot']= $this->lang->line('txt_someError');

				

			}else{

				 $data['erForgot']=$this->lang->line('txt_email_notfound');

			}

			

		}else{

			redirect(base_url()."signup/");

		}

			$this->Register($data);

	}

	

	public function loginWithFB(){

	

		

	}

	

	public function Register($data='')
	{	
		$this->load->helper("productview");
		
		$this->load->model('mcategories');
		$this->load->model("mcountrycity");

		$proview = new ProductView();
		
		
		
		if($this->session->userdata('userId'))
		redirect(base_url()."dashboard/");
		
		$data['refer'] = $this->input->post('refer');

		if($data==''){
			$data['erForgot']="";
		}

		$data['categories']= $this->mcategories->MainCategories()->result();
		$data['categoryarranged'] = $this->mcategories->Categoryarrange();
		$data['categoryarrangedcount'] = $this->mcategories->categoryarrangecount();
		$data['info_information'] = $this->MPages->viewpagelist('Information')->result();
		$data['info_category'] = $this->MPages->viewpagelist('Categories')->result();
		$data['erLogin']=$this->session->userdata('msgChangePass');
		$this->session->unset_userdata('msgChangePass');

		$data['erstatus']="";
		$data['firstname'] = $this->input->post('firstname');
		$data['lastname'] = $this->input->post('lastname');
		$data['password'] = md5($this->input->post('password'));
		$data['email'] = $this->input->post('email');
		$data['cemail'] = $this->input->post('cemail');
		$data['country'] = $this->input->post('country');
		$data['dob'] = date('Y-m-d',strtotime($this->input->post('dob')));
		$data['gender'] = $this->input->post('gender');
		$data['contact'] = $this->input->post('contact');

		if($this->input->post('command')=='register') {

			$this->load->model("MUsers");
			$status = "";
			$data['erstatus']="";
			if($this->MUsers->checkField("email",$data['email']))
				$status=1;
			else
				$data['erstatus']=$this->lang->line('email_error');

			if($status==1)

				if($this->MUsers->register($data)){
				$conf['useragent'] = 'Dubazaaro.com';
				$conf['protocol'] = 'smtp';
				$conf['smtp_host'] = 'mail.dubazaaro.com';
				$conf['smtp_user'] = 'info@dubazaaro.com';
				$conf['smtp_pass'] = 'Info963';
				$conf['smtp_port'] = '25';
				$conf['mailtype'] = 'html';
				$conf['charset'] = 'iso-8859-1';
				$conf['wordwrap'] = TRUE;
				
				$this->email->initialize($conf);
	
				$this->email->from('info@dubazaaro.com', 'Dubazaaro.com');
				$this->email->to( $this->input->post('email') );
				$this->email->reply_to('info@dubazaaro.com');
				$message = 'Welcome to dubazaaro.com <br />
				<p>Founded in 2014, dubazaaro.com is an online marketplace that enables and connect people in the UAE to buy, sell or swap their resources with no barriers. dubazaao.com connect people to resources. dubazaao.com website enables you to Buy, Sell or Swap anything online pre-loved things, talents and time, or to share your rarely used stuff. And it doesn`t STOP We love to help people with their needs; Our Directory and Deals sections connect people and community with their utmost local needs. </p>';
				
				$this->email->subject('Welcome to Dubazaaro.com');
				$this->email->message($proview->prepareEmailCon($message,$this->input->post('firstname'),$this->input->post('name')));
				
				
				if(!$this->email->send()){
					//$data['erstatus'] = $this->email->print_debugger();	
				}	
				$data['firstname'] ="";
				$data['lastname'] ="";
				$data['password'] = "";
				$data['email'] = $this->input->post('email');
				$data['cemail'] = "";
				$data['country'] = "";
				$data['dob'] = "";
				$data['gender'] ="";	
				$data['contact'] = "";
				$data['successMsg'] = 'Congragulation you are register successfull please proceed to login';
				}
		}
		/****** Login ******/
		if($this->input->post('command')=='login') {

			$data['email'] = $this->MUtils->DbPrepare($this->input->post('email'));
			$data['password'] = md5($this->MUtils->DbPrepare($this->input->post('password')));
				
				if($data['email']!='' && $data['password']!=''){

				 $this->load->model("MUsers");
				 $userInfo = $this->MUsers->authenticate($data);
				 if ($userInfo){
					$this->session->set_userdata('userId', $userInfo->userid);
					$this->session->set_userdata('email', $userInfo->email);
					$this->session->set_userdata('logged_in', "true");
						redirect($this->input->post('refer'));
				}else{
					$data['erLogin']=$this->lang->line('txt_loginAfter');	
					$data['err_refer'] = $this->input->post('refer');
				}
			}else{

				$data['erLogin']=$this->lang->line('txt_loginEr');
				$data['err_refer'] = $this->input->post('refer');

			}

		}
		foreach($GLOBALS['language'] as $key=>$val):

		   $data[$key] = $val;

		endforeach;
		
        $data['countries'] = $this->mcountrycity->getCountries()->result_array();

		$template = array(
			'common/header',
			'users/register',
			'common/footer',
		);
		$config = new Config();
		$data ['config'] = $config;	
		$config->render($template,$data);

	}

	

	public function changePassword($data='')

	{	



		$data['erLogin']="";

		$data['c'] = addslashes($this->input->get('c'));

		$data['fcode'] = addslashes($this->input->get('fcode'));

		$data['info_information'] = $this->MPages->viewpagelist('Information')->result();

		$data['info_category'] = $this->MPages->viewpagelist('Categories')->result();

		$this->load->model('MCategories');

		$data['categories']= $this->MCategories->MainCategories()->result();

		$data['categoryarranged'] = $this->MCategories->Categoryarrange();
		$data['categoryarrangedcount'] = $this->MCategories->categoryarrangecount();
		

		



		if($data['c']=='' && $data['fcode']=='')

			redirect(base_url()."signup/");

	

		$query=$this->db->query("select * from users where actcode='".$data['fcode']."'");

		if($query->num_rows()>0){	

			$row=$query->row();

			$data['email']=$row->email;

		}else{

			redirect(base_url()."signup/");

		}





		/**** Load Language ****/

		foreach($GLOBALS['language'] as $key=>$val):

		   $data[$key] = $val;

		endforeach;

		/**** End Load Language ****/



		$template = array(

			'common/header',

			'users/changePassword',

			'common/footer',

		);

		$config = new Config();

		$data ['config'] = $config;	

		$config->render($template,$data);

	}

	public function ChangePicture(){

		

		$json = array();

		$this->load->model('MUsers');

		$img  = $this->MUtils->doUpload('file', 0, 0, true);

		$data['image'] = $this->MUtils->doUploadamx($img, 200,200,'small','uploads/users/');

		

		if($this->MUsers->UpdateUserInfo($data,$this->session->userdata("userId"))){

			$json['image'] = $data['image'];

			$json['success'] = true;

		}

		

		

		echo json_encode($json);

	}

	

	public function ChangeCV(){

		

		$json = array();

		$this->load->model('MUsers');

		$upload_path ="./uploads/cv/";

		$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

		$CVname = time().'.'.$ext;

		$ramp = $this->upload->initialize(array(

						"upload_path"   => $upload_path,

						"file_name"   	=> $CVname  ,

						"allowed_types" => "pdf|doc|docx",

				));

		

						

		if($this->upload->do_upload('file')){

		     		$data['resume'] =  $CVname ;

		 			$data['CV'] =  $_FILES['file']['name'];

			if($this->MUsers->UpdateUserInfo($data,$this->session->userdata("userId"))){

				

				$json['success'] = true;

				$json['cvname'] = $data['CV'];

				$json['resume'] = $data['resume'];

		}

				

		} else {

				$json['error']= 'failed to upload';

			

		} 

	

		

		

		echo json_encode($json);

	}

}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */