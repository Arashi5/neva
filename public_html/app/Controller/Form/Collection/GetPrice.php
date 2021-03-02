<?php

namespace App\Controller\Form\Collection;

use App\Controller\Handler\Request;
use App\Controller\FormBuilder;
use App\Controller\Form\FormValidateController;
use App\Controller\Form\FormInterface;

class GetPrice extends FormValidateController implements FormInterface
{

    public const FORM_NAME = [
        'have_a_questions',
        'modal_form_name_get_price'
    ];

    /**
     * @var array
     */
    private $name = [];

    /**
     * @var array
     */
    private $email = [];

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
        if (in_array($request->getFormName(), static::FORM_NAME) === false) {
            $this->setErrors(['form_name']);
            return null;
        }

        $values = $request->getFormValues();
        if (!isset($values['email'])) {
            $this->setErrors(['email']);
        }

        if ($this->isEmpty($values['name'])) {
            $this->setErrors(['name']);
        }

        if (count($this->getErrors()) > 0) {
            return $this;
        }

        $this->name['name'] = $request->getFormValues()['name'];
        $this->email['email'] = $request->getFormValues()['email'];
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
            $this->email,
            $this->comment,
        ];
    }
}