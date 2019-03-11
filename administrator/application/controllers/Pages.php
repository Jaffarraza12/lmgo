<?php

class Pages extends CI_Controller {

    //Show differnet types for page
    public function Select()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Pages/Select";
        $data['breadcrumb_anchor1'] = "Page";
        $data['breadcrumb_link2'] = "/Pages/Select";
        $data['breadcrumb_anchor2'] = "Select Type";

        $data['activeMenu'] = "mnuPages";
        $data['main_content'] = "Admin/Pages/select";
        $this->load->view('Admin/default.php', $data);
    }

    //Show the view for adding new pages
    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Pages/View?q=" . $this->MUtils->StringPrepare($this->input->get("q"));
        $data['breadcrumb_anchor1'] = $this->MUtils->StringPrepare($this->input->get("q"));
        $data['breadcrumb_link2'] = "/Pages/Add?q=" . $this->MUtils->StringPrepare($this->input->get("q"));
        $data['breadcrumb_anchor2'] = "Add New Page";

        if (strtolower($this->input->get('q')) == "news" ||
            strtolower($this->input->get('q')) == "books" ||
            strtolower($this->input->get('q')) == "activities") {

            $page_content = (object)[
                'show_image' => "on",
                'show_slider' => "0",
                'show_recent_news' => "0"
            ];

        } else {

            $page_content = (object)[
                'show_image' => "0",
                'show_slider' => "0",
                'show_recent_news' => "0"
            ];

        }

        $data['page_content'] = $page_content;
        $data['activeMenu'] = "mnuPages";
        $data['main_content'] = "Admin/Pages/add";
        
        $this->load->view('Admin/default.php', $data);

    }

    //Show the view to edit page
    public function Edit()
    {

        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Pages/View?q=" . $this->MUtils->StringPrepare($this->input->get("q"));
        $data['breadcrumb_anchor1'] = $this->MUtils->StringPrepare($this->input->get("q"));
        $data['breadcrumb_link2'] = "/Pages/Edit?id=" . $this->MUtils->StringPrepare($this->input->get("id")) . "&q=" . $this->MUtils->StringPrepare($this->input->get("q"));
        $data['breadcrumb_anchor2'] = "Edit Page";

        $data['activeMenu'] = "mnuPages";

        //Loading Data for this view
        $this->load->model("MPages");
        $data['recId'] = (int)$this->input->get("id");
        $pages = $this->MPages->viewPageById($data['recId'])->result();

        foreach ($pages as $page) {
            $page->pdf_ids = json_decode($page->pdf_ids);
            $page->pdf_ids2 = json_decode($page->pdf_ids2);
        }

        //seperate data according to languages in different arrays
        $data['view'] = $this->MUtils->arrangeDataAccordingToLanguage($pages, $data);

        $data['main_content'] = "Admin/Pages/edit";
        $this->load->view('Admin/default.php', $data);

        // echo json_encode($data);
    }

    //Add new page in the database
    public function AddPage()
    {
        //Load languages and Default Language

        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
        $data['seo_url'] = $this->input->post('seo_url');
        $data['entity'] = $this->MUtils->StringPrepare($this->input->get('q'));
        $data['show_image'] = $this->input->post('show_image');
        $data['show_slider'] = $this->input->post('slider');
        $data['show_recent_news'] = $this->input->post('recent');
        $data['image'] = $this->MUtils->doUploadPath('image', 'pages');
        $data['pdf'] = $this->MUtils->doUploadPdf('pdf', 'pages/pdf');
        if ($_FILES['image']['size']) {
            $data['image'] = $this->MUtils->doUploadPath('image', 'img');
        }

        foreach ($languages as $lang)
        {
            $files = $_FILES;
            $pdf_ids = [];
            foreach ($files['arr_pdf_' . $lang->code]['name'] as $key => $value) {
                $_FILES['userfile']['name'] = $files['arr_pdf_' . $lang->code]['name'][$key];
                $_FILES['userfile']['type'] = $files['arr_pdf_' . $lang->code]['type'][$key];
                $_FILES['userfile']['tmp_name'] = $files['arr_pdf_' . $lang->code]['tmp_name'][$key];
                $_FILES['userfile']['error'] = $files['arr_pdf_' . $lang->code]['error'][$key];
                $_FILES['userfile']['size'] = $files['arr_pdf_' . $lang->code]['size'][$key];

                $pdf_ids[$key] = $this->MUtils->doUploadPdf('userfile', 'pdf');
            }
            $pdf_ids2 = [];
            foreach ($files['arr_pdf_2' . $lang->code]['name'] as $key => $value) {
                $_FILES['userfile']['name'] = $files['arr_pdf_2' . $lang->code]['name'][$key];
                $_FILES['userfile']['type'] = $files['arr_pdf_2' . $lang->code]['type'][$key];
                $_FILES['userfile']['tmp_name'] = $files['arr_pdf_2' . $lang->code]['tmp_name'][$key];
                $_FILES['userfile']['error'] = $files['arr_pdf_2' . $lang->code]['error'][$key];
                $_FILES['userfile']['size'] = $files['arr_pdf_2' . $lang->code]['size'][$key];

                $pdf_ids2[$key] = $this->MUtils->doUploadPdf('userfile', 'pdf');
            }

            $data['title_' . $lang->code] = $this->input->post('title_' . $lang->code);
            $data['sub_title_' . $lang->code] = $this->input->post('sub_title_' . $lang->code);
            $data['short_desc_' . $lang->code] = $this->input->post('short_desc_' . $lang->code);
            $data['editor_' . $lang->code] = $this->input->post('editor_' . $lang->code);
            $data['meta_title_' . $lang->code] = $this->input->post('meta_title_' . $lang->code);
            $data['meta_keywords_' . $lang->code] = $this->input->post('meta_keywords_' . $lang->code);
            $data['meta_desc_' . $lang->code] = $this->input->post('meta_desc_' . $lang->code);
            $data['year_' . $lang->code] = $this->input->post('year_' . $lang->code);
            $data['pdf_ids_' . $lang->code] = json_encode($pdf_ids);
            $data['pdf_ids2_' . $lang->code] = json_encode($pdf_ids2);

        }



        $data['smallImage'] = "";

        $defaultCode = $languages[0]->code;
        $status = "";

        if ( isset($_POST['title_' . $defaultCode] ) )
        {
            $this->load->model("MPages");

            $status = $this->MPages->addPage($data);
        }

        if ($status==1)
        {
            $data['status'] = "New Page Added Successfully.";
            $data['statusCode'] = 1;
        }
        else
        {
            $data['status'] = "Error occurred while adding new page.";
            $data['statusCode'] = 0;
        }

        $this->View($data);
    }

    //Edit page dat in database
    public function EditPage()
    {
        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        $data['seo_url'] = $this->input->post('seo_url');
        $data['show_image'] = $this->input->post('show_image');
        $data['show_slider'] = $this->input->post('slider');
        $data['show_recent_news'] = $this->input->post('recent');
        $data['entity'] = $this->MUtils->StringPrepare($this->input->get('q'));
        $data['id'] = $this->input->post('cid');


        if ($_FILES['image']['size']) {
            $data['image'] = $this->MUtils->doUploadPath('image', 'img');
        }

        if ($_FILES['pdf']['size']) {
            $data['pdf'] = $this->MUtils->doUploadPdf('pdf', 'pages/pdf');
        }

        foreach ($languages as $lang)
        {
            $data['old_pdf_' . $lang->code] = $this->input->post("old_updated_pdf_" . $lang->code);

            $files = $_FILES;
            $pdf_ids = [];
            foreach ($files['arr_pdf_' . $lang->code]['name'] as $key => $value) {
                $_FILES['userfile']['name'] = $files['arr_pdf_' . $lang->code]['name'][$key];
                $_FILES['userfile']['type'] = $files['arr_pdf_' . $lang->code]['type'][$key];
                $_FILES['userfile']['tmp_name'] = $files['arr_pdf_' . $lang->code]['tmp_name'][$key];
                $_FILES['userfile']['error'] = $files['arr_pdf_' . $lang->code]['error'][$key];
                $_FILES['userfile']['size'] = $files['arr_pdf_' . $lang->code]['size'][$key];

                $temp_var = $this->MUtils->doUploadPdf('userfile', 'pdf');
                if ($temp_var != "") {
                    $data['old_pdf_' . $lang->code][] = $temp_var;
                }
            }

            $data['old_pdf_2' . $lang->code] = $this->input->post("old_updated_pdf_2" . $lang->code);

            foreach ($files['arr_pdf_2' . $lang->code]['name'] as $key => $value) {
                $_FILES['userfile']['name'] = $files['arr_pdf_2' . $lang->code]['name'][$key];
                $_FILES['userfile']['type'] = $files['arr_pdf_2' . $lang->code]['type'][$key];
                $_FILES['userfile']['tmp_name'] = $files['arr_pdf_2' . $lang->code]['tmp_name'][$key];
                $_FILES['userfile']['error'] = $files['arr_pdf_2' . $lang->code]['error'][$key];
                $_FILES['userfile']['size'] = $files['arr_pdf_2' . $lang->code]['size'][$key];

                $temp_var2 = $this->MUtils->doUploadPdf('userfile', 'pdf');
                if ($temp_var2 != "") {
                    $data['old_pdf_2' . $lang->code][] = $temp_var2;
                }
            }

            $data['title_' . $lang->code] = $this->input->post('title_' . $lang->code);
            $data['short_desc_' . $lang->code] = $this->input->post('short_desc_' . $lang->code);
            $data['editor_' . $lang->code] = $this->input->post('editor_' . $lang->code);
            $data['meta_title_' . $lang->code] = $this->input->post('meta_title_' . $lang->code);
            $data['meta_keywords_' . $lang->code] = $this->input->post('meta_keywords_' . $lang->code);
            $data['meta_desc_' . $lang->code] = $this->input->post('meta_desc_' . $lang->code);
            $data['cd_id_' . $lang->code] = $this->input->post('cd_id_' . $lang->code);
            $data['year_' . $lang->code] = $this->input->post('year_' . $lang->code);
            $data['pdf_ids_' . $lang->code] = json_encode($data['old_pdf_' . $lang->code]);
            $data['pdf_ids2_' . $lang->code] = json_encode($data['old_pdf_2' . $lang->code]);
        }


        // echo json_encode($data);

        $status = "";
        $defaultCode = $languages[0]->code;
        if ( isset($_POST['title_' . $defaultCode] ) )
        {
            $this->load->model("MPages");
            $status = $this->MPages->editPage($data);
        }


        if ($status==1)
        {
            $data['status'] = "Page Updated Successfully.";
            $data['statusCode'] = 1;
        }
        else
        {
            $data['status'] = "Error occurred while adding page.";
            $data['statusCode'] = 0;
        }

        if (strtolower($this->input->get('q')) == "home" ||
            strtolower($this->input->get('q')) == "contact" ||
            strtolower($this->input->get('q')) == "about") {
            
            $this->load->helper('url');
            redirect('/Pages/Edit?id='.$this->input->post('cid').'&q='.$this->input->get('q'), 'refresh');
        }

        $this->load->helper('url');
        redirect('/Pages/View?q='.$this->input->get('q'), 'refresh');
    }

    //Show all the pages on 1 page..
    public function View($data='')
    {
        //Load languages and Default Language
        $data = array();
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Pages/View?q=" . $this->MUtils->StringPrepare($this->input->get("q"));
        $data['breadcrumb_anchor1'] = $this->MUtils->StringPrepare($this->input->get("q"));

        $data['activeMenu'] = "mnuPages";

        $data['type'] = $this->MUtils->StringPrepare($this->input->get("q"));

        if (strlen( $this->input->get('q') ) > 1 )
            $data['entity'] = $this->MUtils->StringPrepare($this->input->get('q'));

        //Loading Data for this view
        $this->load->model("MPages");


		$pages = $this->MPages->viewPages($data['entity'])->result();

        //seperate data according to languages in different arrays

        $data['view'] = $this->MUtils->arrangeDataAccordingToLanguage($pages, $data);

        /*print_r($pages);
        exit();*/
        $data['main_content'] = "Admin/Pages/view.php";

        $this->load->view("Admin/default.php", $data);
    }

    //Delete Page
    public function Delete()
    {
        $id = $this->input->get('id');

        $this->load->model("MPages");
        $status = $this->MPages->deletePage($id);

        if ($status)
            $this->MUtils->setSuccess("Record Deleted Successfully");
        else
            $this->MUtils->setError("Error occurred while deleting record");

        echo $this->MUtils->getStatus();
    }

}