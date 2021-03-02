<?php


namespace App;

use App\Controller\Form\Collection\GetPrice;
use App\Controller\FormBuilder;
use App\Controller\Form\FormCollection;
use App\Controller\Form\Collection\Consult;
use App\Controller\Form\Collection\HaveQuestions;
use App\Controller\Handler\DataBase;
use App\Controller\Handler\Email;
use App\Controller\Service\DataBase\DatabaseConfiguration;
use App\Controller\Service\DataBase\DatabaseConnection;
use App\Controller\Service\Email\EmailConfiguration;
use App\Controller\Service\Email\EmailConnection;

class Application
{

    private  $dataBase;

    private  $email;

    private $error;

    public function __construct()
    {
        try {
            $config = new Config(yaml_parse_file('../config.yaml'));
            $this->dataBase = (new DatabaseConnection(
                new DatabaseConfiguration(
                    $config->getDbHost(),
                    $config->getDbPort(),
                    $config->getDbLogin(),
                    $config->getDbPass()
                )
            ))->Connection();

            $this->email = (new EmailConnection(
                new EmailConfiguration(
                    $config->getSmtpHost(),
                    $config->getSmtpPort(),
                    $config->getSmtpLogin(),
                    $config->getSmtpPass()
                )
            ))->Connection();

            if ($config === false) {
                return;
            }

        } catch (\Throwable $exception) {
            $this->error = $exception->getMessage();
        }
    }

    /**
     * @return array
     */
    public function execute()
    {
        if (!empty($this->error)) {
            return ['result' => false, explode(',',$this->error)];
        }

        $formCollection = (new FormCollection())
            ->set(new Consult())
            ->set(new HaveQuestions())
            ->set(new GetPrice());
        try {
            $formBuilder = new FormBuilder();
            $form = $formBuilder->setCollection($formCollection)->build();

            if ($form !== null) {
                new Email($form, $this->email->getConnection());
                new DataBase($form, $this->dataBase->getConnection());

                return ['result'=> true];
            }
        } catch (\Throwable $exception) {
            return ['result' => false, explode(',', $exception->getMessage())];
        }

        return ['result' => false];
    }
}