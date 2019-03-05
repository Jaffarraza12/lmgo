<?php

class SlideShow extends CI_Controller {

    //Show the view for adding new pages
    public function Index()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Slideshow";
        $data['breadcrumb_anchor1'] = "Slideshow";

        $sql = "select * from slideshow order by id asc";
        $page_content = $this->db->query($sql)->result();

        $data['page_content'] = $page_content;
        $data['main_content'] = "Admin/Slideshow/view";
        
        $this->load->view('Admin/default.php', $data);
    }

    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        // $data['breadcrumb_link1'] = "/Pages/View";
        // $data['breadcrumb_anchor1'] = "Pages";
        // $data['breadcrumb_link2'] = "/Pages/Add";
        // $data['breadcrumb_anchor2'] = "Add New Page";

        $arr = array (
            'image' => $this->MUtils->doUploadPath('uimage', 'slideshow')
        );
        $this->db->insert('slideshow', $arr);
        
        $this->load->helper('url');
        redirect('/Slideshow', 'refresh');
    }

    //Show the view to edit page
    public function Replace()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        // $data['breadcrumb_link1'] = "/Pages/View";
        // $data['breadcrumb_anchor1'] = "Pages";
        // $data['breadcrumb_link2'] = "/Pages/Add";
        // $data['breadcrumb_anchor2'] = "Add New Page";

        // $sql = "select image from slideshow where id = " . $this->input->post('uid');
        // $old_image = $this->db->query($sql)->result()[0]->image;

        $arr = array (
            'image' => $this->MUtils->doUploadPath('uimage', 'slideshow')
        );

        $this->db->update('slideshow', $arr, 'id = '.$this->input->post('uid'));
        
        $this->load->helper('url');
        redirect('/Slideshow', 'refresh');
    }

    //Delete Page
    public function Delete()
    {
        $this->db->where('id', $this->input->post('uid'));
        $this->db->delete('slideshow', $arr);

        $this->load->helper('url');
        redirect('/Slideshow', 'refresh');
    }

}