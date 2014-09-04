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
                        'exploreUri' => '/livro/' . $loopWorkObj->getUri(),
                );
            }
        }

        return $editionsData;
    }

    public function autocompleteAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);

        // prevent direct access
        $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
        if(!$isAjax) {
          $user_error = 'Access denied - not an AJAX request...';
          trigger_error($user_error, E_USER_ERROR);
        }




        $data = $this->_request->getParams();
        $term = $data['term'];

        $parts = explode(' ', $term);


        $a_json = array();
        $a_json_row = array();

        $a_json_invalid = array(array("id" => "#", "value" => $term, "label" => "Only letters and digits are permitted..."));
        $json_invalid = json_encode($a_json_invalid);

        // replace multiple spaces with one
        $term = preg_replace('/\s+/', ' ', $term);

        // SECURITY HOLE ***************************************************************
        // allow space, any unicode letter and digit, underscore and dash
        if(preg_match("/[^\040\pL\pN_-]/u", $term)) {
          print $json_invalid;
          exit;
        }
        // *****************************************************************************


        $parts = explode(' ', $term);

        $result = $this->editionMapper->getAutoCompleteWorks($parts);

        $i = 0;

        foreach($result as $rowResult) {
          $a_json_row["id"] = $rowResult['uri'];
          $a_json_row["value"] = $rowResult['title'];
          $a_json_row["label"] = $rowResult['title'];
          array_push($a_json, $a_json_row);
        }

        // highlight search results
        $a_json = $this->apply_highlight($a_json, $parts);


        echo json_encode($a_json);

//        $json = json_encode($a_json);
//        print $json;

    }

/**
 * mb_stripos all occurences
 * based on http://www.php.net/manual/en/function.strpos.php#87061
 *
 * Find all occurrences of a needle in a haystack
 *
 * @param string $haystack
 * @param string $needle
 * @return array or false
 */
private function mb_stripos_all($haystack, $needle) {

  $s = 0;
  $i = 0;

  while(is_integer($i)) {

    $i = mb_stripos($haystack, $needle, $s);

    if(is_integer($i)) {
      $aStrPos[] = $i;
      $s = $i + mb_strlen($needle);
    }
  }

  if(isset($aStrPos)) {
    return $aStrPos;
  } else {
    return false;
  }
}

/**
 * Apply highlight to row label
 *
 * @param string $a_json json data
 * @param array $parts strings to search
 * @return array
 */
private function apply_highlight($a_json, $parts) {

  $p = count($parts);
  $rows = count($a_json);

  for($row = 0; $row < $rows; $row++) {

    $label = $a_json[$row]["label"];
    $a_label_match = array();

    $converter = new Moxca_Util_StringToAscii();

    for($i = 0; $i < $p; $i++) {

      $part_len = mb_strlen($parts[$i]);
      $a_match_start = $this->mb_stripos_all($converter->toAscii($label), $converter->toAscii($parts[$i]));
      foreach($a_match_start as $part_pos) {

        $overlap = false;
        foreach($a_label_match as $pos => $len) {
          if($part_pos - $pos >= 0 && $part_pos - $pos < $len) {
            $overlap = true;
            break;
          }
        }
        if(!$overlap) {
          $a_label_match[$part_pos] = $part_len;
        }

      }

    }

    if(count($a_label_match) > 0) {
      ksort($a_label_match);

      $label_highlight = '';
      $start = 0;
      $label_len = mb_strlen($label);

      foreach($a_label_match as $pos => $len) {
        if($pos - $start > 0) {
          $no_highlight = mb_substr($label, $start, $pos - $start);
          $label_highlight .= $no_highlight;
        }
        $highlight = '<span class="hl_results">' . mb_substr($label, $pos, $len) . '</span>';
        $label_highlight .= $highlight;
        $start = $pos + $len;
      }

      if($label_len - $start > 0) {
        $no_highlight = mb_substr($label, $start);
        $label_highlight .= $no_highlight;
      }

      $a_json[$row]["label"] = $label_highlight;
    }

  }

  return $a_json;

}


}

