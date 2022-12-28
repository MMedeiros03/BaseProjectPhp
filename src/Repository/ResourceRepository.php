<?php


namespace Nbwdigital\BaseProject\Repository;

use DateTime;
use Exception;
use Nbwdigital\BaseProject\Entity\Resource;
use Nbwdigital\BaseProject\Infra\EntityManagerFactory;
use Nbwdigital\BaseProject\Entity\User;

class ResourceRepository
{

    public function getAll()
    {
        $connection = new EntityManagerFactory();
        $connection = $connection->GetConnectionDb(true);

        $builder = $connection->createQueryBuilder();
        $result = $builder->select("*")
            ->from('resource')
            ->fetchAllAssociative();
        return $result;
    }

    public function Save(array $data = [])
    {
        try {
            $connection = new EntityManagerFactory();
            $entityManager  = $connection->getEntityManager(true);

            $entity = new Resource();
            $entity->setName('Developer');
            $entity->setLabel('sla porra');
            $entity->setDescription('sla porra 2');
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
            ->from('resource')
            ->where("id = {$id}")
            ->fetchAllAssociative();
        return $result;
    }

    // public function Delete(int $id)
    // {
    //     $connection = new EntityManagerFactory();
    //     $entityManager  = $connection->getEntityManager(true);
    //     $connection = $connection->GetConnectionDb(true);

    //     $entity = $entityManager->getRepository(User::class)->find($id);
    //     if (!$entity) {
    //         throw new Exception('No entity found for id ' . $id, 404);
    //     } else {

    //         $entity = new User();

    //         $entity->setDeleteDate(new DateTime('now'));
    //         $entity->setUserDelete(0);

    //         $entityManager->persist($entity);
    //         $entityManager->flush();
    //     }
    // }
}
