<?php

class User_ErrorController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function errorAction()
    {
        var_dump($this->_getAllParams());
    }

    public function error403Action()
    {
        // action body
    }


}


