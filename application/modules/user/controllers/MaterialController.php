<?php

class User_MaterialController extends Zend_Controller_Action
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
       $user_model=new Application_Model_Material();
       $this->view->mat=$user_model->getAllMaterials();
    }


}



