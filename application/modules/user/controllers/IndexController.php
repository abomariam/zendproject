<?php

class User_IndexController extends Zend_Controller_Action
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


}

