<?php
class Works_EditionController extends Zend_Controller_Action
{
    private $workMapper;
    private $editorMapper;
    private $editionMapper;
    private $taxonomyMapper;
    private $keywords;
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
        $this->view->setNestedLayout($layoutHelper, 'inner_books');
    }

    public function exploreAction()
    {
        $data = $this->_request->getParams();
        try {
            $uri = $this->view->checkUriFromGet($data);
        } catch (Exception $e) {
            throw $e;
        }
        $editionObj = $this->editionMapper->findByUri($uri);
        $workObj = $this->workMapper->findById($editionObj->getWork());
        $editorObj = $this->editorMapper->findById($editionObj->getEditor());
        $coverFilePath = $this->view->coverFilePath($editionObj);

        $workTitle = $workObj->getTitle();

        $typeLabel = $this->view->typeLabel($workObj->getType(), new Ruth_Collection_WorkTypes, $this->view);

        $converter = new Moxca_Util_StringToAscii();
        $sanitizedTypeLabel = $converter->toAscii($typeLabel);

        $themes = $workObj->getThemes();
        $themeData = array();
        foreach($themes as $k => $eachTheme) {
            $themeData[$k] = $this->view->TermAndUri($eachTheme, $this->taxonomyMapper);
        }

//        $themeData = $this->view->TermAndUri($workObj->getTheme(), $this->taxonomyMapper);

        $isbn = $editionObj->getIsbn();
        if ($isbn != "") {
            $isbnLabel = sprintf($this->view->translate("#ISBN: %s"), $isbn);
        } else {
            $isbnLabel = "";
        }

        $pages = $editionObj->getPages();
        if ($pages != "") {
            $pagesLabel = sprintf($this->view->translate("#%s pages"), $pages);
        } else {
            $pagesLabel = "";
        }

//        $serie = $editionObj->getSerie();
//        if ($serie > 0) {
//            $serieMapper = new Author_Collection_SerieMapper($this->db);
//            $serieObj = $serieMapper->findById($serie);
//            $serieName = $serieObj->getName();
//            $serieLabel = $serieName;
////            $serieLabel = sprintf($this->view->translate("#Serie: %s"), $serieName);
//            $serieUri = $serieObj->getUri();
//        } else {
//            $serieLabel = "";
//            $serieUri = "#";
//        }

        $prizeMapper = new Author_Collection_PrizeMapper($this->db);
        $prizesLabels = $this->view->workPrizesLabels($workObj->getId(), $prizeMapper);

        $illustratorLabel = "";
        if ($editionObj->getIllustrator()) {
            $illustratorLabel = $this->view->translate("#Illustrator:") . " " . $editionObj->getIllustrator();
        }

        $coverDesignerLabel = "";
        if ($editionObj->getCoverDesigner()) {
            $coverDesignerLabel = $this->view->translate("#Cover designer:") . " " . $editionObj->getCoverDesigner();
        }

        $editorLabel = "";
        if ($editionObj->getEditor()) {
            $editorLabel = $this->view->translate("#Editor:") . " " . $editorObj->getName();
        }

        $sameSerieModel = $this->buildSameSerieModel($editionObj
                , new Author_Collection_SerieMapper($this->db)
                , $this->editionMapper);


        $this->_helper->layout()->getView()->doctype(Zend_View_Helper_Doctype::XHTML1_RDFA);
        $this->_helper->layout()->getView()->headMeta()->setProperty('og:title', $workTitle);
        $this->_helper->layout()->getView()->headMeta()->setProperty('og:url', $this->_helper->layout()->getView()->currentUrl());
        $this->_helper->layout()->getView()->headMeta()->setProperty('og:type', 'website');
        $this->_helper->layout()->getView()->headMeta()->setProperty('og:site_name', 'Ruth Rocha');
        $this->_helper->layout()->getView()->headMeta()->setProperty('fb:admins', '100000378824805');




        $pageData = array(
            'edition' => $editionObj,
            'editionMapper' => $this->editionMapper,
            'title' => $workTitle,
            'typeLabel' => $typeLabel,
            'sanitizedTypeLabel' => $sanitizedTypeLabel,
            'themeData' => $themeData,
//            'themeLabel' => $themeData['term'],
//            'themeUri' => $themeData['uri'],
            'mediumImageUri' => $coverFilePath,
            'editorName' => $editorLabel,
            'description' => nl2br($workObj->getDescription()),
            'serieData' => $sameSerieModel,
//            'serieName' => $serieLabel,
//            'serieUri' => $serieUri,
//            'sameSerieData' => $otherEditionsModel,
            'illustrator' => $illustratorLabel,
            'coverDesigner' => $coverDesignerLabel,
            'isbn' => $isbnLabel,
            'pages' => $pagesLabel,

            'ecommerce' => false,
            'moreAbout' => false,
            'prizes' => $prizesLabels,
        );

        $this->view->pageData = $pageData;
        $this->view->pageTitle = sprintf($this->view->translate("#Exploring %s"), $workTitle);
        $taxonomyMapper = new Author_Collection_TaxonomyMapper($this->db);
        $keywordsLabels = $this->view->workThemesLabels($workObj->getId(), $taxonomyMapper);
        $stringKeywords="";
        foreach($keywordsLabels as $labelArray) {
            $stringKeywords .= ', ' . $labelArray['label'];
        }

        $keywords = $workObj->getTitle() . $stringKeywords . ", " . $this->view->keywords;

        $this->view->keywords = $keywords;

    }

    private function initDbAndMappers()
    {
        $this->db = Zend_Registry::get('db');
        $this->workMapper = new Author_Collection_WorkMapper($this->db);
        $this->editorMapper = new Author_Collection_EditorMapper($this->db);
        $this->editionMapper = new Author_Collection_EditionMapper($this->db);
        $this->taxonomyMapper = new Author_Collection_TaxonomyMapper($this->db);
    }

    private function buildSameSerieModel(Author_Collection_Edition $edition, Author_Collection_SerieMapper $serieMapper, Author_Collection_EditionMapper $editionMapper)
    {
        $serie = $edition->getSerie();
        if ($serie > 0) {
            $serieObj = $serieMapper->findById($serie);
            $serieName = $serieObj->getName();
            $serieLabel = $serieName;
            $serieUri = $serieObj->getUri();

            $editionsIds = $editionMapper->getAllEditionsOfSerieByUri($serieUri);
            $otherEditionsModel = $this->buildOtherEditionsModel($editionsIds, $edition->getId());
        } else {
            $serieLabel = "";
            $serieUri = "#";
            $otherEditionsModel = null;
        }

        $sameEditionModel = array(
                'name' => $serieLabel,
                'uri' => $serieUri,
                'otherEditionsModel' => $otherEditionsModel,
        );

        return $sameEditionModel;
    }

    private function buildOtherEditionsModel($editionsIds, $currentPageEditionId=0)
    {
        $otherEditionsData = array();
        foreach ($editionsIds as $editionId) {
            if ($editionId != $currentPageEditionId) {
                $loopEditionObj = $this->editionMapper->findById($editionId);
                $loopWorkObj = $this->workMapper->findById($loopEditionObj->getWork());
                $loopEditorObj = $this->editorMapper->findById($loopEditionObj->getEditor());

                $coverFilePath = $this->view->coverFilePath($loopEditionObj);

                $otherEditionsData[$editionId] = array(
                        'title' => $loopWorkObj->getTitle(),
                        'coverSrc' => $coverFilePath,
                        'exploreUri' => '/livro/' . $loopWorkObj->getUri(),
                );
            }
        }

        return $otherEditionsData;
    }



}

