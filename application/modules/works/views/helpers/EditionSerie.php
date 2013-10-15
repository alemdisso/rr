<?php

class Works_View_Helper_EditionSerie extends Zend_View_Helper_Abstract
{
    public function editionSerie(Author_Collection_Edition $edition, Author_Collection_EditionMapper $mapper, $serieName, $serieUri, $model)
    {
        $serie = $edition->getSerie();
        if ($serie > 0) {
            $seriesIds = $mapper->getAllEditionsOfSerieById($serie);
            if (count($seriesIds) > 1) {
                $model = array(
                    'serieName' => $serieName,
                    'serieUri' => $serieUri,
                    'seriesId' => $seriesIds,
                    'exploredEdition' => $edition->getId(),
                    'sameSerieData' => $model,
                    );

                echo  $this->view->partial('edition/edition-serie.phtml', $model);

            }

        } else {
            echo "....";
        }

    }

}

