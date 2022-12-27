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
            $entity->setCnpj('13425212931');
            $entity->setName('Matheus Medeiros');
            $entity->setStatus("ativo");
            $entity->setCreatedAt(new \DateTime());
            $entity->setLogin("MMedeiros03");
            
            $entityManager->persist($entity);
            $entityManager->flush();

            return true;
            
        }catch(Exception $e){
            return false;
        }
    }
}
