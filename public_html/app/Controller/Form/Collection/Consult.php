<?php

namespace App\Controller\Form\Collection;

use App\Controller\Handler\Request;
use App\Controller\FormBuilder;
use App\Controller\Form\FormValidateController;
use App\Controller\Form\FormInterface;

class Consult extends FormValidateController implements FormInterface
{
    /**
     * @param Request $request
     * @param FormBuilder $form
     * @return \App\Controller\Form\FormInterface
     */
    public function instance(Request $request, FormBuilder $form): ?FormInterface
    {
        return null;
    }

    public function getData(): array
    {
        return [];
    }

    public function getErrors(): array
    {
        return parent::getErrors();
    }
}