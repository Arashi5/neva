<?php


namespace App\Controller\Service\DataBase;

use App\Controller\Service\Connection;
use PDO;

class DatabaseConnection implements Connection
{

    /**
     * @var DatabaseConfiguration
     */
    private $configuration;

    /**
     * @var PDO
     */
    private $connection;

    /**
     * DatabaseConnection constructor.
     * @param DatabaseConfiguration $config
     */
    public function __construct(DatabaseConfiguration $config)
    {
        $this->configuration = $config;
    }

    /**
     * @return Connection|null
     */
    public function Connection(): ?Connection
    {
        try {
            $this->connection = new PDO(
                sprintf('%s:%s', $this->configuration->getHost(), $this->configuration->getPort()),
                $this->configuration->getUsername(),
                $this->configuration->getPassword()
            );
        } catch (\PDOException $exception) {

            return null;
        }

        return $this;
    }

    /**
     * @return object
     */
    public function getConnection(): ?Connection
    {
        return $this->connection;
    }
}