<?php
class Biografia_IndexController extends Zend_Controller_Action
{
    public function init()
    {
        $layoutHelper = $this->_helper->getHelper('Layout');
        $layout = $layoutHelper->getLayoutInstance();
        $layout->nestedLayout = 'inner';
    }

    public function indexAction()
    {

    }

}
