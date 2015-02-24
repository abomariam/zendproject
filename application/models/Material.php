<?php

class Application_Model_Material extends Zend_Db_Table_Abstract {

    protected $_name = 'material';

    function addMaterial($data) {
        $this->insert($data);
    }

    function deleteMaterial($id) {
        $this->delete("id=$id");
    }

    function updateMaterial($data) {
        $this->update($data, 'id=' . $data['id']);
    }

    function getAllMaterials() {
        return $this->fetchAll()->toArray();
    }

    function getMaterialById($id) {
        $array = $this->find($id)->toArray();
    }
    
    function getMaterialsByCourseId($id){
      return $this->fetchAll("course_id=$id")->toArray();
      
    }
    
  
    
}