<?php

namespace Nbwdigital\BaseProject\Controller;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Nbwdigital\BaseProject\Repository\ResourceRepository;
use Nbwdigital\BaseProject\Traits\Utils;


class ResourceController
{
    use Utils;

    public function GetAllResource(Request $request, Response $response, $args)
    {
        $roles = new ResourceRepository();

        $result =  $roles->GetAll();
        $resultJson = json_encode($result);
        if ($result) {
            $response->getBody()->write($resultJson);
            header('Content-type: application/json');
            return $response;
        } else {
            $response->getBody()->write("sem profissões cadastradas");
            return $response;
        }
    }

    public function SaveResource(Request $request, Response $response, $args)
    {
        $user = new ResourceRepository();
        $data = json_decode($request->getBody(), true);
        $result =  $user->Save($data);
        $resultJson = json_encode($result);
        if ($result) {
            $response->getBody()->write($resultJson);
            header('Content-type: application/json');
            return $response;
        } else {
            $response->getBody()->write("profissão não cadastrada");
            return $response;
        }
    }

    public function GetResource(Request $request, Response $response, $args)
    {
        $user = new ResourceRepository();
        $result =  $user->GetById($args['id']);
        $resultJson = json_encode($result);
        if ($result) {
            $response->getBody()->write($resultJson);
            header('Content-type: application/json');
            return $response;
        } else {
            $response->getBody()->write("usuario inexistente");
            return $response;
        }
    }

    public function DeleteResource(Request $request, Response $response, $args)
    {
        // $validateAuthentication = $this->GenerateJWT($request->getHeader());
        $user = new ResourceRepository();
        $result =  $user->Delete($args['id']);
        if ($result) {
            $response->getBody()->write("usuario deletado");
            return $response;
        } else {
            $response->getBody()->write("usuario não existe");
            return $response;
        }
    }

    public function UpdateResource(Request $request, Response $response, $args)
    {
        $user = new ResourceRepository();
        // $data = json_decode($request->getBody(), true);
        $result = $user->Update($args['id']);
        if ($result) {
            $response->getBody()->write("usuario criado");
            return $response;
        } else {
            $response->getBody()->write("usuario nÃ£o cadastado");
            return $response;
        }
    }
}
