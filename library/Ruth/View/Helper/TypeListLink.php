<?php

class Ruth_View_Helper_TypeListLink extends Author_View_Helper_TypeListLink
{
    public function typeListLink(Author_Collection_Work $work, Zend_View $view)
    {
        $workType = $work->getType();

        switch($workType) {
            case Ruth_Collection_WorkTypeConstants::TYPE_INFANT:
                $listLink = $this->view->translate('/works/infant');
                break;

            case Ruth_Collection_WorkTypeConstants::TYPE_PRESCHOOLER:
                $listLink = $this->view->translate('/works/preschooler');
                break;

            case Ruth_Collection_WorkTypeConstants::TYPE_KIDS:
                $listLink = $this->view->translate('/works/kids');
                break;

            case Ruth_Collection_WorkTypeConstants::TYPE_TWEEN:
                $listLink = $this->view->translate('/works/tween');
                break;

            case Ruth_Collection_WorkTypeConstants::TYPE_TEEN:
                $listLink = $this->view->translate('/works/teen');
                break;

            case Ruth_Collection_WorkTypeConstants::TYPE_ADULT:
                $listLink = $this->view->translate('/works/adult');
                break;

            default:
                $listLink = $this->view->translate('/works');
                break;

        }
        return $listLink;
    }
}

