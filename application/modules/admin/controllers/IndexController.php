<?php

class Admin_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
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

    public function indexAction()
    {
        // action body
    }


}

