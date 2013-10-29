<?php
class Ruth_Form_WorkTypeChange extends Author_Form_WorkTypeChange
{
    public function init()
    {
        parent::init();



        // initialize form
        $this->setName('workTypeChangeForm')
            ->setAction('/admin/work/change-type')
            ->setMethod('post');

        $element = new Zend_Form_Element_Hidden('id');
        $element->addValidator('Int')
            ->addFilter('StringTrim');
        $this->addElement($element);
        $element->setDecorators(array('ViewHelper'));

        $typesObj = new Ruth_Collection_WorkTypes();
        $titlesArray = $typesObj->allTitles();

        $element = new Zend_Form_Element_Radio('type');
	$element->setLabel('#Type:')
                ->setDecorators(array(
                    'ViewHelper',
                    'Errors',
                    array(array('data' => 'HtmlTag'), array('tagClass' => 'div', 'class' => 'option')),
                    array('Label', array('tag' => 'div', 'tagClass' => 'labelAdmin')),
                ))
		->setMultiOptions($titlesArray)
                ->setSeparator('');
        $this->addElement($element);



        // create submit button
        $element = new Zend_Form_Element_Submit('submit');
        $element->setLabel('#Submit') //Gravar
               ->setDecorators(array('ViewHelper','Errors',
                    array(array('data' => 'HtmlTag'),
                    array('tag' => 'div','class' => '')),
                  ))
               ->setOptions(array('class' => ''));
        $this->addElement($element);



    }

    public function process($data) {

        if ($this->isValid($data) !== true) {
            throw new Author_Form_WorkCreateException('Invalid data!');
        } else {
            $db = Zend_Registry::get('db');
            $workMapper = new Ruth_Collection_WorkMapper($db);

            $workId = $data['id'];
            $workObj = $workMapper->findById($workId);

            $workObj->setType($data['type']);

            $workMapper->update($workObj);
            return $workObj;
        }
    }
 }