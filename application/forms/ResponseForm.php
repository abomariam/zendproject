<?php

class Application_Form_ResponseForm extends Zend_Form {

    public function init() {
        /* Form Elements & Other Definitions Here ... */
        $control_decorator = Application_Form_Helper::$control_decorator;
        $btn_decorator = Application_Form_Helper::$btn_decorator;

        $body = new Zend_Form_Element_Textarea('body');
        $body->setLabel('Response')
                ->addFilter(new Zend_Filter_StripTags)
                ->setRequired()
                ->setDescription('Write a response')
                ->setDecorators($control_decorator)
                ->setAttrib('class', 'form-control ')
                ->setAttrib('rows', '10');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('class', 'btn btn-primary pull-right')
                ->setDecorators($btn_decorator)
                ->setLabel('Send');

        $this->addElements(array($body, $submit));
    }

}
