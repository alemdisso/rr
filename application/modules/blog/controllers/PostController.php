<?php
class Blog_PostController extends Zend_Controller_Action
{

    private $postMapper;
    private $taxonomyMapper;
    private $db;

    public function postDispatch()
    {
        if (isset($this->view->pageTitle)) {
            $this->_helper->layout()->getView()->headTitle($this->view->pageTitle . " :: Ruth Rocha");
        }
    }

    public function init()
    {
        $this->initDbAndMappers();

        $this->view->activateNavigation($this->_request, $this->view);

        $layoutHelper = $this->_helper->getHelper('Layout');
        $this->view->setNestedLayout($layoutHelper, 'inner_novidades');
    }

    public function exploreAction()
    {

        $data = $this->_request->getParams();
        try {
            $uri = $this->view->checkUriFromGet($data);
        } catch (Exception $e) {
            throw $e;
        }

        $postObj = $this->postMapper->findByUri($uri);

        if (!$this->view->canSeePost($postObj)) {
            $this->_redirect('/');
        }

        if (!is_null($postObj->getPublicationDate())) {
            $publicationDate = $this->view->splitDateFromDateTime($postObj->getPublicationDate());
            $publicationLabel = $this->view->formatDateToShow($publicationDate, ".");
        } else {
            $publicationLabel = $this->view->translate("#Not published");
        }

        $postTitle = $postObj->getTitle();
        $categoryData = $this->view->CategoryTermAndUri($postObj->getCategory(), $this->taxonomyMapper);

        $pageData = array(
            'title' => $postTitle,
            'publicationDate' => $publicationLabel,
            'content' => $postObj->getContent(),
            'categoryModel' => $categoryData,
        );



        $this->_helper->layout()->getView()->doctype(Zend_View_Helper_Doctype::XHTML1_RDFA);
        $this->_helper->layout()->getView()->headMeta()->setProperty('og:title', $postTitle);
        $this->_helper->layout()->getView()->headMeta()->setProperty('og:url', $this->_helper->layout()->getView()->currentUrl());
        $this->_helper->layout()->getView()->headMeta()->setProperty('og:type', 'website');
        $this->_helper->layout()->getView()->headMeta()->setProperty('og:site_name', 'Ruth Rocha');
        $this->_helper->layout()->getView()->headMeta()->setProperty('fb:admins', '100000378824805');



        $this->view->pageData = $pageData;
        $this->view->pageTitle = $postTitle;
    }

    private function initDbAndMappers()
    {
        $this->db = Zend_Registry::get('db');
        $this->postMapper = new Moxca_Blog_PostMapper($this->db);
        $this->taxonomyMapper = new Moxca_Blog_TaxonomyMapper($this->db);
    }
}

