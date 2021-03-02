<?php

namespace App;

class Config
{
    private $dbHost = '';
    private $dbPort = '';
    private $dbLogin = '';
    private $dbPass = '';

    private $smtpHost = '';
    private $smtpPort = '';
    private $smtpLogin = '';
    private $smtpPass = '';

    public function __construct(array $config)
    {
        $this->setDbHost($config['app']['database']['host']);
        $this->setDbPort($config['app']['database']['port']);
        $this->setDbLogin($config['app']['database']['login']);
        $this->setDbPass($config['app']['database']['pass']);

        $this->setSmtpHost($config['app']['smtp']['host']);
        $this->setSmtpPort($config['app']['smtp']['port']);
        $this->setSmtpLogin($config['app']['smtp']['login']);
        $this->setSmtpPass($config['app']['smtp']['pass']);
    }

    /**
     * @return string
     */
    public function getDbHost(): string
    {
        return $this->dbHost;
    }

    /**
     * @return string
     */
    public function getDbLogin(): string
    {
        return $this->dbLogin;
    }

    /**
     * @return string
     */
    public function getDbPass(): string
    {
        return $this->dbPass;
    }

    /**
     * @param string $dbHost
     */
    private function setDbHost(string $dbHost): void
    {
        $this->dbHost = $dbHost;
    }

    /**
     * @param string $dbLogin
     */
    private function setDbLogin(string $dbLogin): void
    {
        $this->dbLogin = $dbLogin;
    }

    /**
     * @param string $dbPass
     */
    private function setDbPass(string $dbPass): void
    {
        $this->dbPass = $dbPass;
    }

    /**
     * @param string $dbPort
     */
    private function setDbPort(int $dbPort): void
    {
        $this->dbPort = $dbPort;
    }

    /**
     * @return int
     */
    public function getDbPort(): int
    {
        return $this->dbPort;
    }

    /**
     * @return string
     */
    public function getSmtpHost(): string
    {
        return $this->smtpHost;
    }

    /**
     * @return string
     */
    public function getSmtpLogin(): string
    {
        return $this->smtpLogin;
    }

    /**
     * @return string
     */
    public function getSmtpPass(): string
    {
        return $this->smtpPass;
    }

    /**
     * @return int
     */
    public function getSmtpPort(): int
    {
        return $this->smtpPort;
    }

    /**
     * @param string $smtpHost
     */
    private function setSmtpHost(string $smtpHost): void
    {
        $this->smtpHost = $smtpHost;
    }

    /**
     * @param string $smtpLogin
     */
    private function setSmtpLogin(string $smtpLogin): void
    {
        $this->smtpLogin = $smtpLogin;
    }

    /**
     * @param string $smtpPass
     */
    private function setSmtpPass(string $smtpPass): void
    {
        $this->smtpPass = $smtpPass;
    }

    /**
     * @param int $smtpPort
     */
    private function setSmtpPort(int $smtpPort): void
    {
        $this->smtpPort = $smtpPort;
    }
}