<?php

class Application_Form_UserDetails extends Zend_Form
{
    
    protected $control_decorator = array(
        array('ViewHelper'),
        array('Errors', array('class'=> 'list-unstyled alert alert-danger')),
        array('Description', array('tag' => 'p', 'class' => 'text-muted small')),
        array(array('divWrapper' => 'HtmlTag'), array('tag' => 'div', 'class' => 'col-md-4')), 
        array('Label', array('class'=>'col-md-1 control-label', 'separator'=>' ')),
        array('HtmlTag', array('tag' => 'div', 'class'=>'form-group')),
    );
    
    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        //$this->addElementPrefixPath('My_Decorator', 'My/Decorator/', 'decorator');
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('User Name');
        $name->setDescription('Please Enter Your Full Name.');
        $name->setDecorators($this->control_decorator);
        $name->setAttrib('class', 'form-control');
//        $name->getDecorator('label')->setOptions(array('class'=>'control-label'));
//        $name->getDecorator('HtmlTag')->setOptions(array('tag'=>'div','class'=>'col-md-4'));
//        $name->addDecorator('HtmlTag','div');
        //$name->addPrefixPath('My_Decorator', 'My/Decorator/', 'decorator');
        
        $this->addElement($name);
        
        
        
                
    }


}

