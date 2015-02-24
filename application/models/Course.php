<?php

class Application_Model_Course extends Zend_Db_Table_Abstract {

    protected $_name = 'course';

    function addCourse($data) {
        $this->insert($data);
    }

    function deleteCourse($id) {
        $this->delete("id=$id");
    }

    function updateCourse($data) {
        $this->update($data, 'id=' . $data['id']);
    }

    function getAllCourse() {
        return $this->fetchAll()->toArray();
    }

    function getCourseById($id) {
        $array = $this->find($id)->toArray();
    }

}
