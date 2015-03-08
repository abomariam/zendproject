<?php

class Application_Model_Category extends Zend_Db_Table_Abstract {

    protected $_name = 'category';

    function addCategory($data) {
        return $this->insert($data);
    }

    function deleteCategory($id) {
        return $this->delete("id=$id");
    }

    function updateCategory($data) {
        return $this->update($data, 'id=' . $data['id']);
    }

    function getAllCategories() {
        return $this->fetchAll()->toArray();
    }

    function getCategoriesById($id) {
        $array = $this->find($id)->toArray();
        return $array[0];
    }
}