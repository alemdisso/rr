<?php

class Ruth_Collection_Work extends Author_Collection_Work {

    protected $type;

    function __construct($id=0) {
        parent::__construct($id);

    }


    public function setType($type)
    {
        switch ($type) {
            case Ruth_Collection_WorkTypeConstants::TYPE_NIL:
            case Ruth_Collection_WorkTypeConstants::TYPE_INFANT:
            case Ruth_Collection_WorkTypeConstants::TYPE_PRESCHOOLER:
            case Ruth_Collection_WorkTypeConstants::TYPE_KIDS:
            case Ruth_Collection_WorkTypeConstants::TYPE_TWEEN:
            case Ruth_Collection_WorkTypeConstants::TYPE_TEEN:
            case Ruth_Collection_WorkTypeConstants::TYPE_ADULT:
                $this->type = (int)$type;
                break;

            case null:
            case "":
            case 0:
            case false:
                $this->type = null;
                break;

            default:
                throw new Author_Collection_ProjectException("Invalid project type.");
                break;
        }
    }

    public function getType()
    {
        return $this->type;
    }


}