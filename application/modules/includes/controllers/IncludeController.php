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
        $themesList = $this->view->themesList(new Author_Collection_TaxonomyMapper);
        $themesModel = array();

        foreach ($themesList as $id => $term) {
            $themesModel[$id] = array(
                    'id' => $id,
                    'term' => $term,
                );
        }

        $pageData = array(
            'themesList' => $themesModel,
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

}