<?php

class Application_Model_Request extends zend_db_Table {

    protected $_name = 'request';

    function addModel($data) {
        $this->insert($data);
    }

    function deleteModel($id) {
        $this->delete("id=$id");
    }

    function updateModel($data) {
        $this->update($data, 'id=' . $data['id']);
    }

    function getAllUsers() {
        return $this->fetchAll()->toArray();
    }

    function getUserById($id) {
        $array = $this->find($id)->toArray();
    }

}
