<?php

class Application_Form_MaterialForm extends Zend_Form
{

    public function init()
    {        
        /* Form Elements & Other Definitions Here ... */
        
        $control_decorator = Application_Form_Helper::$control_decorator;
        $btn_decorator = Application_Form_Helper::$btn_decorator;

        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Material Name')
                ->addFilter(new Zend_Filter_StripTags)
                ->setRequired()
                ->setDescription('Please Enter Material Name.')
                ->setDecorators($control_decorator)
                ->setAttrib('class', 'form-control');
        
        $description = new Zend_Form_Element_Textarea('description');
        $description->setLabel('Material Description')
            ->addFilter(new Zend_Filter_StripTags)
            ->setDescription('Write the course description')
            ->setDecorators($control_decorator)
            ->setAttrib('class', 'form-control')
                ->setAttrib('rows', '5');
        
        $type = new Zend_Form_Element_Select('type');
        $type->setMultiOptions(array('pdf' => 'PDF', 
                                    'txt' => 'TXT', 
                                    'media' => 'Media', 
                                    'others'=> 'Others'))
                ->setLabel('Material Type')
                ->setDecorators($control_decorator)
                ->setAttrib('class', 'form-control');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('class', 'btn btn-primary pull-right')
                ->setDecorators($btn_decorator)
                ->setLabel('Send');


        $this->addElements(array($name,$description,$type, $submit));
    }


}

