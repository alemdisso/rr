<?php

class Includes_View_Helper_FilterSeries extends Zend_View_Helper_Abstract
{
    public function filterSeries($model)
    {
        foreach ($model as $id => $data) {
            echo $this->view->partial('include/filter-series.phtml', 'includes', array('id' => $data['id'], 'term' => $data['term'], 'uri' => $data['sanitized']));
        }
    }
}
