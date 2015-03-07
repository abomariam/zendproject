<?php

class Application_Form_UserDetails extends Zend_Form
{
    
    
    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        //$this->addElementPrefixPath('My_Decorator', 'My/Decorator/', 'decorator');
        
//        $this->setMethod("post");
        $control_decorator = Application_Form_Helper::$control_decorator;
        $btn_decorator = Application_Form_Helper::$btn_decorator;
        $countries = Application_Form_Helper::$countries;
        
//        ZendX_JQuery::enableForm($this);
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('User Name')
            ->addValidator(new Zend_Validate_Alpha)
            ->addFilter(new Zend_Filter_StripTags)
            ->setRequired()
            ->setDescription('Please Enter Your Full Name.')
            ->setDecorators($control_decorator)
            ->setAttrib('class', 'form-control');
//        $name->getDecorator('label')->setOptions(array('class'=>'control-label'));
//        $name->getDecorator('HtmlTag')->setOptions(array('tag'=>'div','class'=>'col-md-4'));
//        $name->addDecorator('HtmlTag','div');
        //$name->addPrefixPath('My_Decorator', 'My/Decorator/', 'decorator');
        
        
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('E-Mail')
            ->addValidator(new Zend_Validate_EmailAddress)
            ->addValidator(new Zend_Validate_Db_NoRecordExists(array('table' => 'user', 'field' => 'email')))
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
        
        //$gender = new Zend_Form_Element_Radio('gender');
        //$gender->setMultiOptions(array('male'=>'Male','female'=>'Female'));
        //$gender->setValue('male');
        $gender = new Zend_Form_Element_Radio('gender');
        $gender->setMultiOptions(array('male'=>'Male','female'=>'Female'))
                ->setLabel('Gender')
                ->setDecorators($control_decorator)
                ->setAttrib('class', 'from-control')
                ->setValue('male');
        
        $country = new Zend_Form_Element_Select('country');
        $country->setMultiOptions($countries)
                ->setLabel('Country')
                ->setDecorators($control_decorator)
                ->setAttrib('class', 'form-control')
                ->setValue('EG');
        
        
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('class', 'btn btn-primary pull-right')
                ->setDecorators($btn_decorator)
                ->setLabel('Submit');
        
        
        $this->addElements(array($name,$email,$password, $gender, $country,$submit));

                
    }


}

