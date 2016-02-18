<?php

class Works_View_Helper_SameSerieEditionsLoop extends Zend_View_Helper_Abstract
{
    public function sameSerieEditionsLoop($model)
    {
        return $this->view->partialLoop('edition/same-serie-editions-loop.phtml', $model);
    }

}

