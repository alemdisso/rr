<?php

class Includes_View_Helper_FilterThemes extends Zend_View_Helper_Abstract
{
    public function filterThemes($model)
    {
        foreach ($model as $id => $pair) {
            echo $this->view->partial('include/filter-themes.phtml', array('id' => $pair['id'], 'term' => $pair['term']));
        }
    }
}
