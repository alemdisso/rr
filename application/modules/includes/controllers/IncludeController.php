<?php

class Includes_IncludeController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function categoriesAction()
    {

        $categoriesModel[0] = array(
                'id' => $id,
                'term' => $term,
            );


    }

    public function featuredBookAction()
    {

    }

    public function featuredCharacterAction()
    {

    }

    public function filterAction()
    {
        $this->initDbAndMappers();

        $themesList = $this->taxonomyMapper->getAllThemesAlphabeticallyOrdered();
        $themesModel = array();
        foreach ($themesList as $id => $themeData) {
            $themesModel[$id] = array(
                    'id' => $id,
                    'uri' => $themeData['uri'],
                    'term' => $themeData['term'],
                );
        }

        $types = new Ruth_Collection_WorkTypes();
        $typesList = $types->AllTitles();
        $typesModel = array();
        foreach ($typesList as $id => $themeData) {
            $typesModel[$id] = array(
                    'id' => $id,
                    'term' => $themeData,
                );
        }

        $charactersList = $this->taxonomyMapper->getAllCharactersAlphabeticallyOrdered(true);
        $charactersModel = array();

        foreach ($charactersList as $id => $themeData) {
            $charactersModel[$id] = array(
                    'id' => $id,
                    'term' => $themeData,
                );
        }

        $seriesList = $this->serieMapper->getAllSeriesAlphabeticallyOrdered();
        $seriesModel = array();

        $converter = new Moxca_Util_StringToAscii();
        foreach ($seriesList as $id => $themeData) {
            $sanitized = $converter->toAscii($themeData);
            $seriesModel[$id] = array(
                    'id' => $id,
                    'term' => $themeData,
                    'sanitized' => $sanitized
                );
        }


        $pageData = array(
            'themesList' => $themesModel,
            'typesList' => $typesModel,
            'charactersList' => $charactersModel,
            'seriesList' => $seriesModel,
            );

        $this->view->pageData = $pageData;



    }

    public function searchAction()
    {

    }

    public function breadcrumbAction()
    {

    }

    public function headerAction()
    {
        $pageData = Array();


        $controller = $this->getFrontController();
        $moduleName = $controller->getParam('outerModule');

        $user = Zend_Registry::get('user');

    }

    public function headerLoginAction()
    {



    }

    public function footerAction()
    {


    }

    public function footerHomeAction()
    {

    }

    private function initDbAndMappers()
    {
        $this->db = Zend_Registry::get('db');
        $this->serieMapper = new Author_Collection_SerieMapper($this->db);
        $this->taxonomyMapper = new Author_Collection_TaxonomyMapper($this->db);
    }

}