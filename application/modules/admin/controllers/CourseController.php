<?php

class Admin_CourseController extends Zend_Controller_Action
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
            $category_model = new Application_Model_Course();
            $catinfo = $category_model->getCategoriesById($id);
            $this->view->cat = $catinfo[0];
	}
	if($this->_request->isPost()){
            $data = $this->_request->getParams();
            $update_model = new Application_Model_Course();
            $update_model->updateCourse($data);
	}
	//$this->render('add');*/
    }

    public function addAction()
    {
        $user_form = new Application_Form_CourseForm();
        if($this->getRequest()->isPost()){
            if($user_form->isValid($_POST)){
                $cor_model = new Application_Model_Course();
                $cor_model->addCourse($user_form->getValues());
            }
        } 
         $this->view->form = $user_form;
    }

    public function listAction()
    {
       $cor_model=new Application_Model_Course();
       $this->view->cor=$cor_model->getAllCourse();
    }

    public function deleteAction()
    {
        $id=$this->_request->getparam('id');
            if(!empty($id))
            {
		$del_model=new Application_Model_Course();
		$del_model->deleteCourse($id);
            }
	$this->redirect('/course');  
    }


}









