<?php

class Ruth_Collection_WorkMapper extends Author_Collection_WorkMapper
{

    function __construct()
    {
        parent::__construct();
    }

    public function findById($id)
    {
        $this->identityMap->rewind();
        while ($this->identityMap->valid()) {
            if ($this->identityMap->getInfo() == $id) {
                return $this->identityMap->current();
            }
            $this->identityMap->next();
        }

        $query = $this->db->prepare('SELECT uri, title, prefix, description, summary, type FROM author_collection_works WHERE id = :id;');
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $result = $query->fetch();

        if (empty($result)) {
            throw new Author_Collection_WorkMapperException(sprintf('There is no work with id #%d.', $id));
        }
        $uri = $result['uri'];

        $obj = new Ruth_Collection_Work();
        $this->setAttributeValue($obj, $id, 'id');
        $this->setAttributeValue($obj, $result['title'], 'title');
        $this->setAttributeValue($obj, $result['prefix'], 'prefix');
        $this->setAttributeValue($obj, $result['uri'], 'uri');
        $this->setAttributeValue($obj, $result['description'], 'description');
        $this->setAttributeValue($obj, $result['summary'], 'summary');
        $this->setAttributeValue($obj, $result['type'], 'type');


        $this->identityMap[$obj] = $id;

        return $obj;

    }

   private function setAttributeValue(Author_Collection_Work $a, $fieldValue, $attributeName)
    {
        $attribute = new ReflectionProperty($a, $attributeName);
        $attribute->setAccessible(TRUE);
        $attribute->setValue($a, $fieldValue);
    }


}