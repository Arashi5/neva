<?php

namespace App\Controller\Handler;

/**
 * Class Request
 */
class Request
{
    private $formFields = [];

    private $postRequest = [];

    /**
     * Request constructor.
     */
    public function __construct()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        $post = array_merge($this->postRequest, $_REQUEST);
        if (!$this->isValidFields($post)) {
            return;
        }

        $this->formFields = array_merge($this->formFields, $post);
    }

    /**
     * @param array $post
     * @return bool
     */
    private function isValidFields(array $post): ?bool
    {
        foreach ($post as $key => $value) {
            if ($key === '' || $value === '') {
                return false;
            }

            if (!is_string($key) || !is_string($value)) {
                return false;
            }

            if (preg_match("/<[^<]+>/", $key, $m) !== 0 ||
                preg_match("/<[^<]+>/", $value, $m) !== 0
            ) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return Request|null
     */
    public function getInstance(): ?Request
    {
        return $this;
    }

    /**
     * @return array
     */
    public function getFormValues(): ?array
    {
        return $this->formFields;
    }

    public function getFormName(): ?string
    {
        if (isset($this->formFields['form_name'])) {
            return str_replace("\"", "", $this->formFields['form_name']);
        }

        return '';
    }
}