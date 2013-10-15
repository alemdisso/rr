<?php

class Works_View_Helper_SameSerieEditionsRows extends Zend_View_Helper_Abstract
{
    public function sameSerieEditionsRows($model)
    {
        if(is_array($model)) {
            $editionsPerRow = 5;
            $rows=array();
            $row=array();
            $editionsCount = 0;
            foreach($model as $editionData) {
                $row[$editionsCount++] = $editionData;
                if ($editionsCount == $editionsPerRow) {
                    $rows[] = array('row' => $row);
                    $row=array();
                    $editionsCount = 0;
                }
            }


            if ($editionsCount) {
                while ($editionsCount < $editionsPerRow) {
                    $row[$editionsCount++] = null;
                }
                $rows[] = array('row' => $row);
            }

        }
        return $this->view->partialLoop('edition/same-serie-editions-row.phtml', $rows);

    }

}

