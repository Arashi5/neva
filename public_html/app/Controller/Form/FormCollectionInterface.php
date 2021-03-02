<?php

namespace App\Controller\Form;

interface FormCollectionInterface
{
    public function set(FormInterface $array): self;
    public function getCollection(): array;
}