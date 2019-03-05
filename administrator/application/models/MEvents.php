<?php

class MEvents extends CI_Model {

    var $entityType = 'events';

    function addEvent($data)
    {
        $this->MContent->setEntity($this->entityType);
        return $this->MContent->add($data);
    }


    function editEvent($data)
    {
        $this->MContent->setEntity($this->entityType);
        return $this->MContent->edit($data);
    }

    function viewEvents()
    {
        $this->MContent->setEntity($this->entityType);
        return $this->MContent->view();
    }

    function viewEventById($id)
    {
        $this->MContent->setEntity($this->entityType);
        return $this->MContent->viewById($id);
    }

    function deleteEvent($id)
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