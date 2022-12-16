<?php

namespace Nbwdigital\BaseProject\Controller;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Nbwdigital\BaseProject\Infra\EntityManagerFactory;
use Doctrine\ORM\Tools\SchemaTool;
use Exception;
use Doctrine\ORM\Tools\SchemaValidator;



class StartProjectController
{
    public function StartProject(Request $request, Response $response, $args)
    {
        try {

            $entityManagerFactory = new EntityManagerFactory();
            $entityManager = $entityManagerFactory->getEntityManager();


            $tool = new SchemaTool($entityManager);
            $classes = [
                $entityManager->getClassMetadata("Nbwdigital\BaseProject\Entity\Teste"),
                $entityManager->getClassMetadata("Nbwdigital\BaseProject\Entity\Invoice")
            ];

            $validator = new SchemaValidator($entityManager);
            $errors = $validator->validateMapping();

            if (count($errors) > 0) {
                // Lots of errors!
                echo implode("\n\n", $errors);
            }

            $tool->createSchema($classes);

            $response->getBody()->write("oi");
            return $response;
        } catch (Exception $e) {
            var_dump($e);
        }
    }
}
