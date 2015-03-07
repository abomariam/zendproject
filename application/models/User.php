<?php

class Application_Model_User extends Zend_Db_Table_Abstract {

    protected $_name = 'user';

    function addUser($data) {
        $data["password"]=md5($data["password"]);
        $this->insert($data);
        
    }

    function deleteUser($id) {
         return $this->delete("id=$id");
        
    }

    function updateUser($data) {
        $id = $data['id'];
        return $this->update($data, "id=$id");
        
        
    }

    function getAllUsers() {
        return $this->fetchAll()->toArray();
        
    }

    function getUserById($id) {
        $array = $this->find($id)->toArray();
        return $array[0];
    }
    
    
    
    
    
    

}
