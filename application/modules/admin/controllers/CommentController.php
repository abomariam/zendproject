<?php

class Admin_CommentController extends Zend_Controller_Action
{

    public function init()
    {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $this->view->admin=$auth->getIdentity();            
        }
    }

    public function indexAction()
    {
        // action body
    }

    public function addAction()
    {
        // action body
    }

    public function listAction()
    {
        // action body
    }

    public function editAction()
    {
        // action body
    }

    public function deleteAction()
    {
        // action body
    }


}









