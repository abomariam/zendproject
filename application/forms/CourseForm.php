<?php

class Application_Form_CourseForm extends Zend_Form {

    public function init() 
    {
        /* Form Elements & Other Definitions Here ... */
        $control_decorator = Application_Form_Helper::$control_decorator;
        $btn_decorator = Application_Form_Helper::$btn_decorator;


        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Course Name')
                ->addFilter(new Zend_Filter_StripTags)
                ->setRequired()
                ->setDescription('Please Enter Course Name.')
                ->setDecorators($control_decorator)
                ->setAttrib('class', 'form-control');
        
        $description = new Zend_Form_Element_Textarea('description');
        $description->setLabel('Course Description')
            ->addFilter(new Zend_Filter_StripTags)
            ->setDescription('Write the course description')
            ->setDecorators($control_decorator)
            ->setAttrib('class', 'form-control');
        
        $duration = new Zend_Form_Element_Text('duration');
        $duration->setLabel('Course Duration')
                ->addFilter(new Zend_Filter_StripTags)
                ->setDescription('Course duration ex: 2 weeks')
                ->setDecorators($control_decorator)
                ->setAttrib('class', 'form-control');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('class', 'btn btn-primary pull-right')
                ->setDecorators($btn_decorator)
                ->setLabel('Save');


        $this->addElements(array($name,$duration,$description, $submit));
    }

}
