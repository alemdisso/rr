<?php
class Blog_IndexController extends Zend_Controller_Action
{
    private $db;
    private $postMapper;
    private $blogTaxonomyMapper;

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

    public function categoryAction()
    {
        $data = $this->_request->getParams();
        try {
            $postsIds = array();
            $validator = new Moxca_Util_ValidUri();
            if ($validator->isValid($data['category'])) {
                $postsIds = $this->blogTaxonomyMapper->getPublishedPostsByCategory($data['category']);
            }
        } catch (Exception $e) {
            throw $e;
        }

        $postsData = array();
        foreach ($postsIds as $postId) {
            $loopPostObj = $this->postMapper->findById($postId);
            $publicationDate = $this->view->splitDateFromDateTime($loopPostObj->getPublicationDate());
            $categoryData = $this->view->CategoryTermAndUri($loopPostObj->getCategory(), $this->blogTaxonomyMapper);

            $postsData[$postId] = array(
                'title' => $loopPostObj->getTitle(),
                'uri' => $loopPostObj->getUri(),
                'content' => $loopPostObj->getContent(),
                'publicationDate' => $this->view->formatDateToShow($publicationDate, "."),
                'categoryModel' => $categoryData,
                'commentsCount' => 0,
            );

        }

        $pageData = array('postsData' => $postsData);
        $this->view->pageData = $pageData;

    }

    public function indexAction()
    {
        $postsIds = $this->postMapper->getLastPublishedPosts(Author_Collection_WorkTypeConstants::TYPE_FICTION);

        $postsData = array();
        foreach ($postsIds as $postId) {
            $loopPostObj = $this->postMapper->findById($postId);
            $publicationDate = $this->view->splitDateFromDateTime($loopPostObj->getPublicationDate());
            $categoryData = $this->view->CategoryTermAndUri($loopPostObj->getCategory(), $this->blogTaxonomyMapper);

            $postsData[$postId] = array(
                'title' => $loopPostObj->getTitle(),
                'uri' => $loopPostObj->getUri(),
                'content' => $loopPostObj->getContent(),
                'publicationDate' => $this->view->formatDateToShow($publicationDate, "."),
                'categoryModel' => $categoryData,
                'commentsCount' => 0,
            );

        }

        $pageData = array('postsData' => $postsData);
        $this->view->pageData = $pageData;

    }

    private function initDbAndMappers()
    {
        $this->db = Zend_Registry::get('db');
        $this->postMapper = new Moxca_Blog_PostMapper($this->db);
        $this->blogTaxonomyMapper = new Moxca_Blog_TaxonomyMapper($this->db);

    }
}

