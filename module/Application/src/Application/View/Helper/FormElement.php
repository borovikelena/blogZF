<?php
// ./src/Application/View/Helper/FormElement.php
namespace Application\View\Helper;

use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormElement as BaseFormElement;

class FormElement extends BaseFormElement {

    public function render(ElementInterface $element) {
    	$req = ($element->getOption('required')) ?  'required' : '';

        $type = $element->getAttribute('type');
        $name = $element->getAttribute('name');
        return sprintf('<p class="%s %s %s">%s</p>', $name, $req, $type,  parent::render($element));
    }
}