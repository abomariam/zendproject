<?php

class Application_Form_CategoryForm extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $control_decorator = Application_Form_Helper::$control_decorator;
        $btn_decorator = Application_Form_Helper::$btn_decorator;
        
        
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Category Name')
            ->addValidator(new Zend_Validate_Alnum)
            ->addFilter(new Zend_Filter_StripTags)
            ->setRequired()
            ->setDescription('Please Enter Category Name.')
            ->setDecorators($control_decorator)
            ->setAttrib('class', 'form-control');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('class', 'btn btn-primary pull-right')
                ->setDecorators($btn_decorator)
                ->setLabel('Save');
        
        
        $this->addElements(array($name,$submit));

        
    }


}

