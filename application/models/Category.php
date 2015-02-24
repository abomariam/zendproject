<?php

class Application_Model_Category extends Zend_Db_Table_Abstract {

    protected $_name = 'category';

    function addCategory($data) {
        $this->insert($data);
    }

    function deleteCategory($id) {
        $this->delete("id=$id");
    }

    function updateCategory($data) {
        $this->update($data, 'id=' . $data['id']);
    }

    function getAllCategories() {
        return $this->fetchAll()->toArray();
    }

    function getCategoriesById($id) {
        $array = $this->find($id)->toArray();
    }
}