<?php
class Works_IndexController extends Zend_Controller_Action
{

    private $workMapper;
    private $editorMapper;
    private $editionMapper;
    private $serieMapper;
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
        $this->view->setNestedLayout($layoutHelper, 'inner_books');
    }

    public function indexAction()
    {
        $data = $this->_request->getParams();

        try {
            $theme = $this->view->CheckTermFromGet($data, 'theme');
            $termData = $this->taxonomyMapper->getTermByUri($theme);
            $themeTerm = $termData['term'];

        } catch (Exception $ex) {
            $theme = null;
            $themeTerm = null;
        }

        $type = null;
        $typeData = array();
        try {
            $type = $this->view->CheckIdFromGet($data, 'type');
            if ($type) {
                $typeLabel = $this->view->typeLabel($type, new Ruth_Collection_WorkTypes, $this->view);
                $typeData = array('term' => $typeLabel);
            }
        } catch (Exception $ex) {
            $type = null;
            $typeData = array();
        }

        try {
            $character = $this->view->CheckTermFromGet($data, 'character');
            $termData = $this->taxonomyMapper->getTermByUri($character);
            $characterTerm = $termData['term'];
        } catch (Exception $ex) {
            $character = null;
            $characterTerm = null;
        }

        $serie = null;
        $serieTitle = null;
        try {
            if (isset($data['serie'])) {
                $converter = new Moxca_Util_StringToAscii();
                $sanitized = $converter->toAscii($data['serie']);
                if ($sanitized) {
                    $obj = $this->serieMapper->findByUri($sanitized);
                    $serie = $obj->getId();
                    $serieTitle = $obj->getName();
                }
            }
        } catch (Exception $ex) {
            throw $ex;
            $serie = null;
        }

        if ($theme) {
            $editionsIds = $this->taxonomyMapper->editionsWithTheme($theme);

        } else if ($character) {
            $editionsIds = $this->taxonomyMapper->editionsWithCharacter($character);

        } else if ($type) {
            $editionsIds = $this->editionMapper->getAllIdsOfType($type);

        } else if ($serie) {
            $editionsIds = $this->editionMapper->getAllEditionsOfSerieById($serie);

        } else {
            $editionsIds = $this->editionMapper->getAllEditionsAlphabeticallyOrdered();
        }



        $editionsModel = $this->buildEditionsModel($editionsIds);

        $pageData = array(
            'editionsModel' => $editionsModel,
            'themeData' => array('term' => $themeTerm),
            'typeData' => $typeData,
            'characterData' => array('term' => $characterTerm),
            'serieData' => array('title' => $serieTitle),
        );



        $this->view->pageData = $pageData;
        $this->view->pageTitle = "Ruth Rocha - Livros";

    }

    private function initDbAndMappers()
    {
        $this->db = Zend_Registry::get('db');
        $this->workMapper = new Author_Collection_WorkMapper($this->db);
        $this->editorMapper = new Author_Collection_EditorMapper($this->db);
        $this->editionMapper = new Author_Collection_EditionMapper($this->db);
        $this->serieMapper = new Author_Collection_SerieMapper($this->db);
        $this->taxonomyMapper = new Author_Collection_TaxonomyMapper($this->db);
    }

    private function buildEditionsModel($editionsIds)
    {
        $editionsData = array();
        if (is_array($editionsIds)) {
            foreach ($editionsIds as $editionId) {
                $loopEditionObj = $this->editionMapper->findById($editionId);
                $loopWorkObj = $this->workMapper->findById($loopEditionObj->getWork());
                $loopEditorObj = $this->editorMapper->findById($loopEditionObj->getEditor());

                $coverFilePath = $this->view->coverFilePath($loopEditionObj);

                $editionsData[$editionId] = array(
                        'title' => $loopWorkObj->getTitle(),
                        'coverSrc' => $coverFilePath,
                        'exploreUri' => '/explore/' . $loopWorkObj->getUri(),
                );
            }
        }

        return $editionsData;
    }



}

