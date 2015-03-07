<?php

class Application_Form_UserAdminForm extends Zend_Form
{

    public function init()
    {
        $control_decorator = Application_Form_Helper::$control_decorator;
        $btn_decorator = Application_Form_Helper::$btn_decorator;
        $countries = Application_Form_Helper::$countries;
        
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('User Name')
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
        
        $password = new Zend_Form_Element_Password('password');
       $password->setLabel('Password')
            ->addFilter(new Zend_Filter_StripTags)
            ->setRequired()
            ->setDescription('Please Enter Your Password.')
            ->setDecorators($control_decorator)
            ->setAttrib('class', 'form-control');
        
        $country = new Zend_Form_Element_Select('country');
        $country->setMultiOptions($countries)
                ->setLabel('Country')
                ->setDecorators($control_decorator)
                ->setAttrib('class', 'form-control')
                ->setValue('EG');
        
        
        $pic = new Zend_Form_Element_File('pic');
        $pic->setLabel('Picture')
            ->setValueDisabled(true)
            ->addValidator(new Zend_Validate_File_IsImage)
            ->addFilter(new Zend_Filter_File_Rename(array(
                "target"    => APPLICATION_PATH ."/../public/uploads/",
                "randomize" => true,
            )));
        
        
        $is_active = new Zend_Form_Element_Checkbox('is_active');
        $is_active->setLabel('Is Active')
                ->setDecorators($control_decorator)
                ->setAttrib('class', 'form-control pull-left')
                ->setValue('1');
        
        $role = new Zend_Form_Element_Select('role');
        $role->setMultiOptions(array('student'=>'Student', 'admin'=>'Admin'))
                ->setLabel('Role')
                ->setDecorators($control_decorator)
                ->setAttrib('class', 'form-control')
                ->setValue('student');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('class', 'btn btn-primary pull-right')
                ->setDecorators($btn_decorator)
                ->setLabel('Submit');
        
        
        $id= new Zend_Form_Element_Hidden('id');
        
        $this->addElements(array($id,$name,$email, $gender,$password, $country,$is_active,$role,$pic,$submit));

                
    }


}

