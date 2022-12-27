<?php

namespace Nbwdigital\BaseProject\Controller;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Nbwdigital\BaseProject\Entity\User;
use Doctrine\ORM\Tools\SchemaTool;
use Nbwdigital\BaseProject\Infra\EntityManagerFactory;
use Nbwdigital\BaseProject\Repository\UserRepository;
use Nbwdigital\BaseProject\Traits\Utils;

// use Doctrine\ORM\Exception\ORMException;
use Doctrine\DBAL\Exception;

class StartProjectController
{
    use Utils;

    public function StartProject(Request $request, Response $response, $args)
    {
        $entityManagerFactory = new EntityManagerFactory();
        $entityManager = $entityManagerFactory->getEntityManager();


        $connection = $entityManagerFactory->GetConnectionDb();
        $schemaManager = $connection->createSchemaManager();

        // $entities = $this->getNameAllClass();
        try {
            $databases = $schemaManager->listDatabases();

            if (!array_search(strtolower($_ENV['PROJECT_NAME']), $databases)) {
                $schemaManager->createDatabase($_ENV['PROJECT_NAME']);

                $entityManager = $entityManagerFactory->getEntityManager(true);

                $tool = new SchemaTool($entityManager);
                $metadataFactory = $entityManager->getMetadataFactory();
                $entities = $metadataFactory->getAllMetadata();
                $tool->createSchema($entities);
            }
        } catch (Exception $e) {
            echo "ixi";
        }
    }



    public function teste(Request $request, Response $response, $args)
    {
        try {
            try {
                $user = new UserRepository();
                $user = $user->Save(json_decode($request->getBody(), true));
                if ($user) {
                    $response->getBody()->write(json_encode("Usuário criado no banco"));
                    return $response;
                } else {
                    throw new Exception("erro", 404);
                }
            } catch (Exception $e) {
                $entityManagerFactory = new EntityManagerFactory();
                $entityManager = $entityManagerFactory->getEntityManager();
                $connection = $entityManagerFactory->GetConnectionDb();
                $schemaManager = $connection->createSchemaManager();

                $entities = $this->getNameAllClass();

                foreach ($entities as $entity) {
                    if ($schemaManager->tablesExist($entity)) {
                        $response->getBody()->write("tabelas ja existem no banco");
                        continue;
                    } else {
                        $tool = new SchemaTool($entityManager);
                        $classes = [
                            $entityManager->getClassMetadata((string) get_class(new User()))
                        ];
                        $tool->createSchema($classes);
                        $response->getBody()->write("tabela criada no banco de dados");
                        return $response;
                    }
                }
            }
        } catch (Exception $e) {
            $this->writeToLog($e->getMessage(), "URL - ERROR");
            return $response->getBody()->write("erro fudido");
        }
    }
}
