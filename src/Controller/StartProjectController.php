<?php

namespace Nbwdigital\BaseProject\Controller;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Nbwdigital\BaseProject\Entity\User;
use Doctrine\ORM\Tools\SchemaTool;
use Exception;
use Doctrine\ORM\Tools\SchemaValidator;
use Nbwdigital\BaseProject\Infra\EntityManagerFactory;
use Nbwdigital\BaseProject\Repository\CursoRepository;
use Nbwdigital\BaseProject\Traits\Utils;

class StartProjectController
{

    use Utils;

    public function StartProject(Request $request, Response $response, $args)
    {
        try {

            $curso = new CursoRepository();
            $cursos = $curso->getAll();
            $response->getBody()->write(json_encode($cursos));
            return $response;

        } catch (Exception $e) {

            try {
                $class_name = get_class(new User());

                $reflection_class = new \ReflectionClass($class_name);

                $entityManagerFactory = new EntityManagerFactory();
                $entityManager = $entityManagerFactory->getEntityManager();


                $tool = new SchemaTool($entityManager);
                $classes = [
                    $entityManager->getClassMetadata($reflection_class->name),
                ];

                // $validator = new SchemaValidator($entityManager);
                // $errors = $validator->validateMapping();

                // if (count($errors) > 0) {
                //     // Lots of errors!
                //     echo implode("\n\n", $errors);
                // }

                $tool->createSchema($classes);
                $response->getBody()->write("tabela criada no banco de dados");
                return $response;
            } catch (Exception $e2) {
                $this->writeToLog($e->getMessage(), "URL - ERROR");
                return $response->getBody()->write("erro fudido");
            }
        }
    }
}
