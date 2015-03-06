<?php

class Admin_CategoryController extends Zend_Controller_Action
{

    public function init()
    {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            if($storage->role==='admin'){
                $this->view->admin=$auth->getIdentity(); 
            }else{
                $this->_redirect("index/index");
            }           
        }
    }

    public function indexAction()
    {
        // action body
    }

    public function listAction()
    {
        // action body
    }

    public function addAction()
    {
        $user_form = new Application_Form_CategoryForm();
       if($this->getRequest()->isGet()){
            if($user_form->isValid($_GET)){
                $data = $this->getRequest()->getParams();
            }
            $this->view->form = $user_form;
        }else{
                $this->_redirect("user/index");
            }  
    }

    public function deleteAction()
    {
        // action body
    }

    public function editAction()
    {
        // action body
    }


}









