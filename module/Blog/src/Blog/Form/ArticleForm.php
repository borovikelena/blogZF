<?php
namespace Blog\Form;
 
use Zend\Form\Form;
 
class ArticleForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('article');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        $this->add(array(
            'name' => 'author',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'inputField'
            ),
            'options' => array(
                'label' => 'Author',
            ),
        ));
        $this->add(array(
            'name' => 'title',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'inputField'
            ),
            'options' => array(
                'label' => 'Title',
            ),
        ));

        $this->add(array(
            'name' => 'description',

            'attributes'=>array(
                'type'=>'textarea',
                'id' => 'article_description',
                'cols' => 100,
                'rows' => 5,
            ),
            'options' => array(
                'label' => 'Description',
            ),
        ));

        $this->add(array(
            'name' => 'content',

            'attributes'=>array(
                'type'=>'textarea',
                'id' => 'article_content',
                'cols' => 100,
                'rows' => 10,
            ),
            'options' => array(
                'label' => 'Content',
            ),
        ));

        

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));

        $this->setInputFilter(new \Blog\Form\ArticleInputFilter());
    }
}