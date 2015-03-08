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
        $cat_model=new Application_Model_Category();
        $categories =$cat_model->getAllCategories();
        $auth = Zend_Auth::getInstance();
        
        $cat_arr = [];
        foreach ($categories as $cat ){
            $cat_arr[$cat['id']] = $cat['name'];
        }
       
        $user_form = new Application_Form_CourseForm();
        $user_form->category_id->setMultiOptions($cat_arr);
        $user_form->instructor_id->setValue($auth->getIdentity()->id);
        if($this->getRequest()->isPost()){
            if($user_form->isValid($_POST)){
                $cor_model = new Application_Model_Course();
                $result = $cor_model->addCourse($user_form->getValues());
                
                if ($result > 0){
                    $this->view->success_message = "Course Added Successfully";
                } else {
                    $this->view->error_message = "Failed To add the Course";
                }
            }
        } 
         $this->view->form = $user_form;
    }

    public function listAction()
    {
       $user_form = new Application_Form_CourseForm();
       $user_form->removeElement('submit');

       $this->view->form = $user_form;

       $cat_model=new Application_Model_Course();
       $this->view->courses=$cat_model->getAllCourse();
       
       $cat_model=new Application_Model_Category();
       $this->view->cats=$cat_model->getAllCategories();
       
       $users_model=new Application_Model_User();
       $this->view->users=$users_model->getAllUsers();
    }

    public function deleteAction()
    {
        if ($this->getRequest()->isPost()) {
            $this->_helper->layout()->disableLayout();
            $this->_helper->viewRenderer->setNoRender(true);

            $id = $this->getRequest()->getParam('id');

            $model = new Application_Model_Course();

            echo $model->deleteCourse($id);
        }
    }


}