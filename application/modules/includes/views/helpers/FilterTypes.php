<?php

class Includes_View_Helper_FilterTypes extends Zend_View_Helper_Abstract
{
    public function filterTypes($model)
    {
        foreach ($model as $id => $pair) {
            echo $this->view->partial('include/filter-types.phtml', 'includes', array('id' => $pair['id'], 'term' => $this->view->translate($pair['term'])));
        }
    }
}
