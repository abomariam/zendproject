<?php

class Admin_StatisticsController extends Zend_Controller_Action
{

    public function init()
    {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $this->view->admin=$auth->getIdentity();            
        }
    }

    public function indexAction()
    {
        // action body
    }

    public function listAction()
    {
        // action body
    }


}



