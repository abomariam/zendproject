<?php

class Application_Model_Course extends Zend_Db_Table_Abstract {

    protected $_name = 'course';

    function addCourse($data) {
        return $this->insert($data);
    }

    function deleteCourse($id) {
        return $this->delete("id=$id");
    }

    function updateCourse($data) {
        return $this->update($data, 'id=' . $data['id']);
    }

    function getAllCourse() {
        return $this->fetchAll()->toArray();
    }

    function getCourseById($id) {
        $array = $this->find($id)->toArray();
        return $array[0];
    }

    function getCoursesByCategory_Id($id) {
        return $this->fetchAll("category_id=$id")->toArray();
    }

    function getCategoryByCourseId($id) {
        $select = $this->select()
                ->where("category_id=$id")
                ->Join('category', 'category.id=course.category_id');
        return $this->fetchAll($select)->toArray();
    }
    
    function getUserByCourseId($id) {
        $select = $this->select()
                ->where("instructor_id=$id")
                ->Join('user', 'user.id=course.instructor_id');
        return $this->fetchAll($select)->toArray();
    }
}
    
