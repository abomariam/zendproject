<?php

class Admin_UserController extends Zend_Controller_Action
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

    public function editAction()
    {
        // action body
    }

    public function addAction()
    {
        $user_form = new Application_Form_UserAdminForm();
        if($this->getRequest()->isPost()){
            if($user_form->isValid($_POST)){
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

    public function deleteAction()
    {
        // action body
    }


}









