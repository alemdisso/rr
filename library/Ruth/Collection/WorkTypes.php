<?php

class Ruth_Collection_WorkTypes extends Author_Collection_WorkTypes {

    private $titles = array();

    public function __construct() {
        $this->titles = array(
            Ruth_Collection_WorkTypeConstants::TYPE_NIL         => _("#Nil"),
            Ruth_Collection_WorkTypeConstants::TYPE_INFANT      => _("#Infant"),
            Ruth_Collection_WorkTypeConstants::TYPE_PRESCHOOLER => _("#Preschooler"),
            Ruth_Collection_WorkTypeConstants::TYPE_KIDS        => _("#Kids"),
            Ruth_Collection_WorkTypeConstants::TYPE_TWEEN       => _("#Tween"),
            Ruth_Collection_WorkTypeConstants::TYPE_TEEN        => _("#Teen"),
            Ruth_Collection_WorkTypeConstants::TYPE_ADULT       => _("#Adult"),
        );
    }

    public function TitleForType($type)
    {
            switch ($type) {
                case Ruth_Collection_WorkTypeConstants::TYPE_NIL:
                case Ruth_Collection_WorkTypeConstants::TYPE_INFANT:
                case Ruth_Collection_WorkTypeConstants::TYPE_PRESCHOOLER:
                case Ruth_Collection_WorkTypeConstants::TYPE_KIDS:
                case Ruth_Collection_WorkTypeConstants::TYPE_TWEEN:
                case Ruth_Collection_WorkTypeConstants::TYPE_TEEN:
                case Ruth_Collection_WorkTypeConstants::TYPE_ADULT:
                    return $this->titles[$type];
                    break;

                default:
                    return _("#Unknown type");
                    break;
            }
    }

    public function AllTitles($includeNull = false)
    {

        if ($includeNull) {
            return $this->titles;
        } else {
            $data = array();
            foreach ($this->titles as $k => $v) {
                if ($k != Ruth_Collection_WorkTypeConstants::TYPE_NIL) {
                    $data[$k] = $v;
                }
            }
            return($data);
        }
    }
}