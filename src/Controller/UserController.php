<?php

namespace Nbwdigital\BaseProject\Controller;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Nbwdigital\BaseProject\Repository\UserRepository;
use Nbwdigital\BaseProject\Traits\Utils;


class UserController
{
    use Utils;

    public function GetAllUsers(Request $request, Response $response, $args)
    {
        $user = new UserRepository();

        $result =  $user->GetAll();
        $resultJson = json_encode($result);
        if ($result) {
            $response->getBody()->write($resultJson);
            header('Content-type: application/json');
            return $response;
        } else {
            $response->getBody()->write("sem usuários cadastrados");
            return $response;
        }
    }

    public function SaveUser(Request $request, Response $response, $args)
    {
        $user = new UserRepository();

        $result =  $user->Save();
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

    public function GetUser(Request $request, Response $response, $args)
    {
        $user = new UserRepository();
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

    public function DeleteUser(Request $request, Response $response, $args)
    {
        // $validateAuthentication = $this->GenerateJWT($request->getHeader());
        $user = new UserRepository();
        $result =  $user->Delete($args['id']);
        if ($result) {
            $response->getBody()->write("usuario deletado");
            return $response;
        } else {
            $response->getBody()->write("usuario não existe");
            return $response;
        }
    }

    public function UpdateUser(Request $request, Response $response, $args)
    {
        $user = new UserRepository();
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
