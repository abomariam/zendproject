<?php

class Application_Model_User extends Zend_Db_Table_Abstract {

    protected $_name = 'user';

    function addUser($data) {
        $this->insert($data);
        
    }

    function deleteUser($id) {
         $this->delete("id=$id");
        
    }

    function updateUser($data) {
        $this->update($data, 'id=' . $data['id']);
        
        
    }

    function getAllUsers() {
        return $this->fetchAll()->toArray();
        
    }

    function getUserById($id) {
        $array = $this->find($id)->toArray();
    }

}
