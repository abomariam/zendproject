<?php

class User_CommentController extends Zend_Controller_Action
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

    public function addAction()
    {
        $user_form = new Application_Form_CommentForm();
        if($this->getRequest()->isPost()){
            if($user_form->isValid($_POST)){
                $cat_model = new Application_Model_Comment();
                $result = $cat_model->addComment($user_form->getValues());
                if ($result > 0){
                    $this->view->success_message = "Category Added Successfully";
                } else {
                    $this->view->error_message = "Failed To add the Category";
                }
            }
        }
        $this->view->form = $user_form;
    }

    public function editAction()
    {/*
        $id=$this->_request->getparam('user_id');
        $data=$this->_request->getUserParams();
        if($auth->getIdentity()->id ==$id){
                $up_model=new Application_Model_Comment();
		$up_model->updateComment($data); 
            }else{
                $this->_redirect("user/login");
            }*/ 
    }


}