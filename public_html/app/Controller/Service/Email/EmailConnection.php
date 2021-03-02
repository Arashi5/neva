<?php


namespace App\Controller\Service\Email;


use App\Controller\Service\Connection;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class EmailConnection implements Connection
{
    /**
     * @var EmailConfiguration
     */
    private $configuration;

    /**
     * @var PHPMailer
     */
    private $connection;

    /**
     * EmailConnection constructor.
     * @param EmailConfiguration $configuration
     */
    public function __construct(EmailConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @return Connection|null
     */
    public function Connection(): ?Connection
    {
        $this->connection = new PHPMailer(true);

        try {
            $this->connection->SMTPDebug = SMTP::DEBUG_SERVER;
            $this->connection->isSMTP();
            $this->connection->Host = $this->configuration->getHost();
            $this->connection->SMTPAuth = true;
            $this->connection->Username = $this->configuration->getUsername();
            $this->connection->Password = $this->configuration->getPassword();
            $this->connection->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->connection->Port = $this->configuration->getPort();
        } catch (\Throwable $exception) {
            return null;
        }

        return $this;
    }

    /**
     * @return Connection|null
     */
    public function getConnection(): ?Connection
    {
        return $this->connection;
    }

}