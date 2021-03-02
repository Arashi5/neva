<?php


namespace App\Controller\Service;


interface Connection
{
    /**
     * @return Connection|null
     */
    public function Connection(): ?Connection;

    /**
     * @return Connection|null
     */
    public function getConnection(): ?Connection;

}