<?php


namespace Nbwdigital\BaseProject\Repository;

use DateTime;
use Exception;
use Nbwdigital\BaseProject\Infra\EntityManagerFactory;
use Nbwdigital\BaseProject\Entity\RolePermission;

class RolePermissionRepository
{

    public function getAll()
    {
        $connection = new EntityManagerFactory();
        $connection = $connection->GetConnectionDb(true);

        $builder = $connection->createQueryBuilder();
        $result = $builder->select("*")
            ->from('rolepermission')
            ->fetchAllAssociative();
        return $result;
    }

    public function Save(array $data = [])
    {
        try {
            $connection = new EntityManagerFactory();
            $entityManager  = $connection->getEntityManager(true);

            $entity = new RolePermission();
            $entity->setRoleName("Programador");
            $entity->setResourceId(1);
            $entity->setResourceName("Developer");
            $entity->setCanView(true);
            $entity->setCanHandle(true);
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
            ->from('rolepermission')
            ->where("id = {$id}")
            ->fetchAllAssociative();
        return $result;
    }

    public function Delete(int $id)
    {
        $connection = new EntityManagerFactory();
        $entityManager  = $connection->getEntityManager(true);
        $entity = $entityManager->getRepository(RolePermission::class)->find($id);
        if (!$entity) {
            throw new Exception('No entity found for id ' . $id, 404);
        } else {
            $entity->setDeleteDate(new DateTime('now'));
            $entity->setUserDelete(5);
            $entityManager->persist($entity);
            $entityManager->flush();
        }
    }

    public function Update(int $id)
    {
        $connection = new EntityManagerFactory();
        $entityManager  = $connection->getEntityManager(true);
        $entity = $entityManager->getRepository(RolePermission::class)->find($id);
        if (!$entity) {
            throw new Exception('No entity found for id ' . $id, 404);
        } else {
            $entity->setRoleName("Programador");
            $entity->setResourceId(1);
            $entity->setResourceName("Developer");
            $entity->setCanView(true);
            $entity->setCanHandle(true);
            $entity->setUpdateDate(new DateTime('now'));
            $entity->setUserUpdate(0);
            $entityManager->persist($entity);
            $entityManager->flush();
        }
    }
}
