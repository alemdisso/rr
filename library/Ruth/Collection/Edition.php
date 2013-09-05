<?php

class Ruth_Collection_Edition {

    protected $id;
    protected $work;
    protected $editor;
    protected $pages;
    protected $coverImageFilename;
    protected $isbn;
    protected $illustrator;
    protected $coverDesigner;

    function __construct($work, $editor, $id=0) {
        $this->id = (int)$id;
        $this->work = $work;
        $this->editor = $editor;
        $this->pages = null;
        $this->coverImageFileName = null;
        $this->isbn = null;
        $this->illustrator = null;
        $this->coverDesigner = null;
    }

    public function getId() {
        return $this->id;
    } //getId

    public function SetId($id) {
        if (($this->id == 0) && ($id > 0)) {
            $this->id = (int)$id;
        } else {
            throw new Ruth_Collection_EditionException('It\'s not possible to change a edition\'s ID');
        }

    } //SetId

    public function getEditor()
    {
        return $this->name;
    } //getName

    public function getWork()
    {
        return $this->work;
    } //getWork

}