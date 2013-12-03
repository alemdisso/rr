<?php

class Includes_View_Helper_FilterCharacters extends Zend_View_Helper_Abstract
{
    public function filterCharacters($model)
    {
        foreach ($model as $id => $pair) {
            echo $this->view->partial('include/filter-characters.phtml', 'includes', array('id' => $pair['id'], 'term' => $pair['term']));
        }
    }
}
