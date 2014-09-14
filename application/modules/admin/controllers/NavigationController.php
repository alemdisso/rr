<?php

class Admin_NavigationController extends Zend_Controller_Action
{
    private $db;
    private $editorMapper;
    private $editionMapper;
    private $serieMapper;
    private $workMapper;
    private $postMapper;
    private $blogTaxonomyMapper;

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
        $this->editorMapper = new Author_Collection_EditorMapper($this->db);
        $this->editionMapper = new Author_Collection_EditionMapper($this->db);
        $this->serieMapper = new Author_Collection_SerieMapper($this->db);
        $this->postMapper = new Moxca_Blog_PostMapper($this->db);
        $this->blogTaxonomyMapper = new Moxca_Blog_TaxonomyMapper($this->db);
    }

    public function updateAction()
    {

        $xml = simplexml_load_file(APPLICATION_PATH . '/configs/basic-navigation.xml');
        $sxe = new SimpleXMLElement($xml->asXML());
        $nav = $sxe->nav;
        $home = $nav->home;
        $pages = $home->pages;

        $works = $pages->addChild('works');
        $works->addChild('label', $this->view->translate("#Works"));
        $works->addChild('uri', $this->view->translate('/works'));
        $worksPages = $works->addChild('pages');

        $editionsIds = $this->editionMapper->getAllIds();
        foreach ($editionsIds as $editionId) {
            $loopEditionObj = $this->editionMapper->findById($editionId);
            $loopWorkObj = $this->workMapper->findById($loopEditionObj->getWork());


            $edition = $this->addPage($worksPages, 'edition-' . $loopWorkObj->getUri(), $loopWorkObj->getTitle(), '/livro/' . $loopWorkObj->getUri());
        }

//        $series = $this->addPage($worksPages, 'series', $this->view->translate("#Series"), $this->view->translate("/series"));

//        $seriesPages = $series->addChild('pages');
        $seriesIds = $this->serieMapper->getAllIds();
        foreach ($seriesIds as $serieId) {
            $loopSerieObj = $this->serieMapper->findById($serieId);
            $serie = $this->addPage($worksPages, 'serie-' . $loopSerieObj->getUri(), $loopSerieObj->getName(), '/serie/' . $loopSerieObj->getUri());
        }

        $this->addPage($pages, 'biography', $this->view->translate("#Biography"), $this->view->translate("/biography"));


        $blog = $pages->addChild('blog');
        $blog->addChild('label', $this->view->translate("#News"));
        $blog->addChild('uri', $this->view->translate('/news'));
        $blogPages = $blog->addChild('pages');

        $postsIds = $this->postMapper->getAllIds();
        foreach ($postsIds as $postId) {
            $loopPostObj = $this->postMapper->findById($postId);

            $post = $this->addPage($blogPages, 'post-' . $loopPostObj->getUri(), $loopPostObj->getTitle(), '/novidades/' . $loopPostObj->getUri());
        }

        //$categories = $this->addPage($blogPages, 'categories', $this->view->translate("#Categories"), $this->view->translate("/novidades"));

        //$categoriesPages = $categories->addChild('pages');
        //$categoriesIds = $this->serieMapper->getAllIds();
        $mapper = new Moxca_Blog_TaxonomyMapper();
        $categoriesIds = $mapper->getAllCategoriesAlphabeticallyOrdered();
        foreach ($categoriesIds as $categoryId => $dataCategory) {
            $loopTermAndUri = $this->blogTaxonomyMapper->getTermAndUri($categoryId);
            $category = $this->addPage($blogPages, 'category-' . $loopTermAndUri['uri'], $loopTermAndUri['term'], $this->view->translate('/news-about') . "/" . $loopTermAndUri['uri']);
        }







//        $newsNode = $this->addPage($pages, 'news', $this->view->translate("#News"), $this->view->translate("/news"));
//
//        $categories = $this->addPage($newsNode, 'categories', $this->view->translate("#Categories"), $this->view->translate("/news-about"));
//        $categoriesNode = $categories->addChild('pages');
//        $categoriesIds = $this->blogTaxonomyMapper->getAllCategoriesAlphabeticallyOrdered();
//        foreach ($categoriesIds as $categoryId => $term) {
//            $loopTermAndUri = $this->blogTaxonomyMapper->getTermAndUri($categoryId);
//            $category = $this->addPage($categoriesNode, 'category-' . $loopTermAndUri['uri'], $loopTermAndUri['term'], $this->view->translate('/news-about') . "/" . $loopTermAndUri['uri']);
//        }
//


//        $postsIds = $this->postMapper->getAllPublishedIds();
//
//        if (count($postsIds) > 0) {
//            $newsPages = $newsNode->addChild('pages');
//            foreach ($postsIds as $postId) {
//                $loopPostObj = $this->postMapper->findById($postId);
//                $this->addPage($newsPages, 'post-' . $loopPostObj->getUri(), $loopPostObj->getTitle(), '/novidades/' . $loopPostObj->getUri());
//            }
//        }
//



        $this->saveXMLFile(APPLICATION_PATH . '/configs/dynamic.xml', $sxe);


    }

    private function addPage($node, $id, $label, $uri)
    {
        $newPage = $node->addChild($id);
        $newPage->addChild('label', $this->view->translate($label));
        $newPage->addChild('uri', $this->view->translate($uri));
        return ($newPage);
    }

    private function saveXMLFile($filename, $xml)
    {
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
//        echo $dom->saveXML();die();
        $dom->save($filename); // I used both (menu.xml) as well ($filename) but neither seems to work
    }

}