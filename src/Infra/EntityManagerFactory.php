<?php

namespace Nbwdigital\BaseProject\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;
use Exception;
use Nbwdigital\BaseProject\Traits\Utils;
use Doctrine\ORM\Mapping\ClassMetadata;

class EntityManagerFactory
{

    use Utils;

    /**
     * @throws \Doctrine\ORM\ORMException
     */
    public function getEntityManager(bool $flag = false)
    {
        $connectionParams = [
            "dbname" => $flag ? $_ENV["PROJECT_NAME"] : $_ENV["PROJECT_NAME_INITIAL"],
            "user" => $_ENV["DB_USER"],
            "password" => $_ENV["DB_PASSWORD"],
            "host" => $_ENV["DB_HOST"],
            'driver' => $_ENV["DB_DRIVER"]
        ];

        try {
            $path = getcwd();
            $config = ORMSetup::createAttributeMetadataConfiguration(
                [$path . '\src\Entity'],
                true // modo Desenvolvimento
            );

            return EntityManager::create($connectionParams, $config);
        } catch (Exception $e) {
            $this->writeToLog($e->getMessage(), "URL - ERROR");
            return false;
        }
    }

    public function GetConnectionDb()
    {

        $connectionParams = [
            'dbname' => $_ENV["PROJECT_NAME_INITIAL"],
            "user" => $_ENV["DB_USER"],
            "password" => $_ENV["DB_PASSWORD"],
            "host" => $_ENV["DB_HOST"],
            'driver' => $_ENV["DB_DRIVER"]
        ];

        try {
            $connection = DriverManager::getConnection($connectionParams);
            return $connection;
        } catch (Exception $e) {
            $this->writeToLog($e->getMessage(), "URL - ERROR");
            return false;
        }
    }
}
