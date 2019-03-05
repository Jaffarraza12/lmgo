<?php

class MPage extends CI_Model
{
    public $entityType = 'News'; // Not using this variable.. page entity coming form querystring..

    public function view($entity = 'News')
    {
        $this->MContent->setEntity($entity);
        return $this->MContent->view()->result();
    }

    public function viewById($id)
    {
        $this->MContent->setEntity($this->entityType);
        return $this->MContent->viewById($id)->result();
    }

    public function viewByTerm($term)
    {
        $this->MContent->setEntity($this->entityType);
        return $this->MContent->viewByTerm($term)->result();
    }
}
