<?php

class Application_Model_Comment extends Zend_Db_Table_Abstract {

    protected $_name = 'comment';

    function addComment($data) {
        $this->insert($data);
    }

    function deleteComment($id) {
        $this->delete("id=$id");
    }

    function updateComment($data) {
        $this->update($data, 'id=' . $data['id']);
    }

    function getAllComments() {
        return $this->fetchAll()->toArray();
    }

    function getCommentById($id) {
        $array = $this->find($id)->toArray();
    }
    
    function getCommentsByMaterial_Id($id){
       return $this->fetchAll("materialid=$id")->toArray();
    }
    
    function getCommentsByCourse_Id($id){
       return $this->fetchAll("courseid=$id")->toArray();
    }
    
    
    function getCommentsByUser_Id($id){
        return $this->fetchAll("userid=$id")->toArray();
    }

}
