<?php

use Doctrine\DBAL\DriverManager;


class CursoRepository{

    public function getAll(){

        $connectionParams = [
            'dbname' => 'projetobasephp',
            'user' => 'root',
            'password' => 'Ma_23080903',
            'host' => 'localhost',
            'driver' => 'pdo_mysql'
        ];

        $connection = DriverManager::getConnection($connectionParams);


        $builder = $connection->createQueryBuilder();
        $builder->select("*")
                ->from('curso')
                ->where('id > 1')
                ->fetchAllAssociative();
        var_dump($builder);

    }

}