<?php

namespace Blog\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
 
class ArticleInputFilter extends InputFilter
{
    public function __construct()
    {
       
            $this->add(array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));
 
           $this->add(array(
                'name'     => 'author',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 5,
                            'max'      => 100,
                        ),
                    ),
                ),
            ));

            $this->add(array(
                'name'     => 'content',
                'required' => true,
                'filters'  => array(
                    //array('name' => 'StripTags'),
                   // array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 5,
                           // 'max'      => 3000,
                        ),
                    ),
                ),
            ));
            $this->add(array(
                'name'     => 'description',
                'required' => true,
                'filters'  => array(
                    //array('name' => 'StripTags'),
                   // array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 5,
                            'max'      => 2000,
                        ),
                    ),
                ),
            ));
 
            $this->add(array(
                'name'     => 'title',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 5,
                            'max'      => 250,
                        ),
                    ),
                ),
            ));
 
    }
}