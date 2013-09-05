<?php

class Ruth_Collection_WorkTypes {

    private $titles = array();


    public function __construct() {
        $this->titles = array(

            Ruth_Collection_WorkTypeConstants::TYPE_NIL      => _("#Nil"),
            Ruth_Collection_WorkTypeConstants::TYPE_CHILDREN => _("#Children"),
            Ruth_Collection_WorkTypeConstants::TYPE_YOUNG    => _("#Young"),
            Ruth_Collection_WorkTypeConstants::TYPE_FICTION  => _("#Fiction"),
            Ruth_Collection_WorkTypeConstants::TYPE_ESSAY    => _("#Essay"),
        );
    }

    public function TitleForType($type)
    {
            switch ($type) {
                case Ruth_Collection_WorkTypeConstants::TYPE_PROSPECTING:
                case Ruth_Collection_WorkTypeConstants::TYPE_PLANNING:
                case Ruth_Collection_WorkTypeConstants::TYPE_PROPOSAL:
                case Ruth_Collection_WorkTypeConstants::TYPE_EXECUTION:
                case Ruth_Collection_WorkTypeConstants::TYPE_ACCOUNTABILITY:
                case Ruth_Collection_WorkTypeConstants::TYPE_CANCELED:
                case Ruth_Collection_WorkTypeConstants::TYPE_SUSPENDED:
                case Ruth_Collection_WorkTypeConstants::TYPE_FINISHED:
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