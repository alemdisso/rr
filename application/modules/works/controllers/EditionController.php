<?php
class Works_EditionController extends Zend_Controller_Action
{
    private $workMapper;
    private $editorMapper;
    private $editionMapper;
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

        $typeLabel = $this->view->typeLabel($workObj, new Ruth_Collection_WorkTypes, $this->view);


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

        $serie = $editionObj->getSerie();
        if ($serie > 0) {
            $serieMapper = new Author_Collection_SerieMapper($this->db);
            $serieObj = $serieMapper->findById($serie);
            $serieName = $serieObj->getName();
            $serieLabel = $serieName;
//            $serieLabel = sprintf($this->view->translate("#Serie: %s"), $serieName);
            $serieUri = $serieObj->getUri();
        } else {
            $serieLabel = "";
            $serieUri = "#";
        }

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

        $editionsIds = $this->editionMapper->getAllEditionsOfSerieByUri($serieObj->getUri());

        $sameSerieData = $this->buildSameSerieEditionsModel($editionsIds, $editionObj->getId());

//        $sameSerieData = array(
//            '1' => array(
//                'isFirstEdition' => true,
//                'title' => "Um livro",
//                'coverSrc' => "/img/marcacao_livro.jpg",
//                'exploreUri' => "/explore/um-livro",
//                ),
//            '2' => array(
//                'isFirstEdition' => false,
//                'title' => "Um outro livro",
//                'coverSrc' => "/img/marcacao_livro.jpg",
//                'exploreUri' => "/explore/um-outro-livro",
//                ),
//            '3' => array(
//                'isFirstEdition' => false,
//                'title' => "mais um livro",
//                'coverSrc' => "/img/marcacao_livro.jpg",
//                'exploreUri' => "/explore/mais-um-livro",
//                ),
//        );


        $pageData = array(
            'edition' => $editionObj,
            'editionMapper' => $this->editionMapper,
            'title' => $workTitle,
            'typeLabel' => $typeLabel,
            'themeLabel' => "Animais",
            'themeUri' => "animais",
            'mediumImageUri' => $coverFilePath,
            'editorName' => $editorLabel,
            'description' => nl2br($workObj->getDescription()),
            'serieName' => $serieLabel,
            'serieUri' => $serieUri,
            'sameSerieData' => $sameSerieData,
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
        $keywords = $workObj->getTitle() . ", " . $this->view->keywords;

        $this->view->keywords = $keywords;

    }

    private function initDbAndMappers()
    {
        $this->db = Zend_Registry::get('db');
        $this->workMapper = new Author_Collection_WorkMapper($this->db);
        $this->editorMapper = new Author_Collection_EditorMapper($this->db);
        $this->editionMapper = new Author_Collection_EditionMapper($this->db);

    }

    private function buildSameSerieEditionsModel($editionsIds, $currentPageEditionId=0)
    {
        $model = array();
        foreach ($editionsIds as $editionId) {
            if ($editionId != $currentPageEditionId) {
                $loopEditionObj = $this->editionMapper->findById($editionId);
                $loopWorkObj = $this->workMapper->findById($loopEditionObj->getWork());
                $loopEditorObj = $this->editorMapper->findById($loopEditionObj->getEditor());

                $coverFilePath = $this->view->coverFilePath($loopEditionObj);

//            $prizeMapper = new Author_Collection_PrizeMapper($this->db);
//            $prizesLabels = $this->view->workPrizesLabels($loopWorkObj->getId(), $prizeMapper);

                $model[$editionId] = array(
                        'title' => $loopWorkObj->getTitle(),
                        'coverSrc' => $coverFilePath,
                        'exploreUri' => '/explore/' . $loopWorkObj->getUri(),
//                    'summary' => $loopWorkObj->getSummary(),
//                    'editorName' => $loopEditorObj->getName(),
//                    'prizes' => $prizesLabels,
//                    'moreAbout' => false,
//                    'otherLanguages' => false,
                );
            }
        }

        return $model;
    }



}

