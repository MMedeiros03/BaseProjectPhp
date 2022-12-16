<?php

namespace Nbwdigital\BaseProject\Repository;

use Nbwdigital\BaseProject\Infra\EntityManagerFactory;

class CursoRepository
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
}
