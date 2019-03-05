<?php

class MNews extends CI_Model {

    var $entityType = 'news';

    function addNews($data)
    {
        $this->MContent->setEntity($this->entityType);
        return $this->MContent->add($data);
    }

    function editNews($data)
    {
        $this->MContent->setEntity($this->entityType);
        return $this->MContent->edit($data);
    }

    function viewNews()
    {
        $this->MContent->setEntity($this->entityType);
        return $this->MContent->view();
    }

    function viewNewsById($id)
    {
        $this->MContent->setEntity($this->entityType);
        return $this->MContent->viewById($id);
    }

    function deleteNews($id)
    {
        $this->MContent->setEntity($this->entityType);
        return $this->MContent->delete($id);
    }

    function setStatus($id)
    {
        $this->MContent->setEntity($this->entityType);
        return $this->MContent->setStatus($id);
    }
}