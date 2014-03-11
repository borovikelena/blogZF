<?php
namespace Blog\View\Helper;

use Zend\View\Helper\AbstractHelper;

class GetFirstWords extends AbstractHelper
{
    public function __invoke($sentence, $countWords = 20)
    {
        return implode(' ', array_slice(explode(' ', $sentence), 0,  $countWords)) . '...';

    }
}