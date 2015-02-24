<?php

class Application_Model_StudentCourses extends Zend_Db_Table_Abstract {

    protected $_name = 'student_courses';

    function addStudentCourse($data) {
        $this->insert($data);
    }

    function deleteStudentCourse($id) {
        $this->delete("id=$id");
    }

    function updateStudentCourse($data) {
        $this->update($data, 'id=' . $data['id']);
    }

    function getAllStudentCourse() {
        return $this->fetchAll()->toArray();
    }

    function getStudentCourseById($id) {
        $array = $this->find($id)->toArray();
        return $array[0];
    }

}
