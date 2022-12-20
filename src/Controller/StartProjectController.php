<?php

namespace Nbwdigital\BaseProject\Controller;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Nbwdigital\BaseProject\Entity\User;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\SchemaValidator;
use Nbwdigital\BaseProject\Infra\EntityManagerFactory;
use Nbwdigital\BaseProject\Repository\CursoRepository;
use Nbwdigital\BaseProject\Traits\Utils;

// use Doctrine\ORM\Exception\ORMException;
use Doctrine\DBAL\Exception;

class StartProjectController
{

    use Utils;

    public function StartProject(Request $request, Response $response, $args)
    {
        try {

            // $curso = new CursoRepository();
            // $cursos = $curso->getAll();
            // $response->getBody()->write(json_encode($cursos));
            // return $response;


            $entityManagerFactory = new EntityManagerFactory();
            $entityManager = $entityManagerFactory->getEntityManager();

            $connection = $entityManagerFactory->GetConnectionDb();

            $schemaManager = $connection->createSchemaManager();

            if ($schemaManager->tablesExist(['User', 'Invoice'])) {
                $response->getBody()->write("tabelas ja existem no banco");
                return $response;
            } else {
                $tool = new SchemaTool($entityManager);
                $classes = [
                    $classMetadata = $entityManager->getClassMetadata("Nbwdigital\BaseProject\Entity\User"),
                    $classMetadata = $entityManager->getClassMetadata("Nbwdigital\BaseProject\Entity\Invoice")
                ];

                $tool->createSchema($classes);
                $response->getBody()->write("tabela criada no banco de dados");
                return $response;
            }
        } catch (Exception $e) {


            $this->writeToLog($e->getMessage(), "URL - ERROR");
            return $response->getBody()->write("erro fudido");
        }
    }
}
