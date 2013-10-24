<?php

class Admin_View_Helper_ThemesLoop extends Zend_View_Helper_Abstract
{
    public function themesLoop($model)
    {
        return $this->view->partialLoop('work/themes-loop.phtml', $model);
    }
}
