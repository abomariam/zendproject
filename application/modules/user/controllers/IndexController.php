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
    }


}

