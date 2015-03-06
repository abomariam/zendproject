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
        $user_form = new Application_Form_CommentForm();
        if($this->getRequest()->isGet()){
            if($user_form->isValid($_GET)){
                $data = $this->getRequest()->getParams();
            }
             $this->view->form = $user_form;
        }else{
                $this->_redirect("user/index");
            }
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









