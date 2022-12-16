<?php

namespace Nbwdigital\BaseProject\Infra;

use Doctrine\ORM\EntityManager;

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
    public function getEntityManager()
    {
        try {
            $path = getcwd();
            $config = ORMSetup::createAttributeMetadataConfiguration(
                [$path . '\src\Entity'],
                true // modo Desenvolvimento
            );

            $connectionParams = [
                'dbname' => 'projetobasephp',
                'user' => 'root',
                'password' => 'Ma_23080903',
                'host' => 'localhost',
                'driver' => 'pdo_mysql',
            ];
            return EntityManager::create($connectionParams, $config);

        } catch (Exception $e) {
            $this->writeToLog($e->getMessage(), "URL - ERROR");
            return false;
        }
    }
}
