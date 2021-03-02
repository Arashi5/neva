<?php

namespace  App\Controller\Form;

class FormCollection implements FormCollectionInterface
{
    private $collection = [];

    /**
     * @param FormInterface $collection
     * @return FormCollectionInterface
     */
    public function set(FormInterface $collection): FormCollectionInterface
    {
        $this->collection = array_merge($this->collection, [$collection]);

        return $this;
    }

    /**
     * @return array
     */
    public function getCollection(): array
    {
        return $this->collection;
    }

}