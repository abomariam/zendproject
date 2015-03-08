<?php

class Admin_UserController extends Zend_Controller_Action {

    public function init() {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            if ($auth->getIdentity()->role == 'admin') {
                $this->view->admin = $auth->getIdentity();
            } else {
                $this->_redirect('student/login');
            }
        } else {
            $this->_redirect('student/login');
        }
    }

    public function indexAction() {
        // action body
//        $auth = Zend_Auth::getInstance();
//        $this->view->admin = $auth->getIdentity();
    }

    public function editAction() {
        // action body
//        var_dump($this->getRequest()->getParams());

        if ($this->getRequest()->isPost()) {
            $this->_helper->layout()->disableLayout();
            $this->_helper->viewRenderer->setNoRender(true);

//                $user_form = new Application_Form_UserAdminForm();
//                $user_form->email->clearValidators();
//                
//                $user_form->removeElement('password');
//                
//                $user_form->populate($_POST);
//                var_dump($user_form->getValues());
//                var_dump($_POST);
//                if ($user_form->isValid($_POST)) {
//                    $data = $user_form->getValues();
//                    
            $model = new Application_Model_User();
//                    if (!empty($data['pic'])) {
//                        try {
//                            $user_form->pic->receive();
//                            $location = $user_form->pic->getFileName();
//
//                            $data['pic'] = substr($location, strlen(APPLICATION_PATH) + 10);
//                        } catch (Exception $exception) {
//                            //error uploading file
//    //                        $this->view->error_message = "Error uploading the file";
//                        }
//                    }
//            var_dump($_POST);
            echo $model->updateUser($_POST);

//                }
        }
    }

    public function addAction() {
        $user_form = new Application_Form_UserAdminForm();

        if ($this->getRequest()->isPost()) {
            if ($user_form->isValid($_POST)) {
                $data = $user_form->getValues();
                $model = new Application_Model_User();
                if (!empty($data['pic'])) {
                    try {
                        $user_form->pic->receive();
                        $location = $user_form->pic->getFileName();

                        $data['pic'] = substr($location, strlen(APPLICATION_PATH) + 10);
                    } catch (Exception $exception) {
                        //error uploading file
                        $this->view->error_message = "Error uploading the file";
                    }
                }
                $model->addUser($data);
                $this->view->success_message = "User Added Succefully";
            }
        }
        $this->view->form = $user_form;
    }

    public function listAction() {
        // action body
        $user_form = new Application_Form_UserAdminForm();
        $user_form->removeElement('submit');
        $user_form->removeElement('password');
        $this->view->form = $user_form;

        $model = new Application_Model_User();
        $this->view->users = $model->getAllUsers();
    }

    public function deleteAction() {
        // action body
        //var_dump($this->getRequest()->getParams());

        if ($this->getRequest()->isPost()) {
            $this->_helper->layout()->disableLayout();
            $this->_helper->viewRenderer->setNoRender(true);

            $id = $this->getRequest()->getParam('id');

            $model = new Application_Model_User();

            echo $model->deleteUser($id);
        }
    }
 

}
