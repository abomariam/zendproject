<?php

class Admin_MaterialController extends Zend_Controller_Action
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

    public function deleteAction()
    {
        $id=$this->_request->getparam('id');
            if(!empty($id))
            {
		$del_model=new Application_Model_Material();
		$del_model->deleteMaterial($id);
            }
	$this->redirect('/material');
    }

    public function listAction()
    {
       $mat_model=new Application_Model_Material();
       $this->view->cat=$mat_model->getAllMaterials();
    }

    public function addAction()
    {
        $user_form = new Application_Form_MaterialForm();
        if($this->getRequest()->isPost()){
            if($user_form->isValid($_POST)){
                $mat_model = new Application_Model_Material();
                $mat_model->addMaterial($user_form->getValues());
            }
        }
        $this->view->form = $user_form;
    }

    public function editAction()
    {
        // action body
    }


}