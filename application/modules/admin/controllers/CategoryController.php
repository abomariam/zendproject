<?php

class Admin_CategoryController extends Zend_Controller_Action
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

    public function listAction()
    {
       $user_form = new Application_Form_CategoryForm();
        $user_form->removeElement('submit');

        $this->view->form = $user_form;
        
        $cat_model=new Application_Model_Category();
       $this->view->cat=$cat_model->getAllCategories();
       
    }

    public function addAction()
    {       
        $user_form = new Application_Form_CategoryForm();
        if($this->getRequest()->isPost()){
            if($user_form->isValid($_POST)){
                $cat_model = new Application_Model_Category();
                $result = $cat_model->addCategory($user_form->getValues());
                if ($result > 0){
                    $this->view->success_message = "Category Added Successfully";
                } else {
                    $this->view->error_message = "Failed To add the Category";
                }
            }
        }
        $this->view->form = $user_form;
    }

    public function deleteAction()
    {
        if ($this->getRequest()->isPost()) {
            $this->_helper->layout()->disableLayout();
            $this->_helper->viewRenderer->setNoRender(true);

            $id = $this->getRequest()->getParam('id');

            $model = new Application_Model_Category();

            echo $model->deleteCategory($id);
        }
    }

    public function editAction()
    {
        if ($this->getRequest()->isPost()) {
            $this->_helper->layout()->disableLayout();
            $this->_helper->viewRenderer->setNoRender(true);
            
            $model = new Application_Model_Category();
            echo $model->updateCategory($_POST);

        }
    }
}
