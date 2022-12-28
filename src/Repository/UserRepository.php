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
        $connection = $connection->GetConnectionDb(true);

        $builder = $connection->createQueryBuilder();
        $result = $builder->select("*")
            ->from('user')
            ->fetchAllAssociative();
        return $result;
    }

    public function Save(array $data = [])
    {
        try {
            $connection = new EntityManagerFactory();
            $entityManager  = $connection->getEntityManager(true);

            $entity = new User();
            $entity->setId(1);
            $entity->setName('Matheus');
            $entity->setLogin('matheus');
            $entity->setPassword('23080903');
            $entity->setCreateDate(new DateTime('now'));
            $entity->setUserCreate(0);

            $entityManager->persist($entity);
            $entityManager->flush();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function GetById(int $id)
    {
        $connection = new EntityManagerFactory();
        $connection = $connection->GetConnectionDb(true);

        $builder = $connection->createQueryBuilder();
        $result = $builder->select("*")
            ->from('user')
            ->where("id = {$id}")
            ->fetchAllAssociative();
        return $result;
    }

    public function Delete(int $id)
    {
        $connection = new EntityManagerFactory();
        $entityManager  = $connection->getEntityManager(true);
        $connection = $connection->GetConnectionDb(true);

        $entity = $entityManager->getRepository(User::class)->find($id);
        if (!$entity) {
            throw new Exception('No entity found for id ' . $id, 404);
        } else {

            $entity = new User();

            $entity->setDeleteDate(new DateTime('now'));
            $entity->setUserDelete(0);

            $entityManager->persist($entity);
            $entityManager->flush();
        }
    }
}
