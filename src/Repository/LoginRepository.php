<?php


namespace Nbwdigital\BaseProject\Repository;

use DateTime;
use Exception;
use Nbwdigital\BaseProject\Infra\EntityManagerFactory;

class LoginRepository
{

    public function Login(array $data)
    {
        $connection = new EntityManagerFactory();
        $connection = $connection->GetConnectionDb(true);

        $builder = $connection->createQueryBuilder();
        $result = $builder->select("*")
            ->from('user')
            ->where("login = '{$data['login']}' AND password = '{$data['senha']}' ")
            ->fetchAllAssociative();
        return $result;
    }
}
