<?php
class Contato_IndexController extends Zend_Controller_Action
{
    public function init()
    {
        $this->view->activateNavigation($this->_request, $this->view);

        $layoutHelper = $this->_helper->getHelper('Layout');
        $this->view->setNestedLayout($layoutHelper, 'inner_contato');
    }

    public function indexAction()
    {

    }
}

