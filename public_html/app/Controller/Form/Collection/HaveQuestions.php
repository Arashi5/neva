<?php

namespace App\Controller\Form\Collection;

use App\Controller\Handler\Request;
use App\Controller\FormBuilder;
use App\Controller\Form\FormValidateController;
use App\Controller\Form\FormInterface;

class HaveQuestions extends FormValidateController implements FormInterface
{

    public const FORM_NAME = 'have_a_questions';

    /**
     * @var array
     */
    private $name = [];

    /**
     * @var array
     */
    private $phone = [];

    /**
     * @var array
     */
    private $comment = [];

    /**
     * @param Request $request
     * @param FormBuilder $form
     * @return FormInterface
     */
    public function instance(Request $request, FormBuilder $form): ?FormInterface
    {
        if ($request->getFormName() !== static::FORM_NAME) {
            $this->setErrors(['form_name']);
            return null;
        }

        $values = $request->getFormValues();
        if (!isset($values['phone']) || !$this->validatePhone($values['phone'])) {
            $this->setErrors(['phone']);
        }

        if ($this->isEmpty($values['name'])) {
            $this->setErrors(['name']);
        }

        if ($this->isEmpty($values['comment'])) {
            $this->setErrors(['comment']);
        }

        if (count($this->getErrors()) > 0) {
            return $this;
        }

        $this->name['name'] = $request->getFormValues()['name'];
        $this->phone['phone'] = $request->getFormValues()['phone'];
        $this->comment['comment'] = $request->getFormValues()['comment'];

        return $this;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return parent::getErrors();
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            $this->name,
            $this->phone,
            $this->comment,
        ];
    }
}