<?php 

class ExampleEntity extends Entity
{
    public function getData()
    {
        $this->dataAccess->setDbTable('example');
        return $this->dataAccess->find();
    }



}