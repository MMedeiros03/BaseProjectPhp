<?php

namespace Nbwdigital\BaseProject\Controller;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Nbwdigital\BaseProject\Repository\RoleRepository;
use Nbwdigital\BaseProject\Traits\Utils;


class RoleController
{
    use Utils;

    public function GetAllRoles(Request $request, Response $response, $args)
    {
        $roles = new RoleRepository();

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

    public function SaveRole(Request $request, Response $response, $args)
    {
        $user = new RoleRepository();

        $result =  $user->Save();
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

    public function GetRole(Request $request, Response $response, $args)
    {
        $user = new RoleRepository();
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

    public function DeleteRole(Request $request, Response $response, $args)
    {
        // $validateAuthentication = $this->GenerateJWT($request->getHeader());
        $user = new RoleRepository();
        $result =  $user->Delete($args['id']);
        if ($result) {
            $response->getBody()->write("usuario deletado");
            return $response;
        } else {
            $response->getBody()->write("usuario não existe");
            return $response;
        }
    }

    public function UpdateRole(Request $request, Response $response, $args)
    {
        $user = new RoleRepository();
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
