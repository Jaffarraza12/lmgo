<?php

class Notification extends CI_Controller {

  	public function schedule(){
		
		$this->load->model("madd");
		$this->load->model("musers");
		$success="";
		$failure="";
		$ads = $this->madd->getadsforschedule()->result();
		foreach($ads as $adv):
			$ad = $this->madd->getAddDetail($adv->advertiseid)->row();
			$userinfo = $this->musers->getUserbyID($ad->userid)->row();
			$conf['useragent'] = 'Dubazaaro.com';
			$conf['protocol']  = 'smtp';
			$conf['smtp_host'] = 'mail.dubazaaro.com';
			$conf['smtp_user'] = 'info@dubazaaro.com';
			$conf['smtp_pass'] = 'Info963';
			$conf['smtp_port'] = '25';
			$conf['mailtype'] = 'html';
			$conf['charset']  = 'iso-8859-1';
			$conf['wordwrap'] = TRUE;
			$this->email->initialize($conf);
			$this->email->from('info@dubazaaro.com', 'Dubazaaro.com');
			$this->email->to( $userinfo->email);
			$this->email->reply_to('info@dubazaaro.com');
			$this->email->subject('Your Ad '.$ad->title .' is going to expire');
			$message = '<p>Your advertise "<b>'.$ad->title.'</b>" which you have publish on '.date(" d-M-Y",$ad->sts).' is going expire soon if you do not activate we will remove it from our database </p><h3>For Activation please <a href="http://dubazaaro.com/'.'dashboard/#tabs|Tabs_Group_name:Tab_2_name">Click here</a> </h3>';
				$this->email->message($this->madd->prepareEmailCon($message,$userinfo->firstname,''));
				if(!$this->email->send()){
						$data['erstatus'] = $this->email->print_debugger();	
						$failure .= $data['erstatus'];
				} else {
					$this->madd->decrementAdNotify($adv->advertiseid);
					$success .= "Notification send to ".$userinfo->firstname .' '.$userinfo->lastname.' on his email '.$userinfo->email.','; 	
				}
		endforeach;
		
		echo 'Notification Successfully Sent '.$success ;
		echo 'Notification Failure '.$failure;
		
	}
	
	public function advertisereadytodelete(){
			
			$this->load->model("madd");
			$this->load->model("musers");
			$report="<h2>Ads Deleted</h2>";
			$ads = $this->madd->adsreadytodelete()->result();
			foreach($ads as $adv):
				$report .= 'Advertise with id '.$adv->advertiseid.' and title with '.$adv->title.' has been deleted,';
				$this->madd->DeleteAdd($adv->advertiseid);
			endforeach;
			echo $report;
		 
		
	} 
    public function sendnotification($advertiseid)
    {
				$this->load->model("madd");
				$this->load->model("musers");
				$ad = $this->madd->getAddDetail($advertiseid)->row();
				$userinfo = $this->musers->getUserbyID($ad->userid)->row();
				
				$conf['useragent'] = 'Dubazaaro.com';
				$conf['protocol']  = 'smtp';
				$conf['smtp_host'] = 'mail.dubazaaro.com';
				$conf['smtp_user'] = 'info@dubazaaro.com';
				$conf['smtp_pass'] = 'Info963';
				$conf['smtp_port'] = '25';
				$conf['mailtype'] = 'html';
				$conf['charset']  = 'iso-8859-1';
				$conf['wordwrap'] = TRUE;
				$this->email->initialize($conf);
				$this->email->from('info@dubazaaro.com', 'Dubazaaro.com');
				$this->email->to( $userinfo->email );
				$this->email->reply_to('info@dubazaaro.com');
				$this->email->subject('Your Ad '.$ad->title .' is going to expire');
				$message = '<p>Your advertise "<b>'.$ad->title.'</b>" which you have publish on '.date(" d-M-Y",$ad->sts).' is going expire soon if you do not activate we will remove it from our database </p><h3>For Activation please <a href="http://dubazaaro.com/'.'dashboard/#tabs|Tabs_Group_name:Tab_2_name">Click here</a> </h3>';
				
				$this->email->message($this->madd->prepareEmailCon($message,$userinfo->firstname,''));
				if(!$this->email->send()){
						$data['erstatus'] = $this->email->print_debugger();	
						echo $data['erstatus'];
				} else {
					$this->madd->decrementAdNotify($advertiseid);
					echo '<script type="text/javascript">window.location.href="'.$_SERVER['HTTP_REFERER'].'";</script>';	
				}		
		
	}
	
}
?>	