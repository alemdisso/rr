<?php
class Works_IndexController extends Zend_Controller_Action
{

    private $workMapper;
    private $editorMapper;
    private $editionMapper;
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

    public function fictionAction()
    {

        $worksData = array(
                '1' => array(
                    'title' => 'Cabe na mala',
                    'thumbImageUri' => '/img/marcacao_livro.png',
                    'exploreUri' => '/explore/cabe-na-mala',
                    'summary' => 'Da s&eacute;rie Mico Maneco. Essa divertida hist&oacute;ria ajuda a treinar a leitura de palavras com d&iacute;grafos.',
                    'editorName' => 'Moderna',
                    'prizes' => array(),
                    'moreAbout' => false,
                    'otherLanguages' => false,
                ),
                '2' => array(
                    'title' => 'Banho sem chuva',
                    'thumbImageUri' => '/img/marcacao_livro.png',
                    'exploreUri' => '/explore/banho-sem-chuva',
                    'summary' => 'Da s&eacute;rie Mico Maneco. Essa divertida hist&oacute;ria ajuda a treinar a leitura de palavras com d&iacute;grafos.',
                    'editorName' => 'Moderna',
                    'prizes' => array(),
                    'moreAbout' => false,
                    'otherLanguages' => false,
                ),
                '3' => array(
                    'title' => 'Surpresa na sombra',
                    'thumbImageUri' => '/img/marcacao_livro.png',
                    'exploreUri' => '/explore/surpresa-na-sombra',
                    'summary' => 'Da s&eacute;rie Mico Maneco. Essa divertida hist&oacute;ria ajuda a treinar a leitura de palavras com d&iacute;grafos.',
                    'editorName' => 'Moderna',
                    'prizes' => array(),
                    'moreAbout' => false,
                    'otherLanguages' => false,
                ),
        );

        $pageData = array(
            'worksData' => $worksData,
        );

        $this->view->pageData = $pageData;
        $this->view->pageTitle = $this->view->translate("#Ruth Rocha - Fiction");

    }


    public function indexAction()
    {

        $data = $this->_request->getParams();

        try {
            $theme = $this->view->CheckThemeFromGet($data);
        } catch (Exception $ex) {
            $theme = null;
        }

        if ($theme) {
            $editionsIds = $this->taxonomyMapper->worksWithTheme($theme);

        } else {
            $editionsIds = $this->editionMapper->getAllEditionsAlphabeticallyOrdered();
        }
        $editionsModel = $this->buildEditionsModel($editionsIds);

        $pageData = array(
            'editionsModel' => $editionsModel,
            'themeData' => array('term' => $theme),
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

