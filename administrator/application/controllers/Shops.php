<?php

class Shops extends CI_Controller {

    //Show the view for adding new Shops
    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
		
		
		$this->load->model("MCategories");
		$this->load->model("MOwners");
		$this->load->model("MShops");
		
		
		
		$data['categories'] = $this->MCategories->MainCategories()->result_array();
		$data['owners'] = $this->MOwners->viewOwners()->result_array();
		
		$data['categoryarranged'] = $this->MCategories->Categoryarrange();
		
		$data['alllandmark'] = $this->MShops->GetLandMark()->result_array();
		
        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Shops/View";
        $data['breadcrumb_anchor1'] = "Shops";
        $data['breadcrumb_link2'] = "/Shops/Add";
        $data['breadcrumb_anchor2'] = "Add New Page";

        $data['activeMenu'] = "mnuDirectory";
        $data['main_content'] = "Admin/Shops/add";
        $this->load->view('Admin/default.php', $data);

    }

    //Show the view to edit page
    public function Edit()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
		
		
		$this->load->model("MCategories");
		$this->load->model("MShops");
		
		
		$data['categories'] = $this->MCategories->MainCategories()->result_array();
	
		$data['categoryarranged'] = $this->MCategories->Categoryarrange();
		
		$data['shopcategories'] = $this->MCategories->Shopcategories($this->input->get("id"));
		$data['alllandmark'] = $this->MShops->GetLandMark()->result_array();
	
		
		

	      //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Shops/View";
        $data['breadcrumb_anchor1'] = "Shops";
        $data['breadcrumb_link2'] = "/Shops/Edit?id=" . $this->input->get("id");
        $data['breadcrumb_anchor2'] = "Edit Page";

        $data['activeMenu'] = "mnuDirectory";

        //Loading Data for this view
        $this->load->model("MShops");
        $data['recId'] = $this->input->get("id");
        $Shops = $this->MShops->viewShopsById($data['recId'])->result();
		
		
		$data['additionalimages'] = $this->MShops->Shopgallery($this->input->get("id"))->result();
	
		
        //seperate data according to languages in different arrays
        $data['view'] = $this->MUtils->arrangeDataAccordingToLanguage($Shops, $data);
		
		

        $data['main_content'] = "Admin/Shops/edit";
        $this->load->view('Admin/default.php', $data);

    }

    //Add new page in the database
    public function AddShop()
    {
        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
		$data['website'] = $this->input->post('website');
		$data['fax'] = $this->input->post('fax');
		$data['contact'] = $this->input->post('contact');
		$data['atributes'] = $this->input->post('attributes');
		$data['category'] = $this->input->post('category');
		$data['email'] = $this->input->post('email');
		$data['landmark'] = $this->input->post('landmark');
		$data['img_main'] = $this->input->post('imgThumb1' );
		$data['img_listview'] = $this->input->post('imgThumb2' );
		$data['img_gridview'] = $this->input->post('imgThumb3' );
		$data['img_homeicon'] = $this->input->post('imgThumb4' );
		$data['addimages'] =  $this->input->post('addimages');
		$data['addlargeimages'] =  $this->input->post('addlargeimages');
		$data['ownerid'] =  $this->input->post('ownerid');
		

        foreach ($languages as $lang)
        {
            $data['title_' . $lang->code] = $this->input->post('title_' . $lang->code);
           	$data['address_' . $lang->code] = $this->input->post('address_' . $lang->code);
			$data['short_desc_' . $lang->code] = $this->input->post('short_desc_' . $lang->code);
            $data['long_desc_' . $lang->code] = $this->input->post('editor_' . $lang->code);
            $data['sd_id_' . $lang->code] = $this->input->post('sd_id_' . $lang->code);
        }

        $defaultCode = $languages[$data['defaultLang']]->code;
        $status = "";
        if ( isset($_POST['title_' . $defaultCode] ) )
        {
            $this->load->model("MShops");

            $status = $this->MShops->addShop($data);
        }

        if ($status==1)
        {
            $data['status'] = "Shop Has Been Added Successfully.";
            $data['statusCode'] = 1;
        }
        else
        {
            $data['status'] = "Error occurred while adding new Shop.";
            $data['statusCode'] = 0;
        }
        $this->View($data);
    }

    //Edit page dat in database
    public function EditShop()
    {

        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
		if($_FILE['smallFile']['tmp_name'] =! "" ){
		$data['image'] = $this->MUtils->doUpload('smallFile', 0, 0, false);
		}
		$data['fax'] = $this->input->post('fax');
		$data['website'] = $this->input->post('website');
		$data['landmark'] = $this->input->post('landmark');
		$data['contact'] = $this->input->post('contact');
		$data['atributes'] = $this->input->post('attributes' );
		$data['category'] = $this->input->post('category');
		$data['email'] = $this->input->post('email');
		$data['img_main'] = $this->input->post('imgThumb1' );
		$data['img_listview'] = $this->input->post('imgThumb2' );
		$data['img_gridview'] = $this->input->post('imgThumb3' );
		$data['img_homeicon'] = $this->input->post('imgThumb4' );
		$data['addimages'] =  $this->input->post('addimages');
		$data['addlargeimages'] =  $this->input->post('addlargeimages');
		  
     
        $data['id'] = $this->input->post('sid');
        foreach ($languages as $lang)
        {
            $data['title_' . $lang->code] = $this->input->post('title_' . $lang->code);
        	$data['address_' . $lang->code] = $this->input->post('address_' . $lang->code);
			$data['short_desc_' . $lang->code] = $this->input->post('short_desc_' . $lang->code);
            $data['long_desc_' . $lang->code] = $this->input->post('editor_' . $lang->code);
            $data['sd_id_' . $lang->code] = $this->input->post('sd_id_' . $lang->code);
           
        }


        $status = "";
        $defaultCode = $languages[$data['defaultLang']]->code;
        if ( isset($_POST['title_' . $defaultCode] ) )
        {
            $this->load->model("MShops");
            $status = $this->MShops->editShop($data);
        }


        if ($status==1)
        {
            $data['status'] = "Shop Modified.";
            $data['statusCode'] = 1;
        }
        else
        {
            $data['status'] = "Error occurred while adding page.";
            $data['statusCode'] = 0;
        }

        $this->View($data);
    }

    //Show all the Shops on 1 page..
    public function View($data='')
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Shops/View";
        $data['breadcrumb_anchor1'] = "Shops";
        $data['breadcrumb_link2'] = "/Shops/View";
        $data['breadcrumb_anchor2'] = "Manage Shops";

        $data['activeMenu'] = "mnuDirectory";

        //Loading Data for this view
        $this->load->model("MShops");
        $Shops = $this->MShops->viewShops()->result();
        //seperate data according to languages in different arrays
        $data['view'] = $this->MUtils->arrangeDataAccordingToLanguage($Shops, $data);
		

        $data['main_content'] = "Admin/Shops/view";
        $this->load->view("Admin/default.php", $data);
    }

    //Delete Page
    public function Delete()
    {
        $id = $this->input->get('id');

        $this->load->model("MShops");
        $status = $this->MShops->deleteShop($id);

        if ($status)
            $this->MUtils->setSuccess("Record Deleted Successfully");
        else
            $this->MUtils->setError("Error occurred while deleting record");

        echo $this->MUtils->getStatus();
    }
	
	
	  public function upload()
	  {
		  $thumb  = $this->input->get('thumb');

          $resizer  = $this->input->get('resize');

          $data = getimagesize($_FILES['file']['tmp_name']);
		  
		  $allowed = array('jpg','jpeg','gif','png');
				
		  $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
		
		  $json = array();
		  
		  $json['resize'] = $resizer ;


        if($resizer == "reszie")
        {
		 if (in_array($ext, $allowed))
		 {
				if($thumb==1)  
				{
					if($data[0]==310 && $data[1]==172)
					{
						
						$filename = time().$_FILES['file']['name'];
						$file = move_uploaded_file($_FILES['file']['tmp_name'],'../uploads/shops/'.$filename); 
						
						
							$json['filename'] = $filename;
							
							$json['success'] = 'Your File has been uploaded!';
						
						
					}else{
						$json['error'] = "Upload file with appropiate dimension!" ;
						
					}	
					
				} 
				if($thumb==2)  
				{
					if($data[0]==146 && $data[1]==200)
					{
						
						$filename = time().$_FILES['file']['name'];
						$file = move_uploaded_file($_FILES['file']['tmp_name'],'../uploads/shops/'.$filename); 
						
						
							$json['filename'] = $filename;
							
							$json['success'] = 'Your File has been uploaded!';
						
						
					}else{
						$json['error'] = "Upload file with appropiate dimension!" ;
						
					}	
					
				} 
				
				
				if($thumb==3)  
				{
					if($data[0]==218 && $data[1]==131)
					{
						
						$filename = time().$_FILES['file']['name'];
						$file = move_uploaded_file($_FILES['file']['tmp_name'],'../uploads/shops/'.$filename); 
						
						
							$json['filename'] = $filename;
							
							$json['success'] = 'Your File has been uploaded!';
						
						
					}else{
						$json['error'] = "Upload file with appropiate dimension!" ;
						
					}	
					
				} 
				
				
				if($thumb==4)  
				{
					if($data[0]==92 && $data[1]==122)
					{
						
						$filename = time().$_FILES['file']['name'];
						$file = move_uploaded_file($_FILES['file']['tmp_name'],'../uploads/shops/'.$filename); 
						
						
							$json['filename'] = $filename;
							
							$json['success'] = 'Your File has been uploaded!';
						
						
					}else{
						$json['error'] = "Upload file with appropiate dimension!" ;
						
					}	
					
				}
				
				
		 } else{
			 
			 $json['error'] = "Invalid Format!" ;
			 
		 }			 
		  
        }	else {

            if($thumb==1)
            {
                $filename = $this->MUtils->doUploadWithCropping('file',310,172,'../uploads/shops/');

                $json['filename'] = $filename;

                $json['success'] = 'Your File has been uploaded!';


            }
            if($thumb==2)
            {
                $filename = $this->MUtils->doUploadWithCropping('file',146,200,'../uploads/shops/');

                $json['filename'] = $filename;

                $json['success'] = 'Your File has been uploaded!';

            }

            if($thumb==3)
            {

                $filename = $this->MUtils->doUploadWithCropping('file',218,131,'../uploads/shops/');

                $json['filename'] = $filename;

                $json['success'] = 'Your File has been uploaded!';
            }

            if($thumb==4)
            {

                $filename = $this->MUtils->doUploadWithCropping('file',92,122,'../uploads/shops/');

                $json['filename'] = $filename;

                $json['success'] = 'Your File has been uploaded!';
            }


        }
		  echo json_encode($json);
		  
		  
		  
	  }
	  
	  
	 public function additionalimage()
	 {
			$json = array();						   
		  	
			$file =  $this->MUtils->doUploadWithCropping('file',199,100,"../uploads/shops/");
		  	$largefile =  $this->MUtils->doUploadWithCropping('file',750, 600,"../uploads/shops/");
		   	
			if($file){
				$json['success'] = 'Your File Has Been Uploaded' ;		
				$json['file'] = $file;		
				$json['largefile'] = $largefile;		
					
			} else {
				$json['error'] = 'Your File Has Been Uploaded' ;			
			}
			
			 echo json_encode($json);
		 	
	  }
  

}