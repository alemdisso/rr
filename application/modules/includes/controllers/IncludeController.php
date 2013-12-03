<?php

class Includes_IncludeController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function categoriesAction()
    {

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
        foreach ($themesList as $id => $term) {
            $themesModel[$id] = array(
                    'id' => $id,
                    'term' => $term,
                );
        }

        $types = new Ruth_Collection_WorkTypes();
        $typesList = $types->AllTitles();
        $typesModel = array();
        foreach ($typesList as $id => $term) {
            $typesModel[$id] = array(
                    'id' => $id,
                    'term' => $term,
                );
        }

        $charactersList = $this->taxonomyMapper->getCharactersAlphabeticallyOrdered(true);
        $charactersModel = array();

        foreach ($charactersList as $id => $term) {
            $charactersModel[$id] = array(
                    'id' => $id,
                    'term' => $term,
                );
        }


        $pageData = array(
            'themesList' => $themesModel,
            'typesList' => $typesModel,
            'charactersList' => $charactersModel,
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
        $this->taxonomyMapper = new Author_Collection_TaxonomyMapper($this->db);
    }

}