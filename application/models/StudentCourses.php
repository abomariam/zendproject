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

    function getStudentCoursesByStudentId($id) {
        $select = $this->select()
                ->where("user_id=$id")
                ->Join('user', 'user.id=student_courses.student_id');
        return $this->fetchAll($select)->toArray();
    }

    function getStudentCoursesByCourseId($id) {
        $select = $this->select()
                ->where("user_id=$id")
                ->Join('user', 'user.id=student_courses.course_id');
        return $this->fetchAll($select)->toArray();
    }

}
