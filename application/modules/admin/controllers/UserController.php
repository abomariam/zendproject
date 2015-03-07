<?php

class Admin_UserController extends Zend_Controller_Action
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

    public function editAction()
    {/*
        $id = $this->_request->getParam('id');
	$this->view->action = 'edit';
	if(!empty($id)){
            $user_model = new Application_Model_User();
            $userinfo = $user_model->getUserById($id);
            $this->view->user = $userinfo[0];
	}
	if($this->_request->isPost()){
            $data = $this->_request->getParams();
            $update_model = new Application_Model_User();
            $update_model->updateUser($data);
	}*/
    }

    public function addAction()
    {
        $user_form = new Application_Form_UserAdminForm();
        if($this->getRequest()->isPost()){
            if($user_form->isValid($_POST)){
                $user_model = new Application_Model_User();
                $user_model->addUser($user_form->getValues());
            }
        }
        $this->view->form = $user_form;
    }

    public function listAction()
    {
       $user_model=new Application_Model_User();
       $this->view->cat=$user_model->getAllUsers();
    }

    public function deleteAction()
    {
        $id=$this->_request->getparam('id');
            if(!empty($id))
            {
		$del_model=new Application_Model_User();
		$del_model->deleteUser($id);
            }
	$this->redirect('/admin'); 
    }
}