<?php

class Gallery extends CI_Controller {

    //Show the view for adding new pages
    public function Index()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Gallery";
        $data['breadcrumb_anchor1'] = "Gallery";

        if((int)$this->input->get('id')) {
            $album_id = (int)$this->input->get('id');
            $sql = "select * from gallery WHERE album_id ='".$album_id ." ' order by id asc";
            $page_content = $this->db->query($sql)->result();
            $data['album_id'] = $album_id;
        } else {
            redirect('Album/View');
        }


        $data['page_content'] = $page_content;
        $data['main_content'] = "Admin/Gallery/view";
        
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
            'image' => $this->MUtils->doUploadPath('uimage', 'gallery'),
            'album_id' => $this->input->post('album_id')
        );
        $this->db->insert('gallery', $arr);
        
        $this->load->helper('url');
        redirect('/Gallery?id='. $this->input->post('album_id'), 'refresh');
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
            'image' => $this->MUtils->doUploadPath('uimage', 'gallery'),
        );

        $this->db->update('gallery', $arr, 'id = '.$this->input->post('uid'));
        
        $this->load->helper('url');
        redirect('/Gallery?id='. $this->input->post('album_id'), 'refresh');
    }

    //Delete Page
    public function Delete()
    {
        $this->db->where('id', $this->input->post('uid'));
        $this->db->delete('gallery', $arr);

        $this->load->helper('url');
        redirect('/Gallery', 'refresh');
    }

}