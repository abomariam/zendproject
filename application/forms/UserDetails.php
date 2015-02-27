<?php

class Application_Form_UserDetails extends Zend_Form
{
    
    protected $control_decorator = array(
        array('ViewHelper'),
        array('Errors', array('class'=> 'list-unstyled alert alert-danger')),
        array('Description', array('tag' => 'p', 'class' => 'text-muted small')),
        array(array('divWrapper' => 'HtmlTag'), array('tag' => 'div', 'class' => 'col-md-10 ')), 
        array('Label', array('class'=>'col-md-2 control-label', 'separator'=>' ')),
        array('HtmlTag', array('tag' => 'div', 'class'=>'form-group')),
    );
    
    protected $btn_decorator = array(
        array('ViewHelper'),
    );
    
    protected $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        //$this->addElementPrefixPath('My_Decorator', 'My/Decorator/', 'decorator');
        
        ZendX_JQuery::enableForm($this);
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('User Name')
            ->addValidator(new Zend_Validate_Alpha)
            ->addFilter(new Zend_Filter_StripTags)
            ->setRequired()
            ->setDescription('Please Enter Your Full Name.')
            ->setDecorators($this->control_decorator)
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
            ->setDecorators($this->control_decorator)
            ->setAttrib('class', 'form-control');
//        
       $password = new Zend_Form_Element_Password('password');
       $password->setLabel('Password')
            ->addFilter(new Zend_Filter_StripTags)
            ->setRequired()
            ->setDescription('Please Enter Your Password.')
            ->setDecorators($this->control_decorator)
            ->setAttrib('class', 'form-control');
        
        //$gender = new Zend_Form_Element_Radio('gender');
        //$gender->setMultiOptions(array('male'=>'Male','female'=>'Female'));
        //$gender->setValue('male');
        $gender = new Zend_Form_Element_Radio('gender');
        $gender->setMultiOptions(array('male'=>'Male','female'=>'Female'))
                ->setLabel('Gender')
                ->setDecorators($this->control_decorator)
                ->setAttrib('class', 'from-control')
                ->setValue('male');
        
        $country = new Zend_Form_Element_Select('country');
        $country->setMultiOptions($this->countries)
                ->setLabel('Country')
                ->setDecorators($this->control_decorator)
                ->setAttrib('class', 'form-control');
        
        
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('class', 'btn btn-primary col-md-offset-10')
                ->setDecorators($this->btn_decorator)
                ->setLabel('Submit');
        
        $reset = new Zend_Form_Element_Reset('reset');
        $reset->setAttrib('class', 'btn btn-success')
                ->setDecorators($this->btn_decorator)
                ->setLabel('Reset');
        
        $this->addElements(array($name,$email,$password, $gender, $country,$submit, $reset));

                
    }


}

