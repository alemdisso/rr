<?php

class Admin_ThemeController extends Zend_Controller_Action
{
    private $db;
    private $workMapper;

    public function preDispatch()
    {
        try {
            $checker = new Moxca_Access_PrivilegeChecker();
        } catch (Exception $e) {
            throw $e;
        }
        $this->view->pageTitle = "";
    }

    public function init()
    {
        $this->db = Zend_Registry::get('db');

        $layoutHelper = $this->_helper->getHelper('Layout');
        $this->view->setNestedLayout($layoutHelper, 'inner_admin');

        $this->workMapper = new Author_Collection_WorkMapper($this->db);
        $this->prizeMapper = new Author_Collection_PrizeMapper($this->db);
    }

   public function createAction()
    {
        // cria form
        $form = new Author_Form_ThemeCreate;
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $postData = $this->getRequest()->getPost();
            if ($form->isValid($postData)) {
                $newTheme = $form->process($postData);
                $this->_helper->getHelper('FlashMessenger')
                    ->addMessage($this->view->translate('#The record was successfully updated.'));
                $this->_redirect('/admin/theme/sucess/?id=' . $newTheme->getWork());
            } else {
                //form error: populate and go back
                $form->populate($postData);
                $this->view->form = $form;
            }
        } else {

            $data = $this->_request->getParams();
            try {
                $workId = $this->view->checkIdFromGet($data, 'work');
            } catch (Exception $e) {
                throw $e;
            }
            $element = $form->getElement('work');
            $element->setValue($workId);

        }
    }


}