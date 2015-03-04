<?php

class User_StudentController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function registerAction()
    {
        $this->view->page_title = "Registration";
        $user_form = new Application_Form_UserDetails();
        
        
        if($this->getRequest()->isPost()){
            if($user_form->isValid($_POST)){
                $user_model = new Application_Model_User();
                $this->view->success = $user_model->addUser($user_form->getValues());
            }
        }
        
        $this->view->form = $user_form;
    }

    public function loginAction()
    {
        if($this->getRequest()->isPost()){
            $data = $this->getRequest()->getParams();
            $db = Zend_Db_Table::getDefaultAdapter();
            
            $authAdapter = new Zend_Auth_Adapter_DbTable($db, 'user','email', 'password');
            $authAdapter->setIdentity($data['email']);
            $authAdapter->setCredential(md5($data['password']));
            $result = $authAdapter->authenticate();
            if ($result->isValid()) {
            
            $auth = Zend_Auth::getInstance();
            $storage = $auth->getStorage();
            $storage->write($authAdapter->getResultRowObject(
            array('email' , 'id' , 'full_name', 'role')));
            
            return $this->_redirect('post/list');
            } else {
            $this->view->loginMessage = "Sorry, your username or password was incorrect";
            $this->_forward('index','index');
            }
        }
    }

    public function editAction()
    {
        // action body
    }

    public function deleteAction()
    {
        // action body
    }
    
     public function logoutAction()
    {
        $authAdapter = Zend_Auth::getInstance();
        $authAdapter->clearIdentity();
        $this->_redirect("index/index");
    }
}