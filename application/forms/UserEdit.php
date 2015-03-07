<?php

class Application_Form_UserDetails extends Zend_Form
{
    
    
    public function init()
    {
        $control_decorator = Application_Form_Helper::$control_decorator;
        $btn_decorator = Application_Form_Helper::$btn_decorator;
        $countries = Application_Form_Helper::$countries;
        
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('User Name')
            ->addValidator(new Zend_Validate_Alpha)
            ->addFilter(new Zend_Filter_StripTags)
            ->setRequired()
            ->setDescription('Please Enter Your Full Name.')
            ->setDecorators($control_decorator)
            ->setAttrib('class', 'form-control');
        
        
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('E-Mail')
            ->addValidator(new Zend_Validate_EmailAddress)
            ->addFilter(new Zend_Filter_StripTags)
            ->setRequired()
            ->setDescription('Enter your Email.')
            ->setDecorators($control_decorator)
            ->setAttrib('class', 'form-control');

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
        
        
        $this->addElements(array($name,$email, $gender, $country,$submit));

                
    }


}

