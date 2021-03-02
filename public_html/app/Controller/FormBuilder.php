<?php

namespace App\Controller;

use App\Controller\Form\FormCollectionInterface;
use App\Controller\Form\FormInterface;
use App\Controller\Handler\Captcha;
use App\Controller\Handler\Request;

class FormBuilder
{
    /**
     * @var array
     */
    private $collection = [];

    /**
    /**
     * @param FormCollectionInterface $collection
     * @return FormBuilder
     */
    public function setCollection(FormCollectionInterface $collection): FormBuilder
    {
        $this->collection = $collection->getCollection();
        return $this;
    }

    /**
     * @return FormInterface
     * @throws \Exception
     */
    public function build(): ?FormInterface
    {
        if (count($this->collection) < 1) {
            return null;
        }

        if (!Captcha::isValid()) {
           throw new \Exception('captcha');
        }

        foreach ($this->collection as $form) {
            $form = $form->instance(new Request(), $this);
            if  ($form === null) {
                continue;
            }

            if (empty($form->getErrors()) && !empty($form->getData())) {
               return $form;
            }

            if (!empty($form->getErrors())) {
               throw new \Exception(implode(',', $form->getErrors()));
            }
        }

        return null;
    }
}