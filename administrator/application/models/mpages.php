<?php

class MPages extends CI_Model
{

    public $entityType = 'News'; // Not using this variable.. page entity coming form querystring..

    public function addPage($data)
    {
        $this->MContent->setEntity($data['entity']);
        return $this->MContent->add($data);
    }

    public function editPage($data)
    {
        $this->MContent->setEntity($data['entity']);
        return $this->MContent->edit($data);
    }

    public function viewPages($entity)
    {
        $this->MContent->setEntity($entity);
        return $this->MContent->view();
    }

    public function viewPageById($id)
    {
        $this->MContent->setEntity($this->entityType);
        return $this->MContent->viewById($id);
    }

    public function deletePage($id)
    {
        $this->MContent->setEntity($this->entityType);
        return $this->MContent->delete($id);
    }
}
