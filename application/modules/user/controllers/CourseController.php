<?php

class User_CourseController extends Zend_Controller_Action
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

    public function listAction()
    {
       
        $id=$this->_request->getparam('id');
        $cat_id=$this->_request->getparam('category_id');
        $admin_id=$this->_request->getparam('instructor_id');
        $user_model=new Application_Model_Course();
        $this->view->course=$user_model->getAllCourse();
        if(!empty($cat_id))
		{
            $this->view->cor=$user_model->getCategoryByCourseId($cat_id);
        }
        
        if(!empty($admin_id))
        {
           $this->view->col=$user_model->getUserByCourseId($admin_id); 
        }
        
    }
}