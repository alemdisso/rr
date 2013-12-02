<?php

class Admin_View_Helper_CharactersLoop extends Zend_View_Helper_Abstract
{
    public function charactersLoop($model)
    {
        return $this->view->partialLoop('work/characters-loop.phtml', $model);
    }

}

