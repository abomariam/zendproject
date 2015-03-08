<?php

class Admin_CommentController extends Zend_Controller_Action
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

    public function addAction()
    {
        $user_form = new Application_Form_CommentForm();
        if($this->getRequest()->isPost()){
            if($user_form->isValid($_POST)){
                $com_model = new Application_Model_Comment();
                $com_model->addComment($user_form->getValues());
            }
        }
        $this->view->form = $user_form;
    }

    public function listAction()
    {
        $id=$this->_request->getparam('material_id');
            if(!empty($id))
            {
		$del_model=new Application_Model_Material();
		$del_model->getCommentsByMaterial_Id($id);
            }
    }

    public function editAction()
    {
        // action body
    }

    public function deleteAction()
    {
        if ($this->getRequest()->isPost()) {
            $this->_helper->layout()->disableLayout();
            $this->_helper->viewRenderer->setNoRender(true);

            $id = $this->getRequest()->getParam('id');

            $model = new Application_Model_Comment();

            echo $model->deleteComment($id);
        }
    }
}

