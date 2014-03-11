<?php
// ./src/Application/View/Helper/FormCollection.php
namespace Application\View\Helper;

use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormCollection as BaseFormCollection;

class FormCollection extends BaseFormCollection {
    public function render(ElementInterface $element) {
        return '<div>'.parent::render($element).'</div>';
    }
}