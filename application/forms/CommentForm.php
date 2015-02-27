<?php

class Application_Form_CommentForm extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        
        $control_decorator = Application_Form_Helper::$control_decorator;
        $btn_decorator = Application_Form_Helper::$btn_decorator;
        
        $body = new Zend_Form_Element_Textarea('body');
        $body->setLabel('Comment')
            ->addFilter(new Zend_Filter_StripTags)
            ->setRequired()
            ->setDescription('Write a comment')
            ->setDecorators($control_decorator)
            ->setAttrib('class', 'form-control');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('class', 'btn btn-primary pull-right')
                ->setDecorators($btn_decorator)
                ->setLabel('Send');
        
        $this->addElements(array($body,$submit));
    }


}

