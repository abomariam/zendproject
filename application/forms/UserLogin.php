<?php

class Application_Form_UserLogin extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $control_decorator = Application_Form_Helper::$control_decorator;
        $btn_decorator = Application_Form_Helper::$btn_decorator;
        $countries = Application_Form_Helper::$countries;
        
        
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('E-Mail')
            ->addValidator(new Zend_Validate_EmailAddress)
            ->addFilter(new Zend_Filter_StripTags)
            ->setRequired()
            ->setDescription('Enter your Email.')
            ->setDecorators($control_decorator)
            ->setAttrib('class', 'form-control');
//        
       $password = new Zend_Form_Element_Password('password');
       $password->setLabel('Password')
            ->addFilter(new Zend_Filter_StripTags)
            ->setRequired()
            ->setDescription('Please Enter Your Password.')
            ->setDecorators($control_decorator)
            ->setAttrib('class', 'form-control');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('class', 'btn btn-primary pull-right')
                ->setDecorators($btn_decorator)
                ->setLabel('Submit');
        
        $this->addElements(array($email,$password,$submit));

    }


}

