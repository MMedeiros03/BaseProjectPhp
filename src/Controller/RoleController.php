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
            $response->getBody()->write("sem profiss�es cadastradas");
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
            $response->getBody()->write("profiss�o n�o cadastrada");
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

    // public function DeleteUser(Request $request, Response $response, $args)
    // {
    //     // $validateAuthentication = $this->GenerateJWT($request->getHeader());
    //     $user = new UserRepository();
    //     $result =  $user->Delete($args['id']);
    //     if ($result) {
    //         $response->getBody()->write("usuario deletado");
    //         return $response;
    //     } else {
    //         $response->getBody()->write("usuario não existe");
    //         return $response;
    //     }
    // }

    // public function CreateUser(Request $request, Response $response, $args)
    // {
    //     $user = new UserRepository();
    //     $data = json_decode($request->getBody(), true);
    //     $result =  $user->Add($data);

    //     if ($result) {
    //         $response->getBody()->write("usuario criado");
    //         return $response;
    //     } else {
    //         $response->getBody()->write("usuario não cadastado");
    //         return $response;
    //     }
    // }
}
