<?php

class My_Decorator_Label extends Zend_Form_Decorator_Abstract {

    protected $_placement = 'PREPEND';
    
    public function render($content) {
        if (null === ($element = $this->getElement())) {
            return $content;
        }
        if (!method_exists($element, 'getLabel')) {
            return $content;
        }

        $label = $element->getLabel() . ':';
       

        if (null === ($view = $element->getView())) {
            return $this->renderLabel($content, $label);
        }

        $label = $view->formLabel($element->getName(), $label,array('class'=>'control-label'));

        //return $this->renderLabel($content, $label);
        return $label;
    }

    public function renderLabel($content, $label) {
        $placement = $this->getPlacement();
        $separator = $this->getSeparator();

        switch ($placement) {
            case 'APPEND':
                return $content . $separator . $label;
            case 'PREPEND':
            default:
                return $label . $separator . $content;
        }
    }

}
