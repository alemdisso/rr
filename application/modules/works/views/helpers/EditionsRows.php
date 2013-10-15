<?php

class Works_View_Helper_EditionsRows extends Zend_View_Helper_Abstract
{
    public function editionsRows($model)
    {
        $rows=array();
        $firstRow = true;
        if(is_array($model)) {
            $editionsPerRow = 5;
            $row=array();
            $editionsCount = 0;
            foreach($model as $editionData) {
                $row[$editionsCount++] = $editionData;
                if ($editionsCount == $editionsPerRow) {
                    $rows[] = array('row' => $row, 'firstRow' => $firstRow);
                    $row=array();
                    $editionsCount = 0;
                    $firstRow = false;
                }
            }


            if ($editionsCount) {
                while ($editionsCount < $editionsPerRow) {
                    $row[$editionsCount++] = null;
                }
                $rows[] = array('row' => $row, 'firstRow' => $firstRow);
            }

        }
        return $this->view->partialLoop('index/editions-row.phtml', $rows);

    }

}

