<?php

namespace Nbwdigital\BaseProject\Repository;

use DateTime;
use Exception;
use Nbwdigital\BaseProject\Infra\EntityManagerFactory;
use Nbwdigital\BaseProject\Entity\User;

class UserRepository
{

    public function getAll()
    {
        $connection = new EntityManagerFactory();
        $connection = $connection->GetConnectionDb();

        $builder = $connection->createQueryBuilder();
        $result = $builder->select("*")
            ->from('user')
            ->fetchAllAssociative();
        return $result;
    }

    public function Save(array $data){
        try{
            $connection = new EntityManagerFactory();
            $entityManager  = $connection->getEntityManager();

            $entity = new User();
            $entity->setId();
            $entity->setName();
            $entity->setLogin();
            $entity->setPassword();
            $entity->setCreateDate();
            $entity->setUserCreate();
            
            $entityManager->persist($entity);
            $entityManager->flush();

            return true;
            
        }catch(Exception $e){
            return false;
        }
    }
}
