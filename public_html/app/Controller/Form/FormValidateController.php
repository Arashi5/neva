<?php


namespace App\Controller\Form;


abstract class FormValidateController
{

    private $errors = [];

    protected function setErrors(array $error): void
    {
        $this->errors = array_merge($this->errors, $error);
    }

    protected function getErrors(): array
    {
        return $this->errors;
    }
    protected function validatePhone(?string $phone): bool
    {
        if ($phone === null) {
            return false;
        }

        if (strlen($phone) > 10) {
            $phone = substr($phone, -10);
        }

        return preg_match('/^[0-9]{10}+$/', $phone);
    }

    protected function isEmpty(string $value) : bool
    {
        return !isset($value) || $value === '';
    }
}