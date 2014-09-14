<?php

class Includes_View_Helper_FilterCategories extends Zend_View_Helper_Abstract
{
    public function filterCategories($model)
    {
        foreach ($model as $id => $pair) {
            echo $this->view->partial('include/filter-categories.phtml', 'includes', array('uri' => $pair['uri'], 'term' => $pair['term']));
        }
    }
}
