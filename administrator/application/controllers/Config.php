 <?php

class Config extends CI_Controller {

    function __construct(){
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE));
    }


    //Shows all sliders Config
    public function Sliders($data='')
    {
        //$this->load->model("MWork");
        //$data['arrWork'] = $this->MWork->loadAllData()->result();
		
		$this->load->model("MCategories");
		
		$data['categories'] =  $this->MCategories->MainCategories()->result_array();
	    $data['breadcrumb_link1'] = "/Config/Sliders";
        $data['breadcrumb_anchor1'] = "Sliders";
        $data['breadcrumb_link2'] = "";
        $data['breadcrumb_anchor2'] = "";

        $data['activeMenu'] = "mnuPassword";

        $this->load->model("MConfig");
        $rec = $this->MConfig->getValue(0);

        $data['rec'] = $rec;

        $data['main_content'] = "Admin/Config/sliders";
        $this->load->view("Admin/default.php", $data);
    }


    //Shows all sliders Config
    public function HomePage($data='')
    {
        //$this->load->model("MWork");
        //$data['arrWork'] = $this->MWork->loadAllData()->result();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Config/HomePage";
        $data['breadcrumb_anchor1'] = "Home Page";
        $data['breadcrumb_link2'] = "";
        $data['breadcrumb_anchor2'] = "";

        $data['activeMenu'] = "mnuSliders";

        $this->load->model("MConfig");
        $rec = $this->MConfig->getValue("homepage");

        $data['rec'] = $rec;

        $data['main_content'] = "Admin/Config/homepage";
        $this->load->view("Admin/default.php", $data);
    }



    //Update sliders
    public function updateSliders()
    {
        if ($this->input->post('pageSubmit') == "true")
        {
			
			$key = $this->input->post('pid');

            $slider1_img = $this->MUtils->doUpload('slider1_img', 727, 290, false);
            if (strlen($slider1_img) > 1)
                $arrData['slider1_img'] = $slider1_img;
            else
            
			$arrData['slider1_img'] = $this->input->post('slider1_hid');
			$arrData['slider1_text'] = $this->input->post('slider1_text');
            $arrData['slider1_anchor'] = $this->input->post('slider1_anchor');
            $arrData['slider1_url'] = $this->input->post('slider1_url');
            $arrData['slider1_state'] = $this->input->post('slider1_state');

            $slider2_img = $this->MUtils->doUpload('slider2_img', 727, 290, false);
            if (strlen($slider2_img) > 1)
                $arrData['slider2_img'] = $slider2_img;
            else
                $arrData['slider2_img'] = $this->input->post('slider2_hid');

            $arrData['slider2_text'] = $this->input->post('slider2_text');
            $arrData['slider2_anchor'] = $this->input->post('slider2_anchor');
            $arrData['slider2_url'] = $this->input->post('slider2_url');
            $arrData['slider2_state'] = $this->input->post('slider2_state');

            $slider3_img = $this->MUtils->doUpload('slider3_img', 727, 290, false);
            if (strlen($slider3_img) > 1)
                $arrData['slider3_img'] = $slider3_img;
            else
                $arrData['slider3_img'] = $this->input->post('slider3_hid');

            $arrData['slider3_text'] = $this->input->post('slider3_text');
            $arrData['slider3_anchor'] = $this->input->post('slider3_anchor');
            $arrData['slider3_url'] = $this->input->post('slider3_url');
            $arrData['slider3_state'] = $this->input->post('slider3_state');

            $slider4_img = $this->MUtils->doUpload('slider4_img', 727, 290, false);
            if (strlen($slider4_img) > 1)
                $arrData['slider4_img'] = $slider4_img;
            else
                $arrData['slider4_img'] = $this->input->post('slider4_hid');

            $arrData['slider4_text'] = $this->input->post('slider4_text');
            $arrData['slider4_anchor'] = $this->input->post('slider4_anchor');
            $arrData['slider4_url'] = $this->input->post('slider4_url');
            $arrData['slider4_state'] = $this->input->post('slider4_state');
   
         

            $val = $this->MUtils->print_r_xml($arrData);
            $this->load->model('MConfig');
            $status = $this->MConfig->saveValue($val,$key);

            if ($status == 1)
            {
                $data['status'] = "Sliders Updated Successfully.";
                $data['statusCode'] = 1;
            }
            else
            {
                $data['status'] = "Error occurred while updating sliders.";
                $data['statusCode'] = 0;
            }


        }



        $this->Sliders($data);
    }

    //Shows seo of all pages
    public function SEO($data='')
    {
        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Config/SEO";
        $data['breadcrumb_anchor1'] = "SEO";
        $data['breadcrumb_link2'] = "";
        $data['breadcrumb_anchor2'] = "";

        $data['activeMenu'] = "mnuSeo";

        $this->load->model("MConfig");
        $rec = $this->MConfig->getValue("SEO");

        $data['rec'] = $rec;

        $data['main_content'] = "Admin/Config/seo";
        $this->load->view("Admin/default.php", $data);
    }

    //Update SEO
    public function updateSEO()
    {
        if ($this->input->post('pageSubmit') == "true")
        {

            $arrData['home_title'] = $this->input->post('home_title');
            $arrData['home_keywords'] = $this->input->post('home_keywords');
            $arrData['home_desc'] = $this->input->post('home_desc');

            $arrData['work_title'] = $this->input->post('work_title');
            $arrData['work_keywords'] = $this->input->post('work_keywords');
            $arrData['work_desc'] = $this->input->post('work_desc');

            $arrData['service_title'] = $this->input->post('service_title');
            $arrData['service_keywords'] = $this->input->post('service_keywords');
            $arrData['service_desc'] = $this->input->post('service_desc');

            $arrData['news_title'] = $this->input->post('news_title');
            $arrData['news_keywords'] = $this->input->post('news_keywords');
            $arrData['news_desc'] = $this->input->post('news_desc');

            $arrData['career_title'] = $this->input->post('career_title');
            $arrData['career_keywords'] = $this->input->post('career_keywords');
            $arrData['career_desc'] = $this->input->post('career_desc');

            $arrData['contact_title'] = $this->input->post('contact_title');
            $arrData['contact_keywords'] = $this->input->post('contact_keywords');
            $arrData['contact_desc'] = $this->input->post('contact_desc');

            $val = $this->MUtils->print_r_xml($arrData);
            $this->load->model('MConfig');
            $status = $this->MConfig->saveValue($val, "SEO");

            if ($status == 1)
            {
                $data['status'] = "SEO Data Updated Successfully.";
                $data['statusCode'] = 1;
            }
            else
            {
                $data['status'] = "Error occurred while updating SEO Data.";
                $data['statusCode'] = 0;
            }


        }

        $this->SEO($data);
    }


    //Update SEO
    public function updateHomePage()
    {
        if ($this->input->post('pageSubmit') == "true")
        {

            $arrData['service_heading'] = $this->input->post('service_heading');
            $arrData['service_desc'] = $this->input->post('service_desc');

            $arrData['why_heading'] = $this->input->post('why_heading');
            $arrData['why_desc'] = $this->input->post('why_desc');

            $arrData['work_heading'] = $this->input->post('work_heading');
            $arrData['work_desc'] = $this->input->post('work_desc');

            $arrData['team_heading'] = $this->input->post('team_heading');
            $arrData['team_desc'] = $this->input->post('team_desc');

            $arrData['client_heading'] = $this->input->post('client_heading');
            $arrData['client_desc'] = $this->input->post('client_desc');

            $val = $this->MUtils->print_r_xml($arrData);
            $this->load->model('MConfig');
            $status = $this->MConfig->saveValue($val, "homepage");

            if ($status == 1)
            {
                $data['status'] = "Home Page Data Updated Successfully.";
                $data['statusCode'] = 1;
            }
            else
            {
                $data['status'] = "Error occurred while updating homepage Data.";
                $data['statusCode'] = 0;
            }


        }

        $this->HomePage($data);
    }


    //Shows view to change password
    public function Password($data='')
    {
        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Config/Password";
        $data['breadcrumb_anchor1'] = "Change Password";
        $data['breadcrumb_link2'] = "";
        $data['breadcrumb_anchor2'] = "";

        $data['activeMenu'] = "mnuPassword";

        $data['main_content'] = "Admin/Config/password";
        $this->load->view("Admin/default.php", $data);
    }

    //Shows view to change password
    public function UpdatePass($data='')
    {
        $data['old_password'] = $this->input->post("old_password");
        $data['new_password'] = $this->input->post("new_password");
        $data['new_password2'] = $this->input->post("new_password2");

        $this->load->model("MUsers");
        $status = $this->MUsers->updatePass($data);

        if ($status==1)
        {
            $data['status'] = "Password updated successfully.";
            $data['statusCode'] = 1;
        }
        else if ($status==0)
        {
            $data['status'] = "Error occured while updating password.";
            $data['statusCode'] = 0;
        }
        else if ($status==-1)
        {
            $data['status'] = "Please enter correct old password.";
            $data['statusCode'] = 0;
        }

        $this->Password($data);
    }
	
	public function setting($data='')
    {
        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Config/setting";
        $data['breadcrumb_anchor1'] = "Setting";
        $data['breadcrumb_link2'] = "";
        $data['breadcrumb_anchor2'] = "";
		
		$this->load->model("MUsers");
        $websetting = $this->MUsers->viewsetting();
		
		$data['setting_title'] = $websetting->title;
		$data['setting_meta_keyword'] = $websetting->meta_keyword;
		$data['setting_meta_description'] = $websetting->meta_desc;
		$data['setting_address'] = $websetting->address;
		$data['setting_phone'] = $websetting->phone;
		$data['setting_email'] = $websetting->email;
		$data['setting_logo'] = $websetting->sidelogo;
		$data['setting_link'] = $websetting->link;
		$data['setting_website'] = $websetting->website;
		
		
        $data['activeMenu'] = "mnuPassword";

        $data['main_content'] = "Admin/Config/setting";
        $this->load->view("Admin/default.php", $data);
    }
	
	public function Updatesetting($data='')
    {
       
	  
	    $data['title'] = $this->input->post("title");
        $data['meta_keyword'] = $this->input->post("meta_keyword");
        $data['meta_desc'] = $this->input->post("meta_desc");
		$data['address'] = $this->input->post("address");
		$data['phone'] = $this->input->post("phone");
		$data['link'] = $this->input->post("link");
		$data['email'] = $this->input->post("email");
		$data['link'] = $this->input->post("link");
		$data['website'] = $this->input->post("website");
		
		if($_FILES['sidelogo']['name']!="")
		{
		$data['sidelogo'] = $this->MUtils->doUpload('sidelogo', 228, 78, false);
		}
		
          
		 

        $this->load->model("MUsers");
        $status = $this->MUsers->updatesetting($data);
		
		
		

        if ($status==1)
        {
            $data['status'] = "setting has been changed successfully.";
            $data['statusCode'] = 1;
        }
       /* else if ($status==0)
        {
            $data['status'] = "Error occured while updating password.";
            $data['statusCode'] = 0;
        }
        else if ($status==-1)
        {
            $data['status'] = "Please enter correct old password.";
            $data['statusCode'] = 0;
        }*/
        $this->setting();
    }
	function GetSlider(){
		
		$catid = (int)$this->input->get("id");
		
		
		$this->load->model("MConfig");
        $rec = $this->MConfig->getValue($catid);
	
		
		$html = '<div class="row-fluid digger">
                        <div class="span3">
                            <div class="tabbable tabbable-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Slider 1</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab_1_1" class="tab-pane active">
										<div class="c">
                                            <img src="'.base_url().'../uploads/'.$rec['data']['slider1_img'].'" width="182" height="183" style="height:183px !important; padding-bottom:5px;" alt="" />
                                            <div class="smallText">Dimension : 971 x 312</div>
                                        </div>
										  <div class="control-group" data-type="File"  style="padding-top:50px;">
                                            <input type="file" name="slider1_img" class="default">
                                            <input type="hidden" name="slider1_hid" value="'.$rec['data']['slider1_img'].'">
                                        </div>

                                        <!--div class="control-group">
                                            <input value="'.$rec['data']['slider1_text'].'" type="text" name="slider1_text" placeholder="Please enter slider text" class="span12 m-wrap popovers" data-original-title="Slider Text" data-content="Plesae enter Slider text" data-trigger="hover" />
                                        </div>

                                        <div class="control-group">
                                            <input value="'.$rec['data']['slider1_anchor'].'" type="text" name="slider1_anchor" placeholder="Please enter anchor text" class="span12 m-wrap popovers" data-original-title="Anchor Text" data-content="Plesae enter anchor text" data-trigger="hover" />
                                        </div>

                                        <div class="control-group">
                                            <input value="'. $rec['data']['slider1_url'].'" type="text" name="slider1_url" placeholder="Please enter anchor url" class="span12 m-wrap popovers" data-original-title="Anchor URL" data-content="Plesae enter anchor url" data-trigger="hover" />
                                        </div-->

                                        <div class="control-group">
                                            <div class="text-toggle-button text-enable-disable">';
                                                
                                          if ($rec['data']['slider1_state'] == 1)
                                                 $html .='<input name="slider1_state" type="checkbox" class="toggle" value="1" checked="checked" />';
                                           else
                                                  $html .='<input name="slider1_state" type="checkbox" class="toggle" value="1" enabled="" />';
                                                
                                           $html .= '</div>
                                        </div>
                                        
                                  
                                    </div>
                                </div>
                            </div>

                        </div>';

                       $html .= '<div class="span3">
							<div class="tabbable tabbable-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Slider 2</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab_1_1" class="tab-pane active">

                                        <div class="c">
                                            <img src="'. base_url().'../uploads/'.$rec['data']['slider2_img'].'" width="182" height="183" style="height:183px !important; padding-bottom:5px;" alt="" />
                                            <div class="smallText">Dimension : 971 x 312</div>
                                        </div>

                                        <div class="control-group" data-type="File"  style="padding-top:50px;">
                                            <input type="file" name="slider2_img" class="default">
                                            <input type="hidden" name="slider2_hid" value="'. $rec['data']['slider2_img'].'">
                                        </div>

                                        <!--div class="control-group">
                                            <input value="'.$rec['data']['slider2_text'] .'" type="text" name="slider2_text" placeholder="Please enter slider text" class="span12 m-wrap popovers" data-original-title="Slider Text" data-content="Plesae enter Slider text" data-trigger="hover" />
                                        </div>

                                        <div class="control-group">
                                            <input value="'. $rec['data']['slider2_anchor'].'" type="text" name="slider2_anchor" placeholder="Please enter anchor text" class="span12 m-wrap popovers" data-original-title="Anchor Text" data-content="Plesae enter anchor text" data-trigger="hover" />
                                        </div>

                                        <div class="control-group">
                                            <input value="'. $rec['data']['slider2_url'] .'" type="text" name="slider2_url" placeholder="Please enter anchor url" class="span12 m-wrap popovers" data-original-title="Anchor URL" data-content="Plesae enter anchor url" data-trigger="hover" />
                                        </div-->

                                        <div class="control-group">
                                            <div class="text-toggle-button text-enable-disable">';
                                             
                                                if ($rec['data']['slider2_state'] == 1)
                                                    $html .= '<input name="slider2_state" type="checkbox" class="toggle" value="1" checked="checked" />';
                                                else
                                                    $html .= '<input name="slider2_state" type="checkbox" class="toggle" value="1" enabled="" />';
                                                
                                            
                                           $html .= '</div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>';

                       $html .='<div class="span3">

                            <div class="tabbable tabbable-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Slider 3</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab_1_1" class="tab-pane active">

                                        <div class="c">
                                            <img src="'.base_url().'../uploads/'.$rec['data']['slider3_img'].'" width="182" height="183" style="height:183px !important; padding-bottom:5px;" alt="" />
                                            <div class="smallText">Dimension : 971 x 312</div>
                                        </div>

                                        <div class="control-group" data-type="File"  style="padding-top:50px;">
                                            <input type="file" name="slider3_img" class="default">
                                            <input type="hidden" name="slider3_hid" value="'. $rec['data']['slider3_img'].'">
                                        </div>

                                        <!--div class="control-group">
                                            <input value="'. $rec['data']['slider3_text'].'" type="text" name="slider3_text" placeholder="Please enter slider text" class="span12 m-wrap popovers" data-original-title="Slider Text" data-content="Plesae enter Slider text" data-trigger="hover" />
                                        </div>

                                        <div class="control-group">
                                            <input value="'.$rec['data']['slider3_anchor'].'" type="text" name="slider3_anchor" placeholder="Please enter anchor text" class="span12 m-wrap popovers" data-original-title="Anchor Text" data-content="Plesae enter anchor text" data-trigger="hover" />
                                        </div>

                                        <div class="control-group">
                                            <input value="'.$rec['data']['slider3_url'].'" type="text" name="slider3_url" placeholder="Please enter anchor url" class="span12 m-wrap popovers" data-original-title="Anchor URL" data-content="Plesae enter anchor url" data-trigger="hover" />
                                        </div-->

                                        <div class="control-group">
                                            <div class="text-toggle-button text-enable-disable">';
                                                
                                                if ($rec['data']['slider3_state'] == 1)
                                                    $html .= '<input name="slider3_state" type="checkbox" class="toggle" value="1" checked="checked" />';
                                                else
                                                    $html .= '<input name="slider3_state" type="checkbox" class="toggle" value="1" enabled="" />';
                                                
                                           $html .= '</div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>';

                         $html .= '<div class="span3">
                            <div class="tabbable tabbable-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Slider 4</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab_1_1" class="tab-pane active">

                                        <div class="c">
                                            <img src="'.base_url().'../uploads/'.$rec['data']['slider4_img'].'" width="182" height="183" style="height:183px !important; padding-bottom:5px;" alt="" />
                                            <div class="smallText">Dimension : 971 x 312</div>
                                        </div>

                                        <div class="control-group" data-type="File"  style="padding-top:50px;">
                                            <input type="file" name="slider4_img" class="default">
                                            <input type="hidden" name="slider4_hid" value="'. $rec['data']['slider4_img'].'">
                                        </div>

                                        <!--div class="control-group">
                                            <input value="'.$rec['data']['slider4_text'].'" type="text" name="slider4_text" placeholder="Please enter slider text" class="span12 m-wrap popovers" data-original-title="Slider Text" data-content="Plesae enter Slider text" data-trigger="hover" />
                                        </div>

                                        <div class="control-group">
                                            <input value="'.$rec['data']['slider4_anchor'].'" type="text" name="slider4_anchor" placeholder="Please enter anchor text" class="span12 m-wrap popovers" data-original-title="Anchor Text" data-content="Plesae enter anchor text" data-trigger="hover" />
                                        </div>

                                        <div class="control-group">
                                            <input value="'. $rec['data']['slider1_url'].'" type="text" name="slider4_url" placeholder="Please enter anchor url" class="span12 m-wrap popovers" data-original-title="Anchor URL" data-content="Plesae enter anchor url" data-trigger="hover" />
                                        </div-->

                                        <div class="control-group">
                                            <div class="text-toggle-button text-enable-disable">';
                                              
                                                if ($rec['data']['slider4_state'] == 1)
                                                    $html .= '<input name="slider4_state" type="checkbox" class="toggle" value="1" checked="checked" />';
                                                else
                                                    $html .='<input name="slider4_state" type="checkbox" class="toggle" value="1" enabled="" />';
                                             
                                            $html .= '</div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>';
					
					
					
				$json['html'] = $html;
				$json['status'] = 'success';
				$json['msg'] = 'Somehting went wrong';
				
				
				echo json_encode($json);
				
		}
}


?>