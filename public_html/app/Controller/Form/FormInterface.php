<?php

namespace App\Controller\Form;

use App\Controller\Handler\Request;
use App\Controller\FormBuilder;


interface FormInterface
{
    public function instance(Request $request, FormBuilder $form): ?FormInterface;

    public function getData(): array;
    
    public function getErrors(): array;
}