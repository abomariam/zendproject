<?php

class User_StudentController extends Zend_Controller_Action
{

    public function init()
    {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $this->view->user=$auth->getIdentity();            
        }
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
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
        $user_form = new Application_Form_UserLogin();
        if($this->getRequest()->isPost()){
            if($user_form->isValid($_POST)){
                $data = $this->getRequest()->getParams();
                $db = Zend_Db_Table::getDefaultAdapter();
                $authAdapter = new Zend_Auth_Adapter_DbTable($db, 'user','email', 'password');
                $authAdapter->setIdentity($data['email']);
                $authAdapter->setCredential(md5($data['password']));
                $result = $authAdapter->authenticate();
                if ($result->isValid()) {
                    $storage = $auth->getStorage();
                    $storage->write($authAdapter->getResultRowObject(array('id','name','email','gender' , 'signature','country' , 'pic','is_active','role')));              
                    if($auth->getIdentity()->is_active){
                        return $this->_redirect('material/list');
                        }else{
                            $authAdapter->clearIdentity();
                            $this->view->loginMessage = "Sorry, your account isn't active ";
                        }
                    }else{
                         $this->view->loginMessage = "Sorry, your username or password was incorrect";
                        }
            }    
        }
        }else{
                $this->_redirect("index/index");
            }
        $this->view->form = $user_form;
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