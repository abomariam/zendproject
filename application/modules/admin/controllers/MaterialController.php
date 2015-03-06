<?php

class Admin_MaterialController extends Zend_Controller_Action
{

    public function init()
    {
       $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            if($auth->getIdentity()->role =='admin'){
                $this->view->admin=$auth->getIdentity(); 
            }else{
                $this->_redirect("user/login");
            }           
        }else {
            $this->_redirect("index/index");
        }
    }

    public function indexAction()
    {
        // action body
    }

    public function deleteAction()
    {
        // action body
    }

    public function listAction()
    {
        // action body
    }

    public function addAction()
    {
        $user_form = new Application_Form_MaterialForm();
        if($this->getRequest()->isGet()){
            if($user_form->isValid($_GET)){
                $data = $this->getRequest()->getParams();
            }
             $this->view->form = $user_form;
        }else{
                $this->_redirect("user/index");
            }  
    }

    public function editAction()
    {
        // action body
    }


}









