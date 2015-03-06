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
       $cat_model=new Application_Model_Category();
       $this->view->cat=$cat_model->getAllCategories();
    }

    public function addAction()
    {       
        $user_form = new Application_Form_CategoryForm();
        if($this->getRequest()->isPost()){
            if($user_form->isValid($_POST)){
                $cat_model = new Application_Model_Category();
                $cat_model->addCategory($user_form->getValues());
            }
        }
        $this->view->form = $user_form;
    }

    public function deleteAction()
    {
        $id=$this->_request->getparam('id');
            if(!empty($id))
            {
		$del_model=new Application_Model_Category();
		$del_model->deleteCategory($id);
            }
	$this->redirect('/category');   
    }

    public function editAction()
    {
        $id = $this->_request->getParam('id');
	$this->view->action = 'edit';
	if(!empty($id)){
            $category_model = new Application_Model_Category();
            $catinfo = $category_model->getCategoriesById($id);
            $this->view->cat = $catinfo[0];
	}
	if($this->_request->isPost()){
            $data = $this->_request->getParams();
            $update_model = new Application_Model_Category();
            $update_model->updateCategory($data);
	}
	//$this->render('add');
    }
}