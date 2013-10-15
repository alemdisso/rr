<?php
class Works_View_Helper_EditionSerie extends Zend_View_Helper_Abstract
{
    public function editionSerie($serieData)
    {
        if ((isset($serieData['otherEditionsModel'])) && (is_array($serieData['otherEditionsModel']))) {
            $otherEditions = $serieData['otherEditionsModel'];
            if (count($otherEditions) > 1) {
                echo  $this->view->partial('edition/edition-serie.phtml', $serieData);
            }
        }
    }
}