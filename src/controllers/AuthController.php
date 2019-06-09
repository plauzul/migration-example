<?php

namespace src\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Respect\Validation\Validator;
use src\model\UserModel;
use Firebase\JWT\JWT;

class AuthController extends BaseController
{

    protected function jwt($user)
    {
        $payload = [
            'iss' => "ws-jwt",
            'sub' => $user->id_user,
            'iat' => time(),
            'exp' => time() + 60*60
        ];
        return JWT::encode($payload, getenv('JWT_SECRET'));
    }

    public function login(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $params = $request->getParsedBody();

        $validator = $this->container->validator->validate($request, [
            'email' => Validator::email(),
            'password' => Validator::notBlank()
        ]);

        if(!$validator->isValid()) {
            return $response->withJson(['message' => 'Um ou mais parâmetros não informados.'])->withStatus(409);
        }

        $mUser = new UserModel();
        $rUser = $mUser->fetchRow(['email = ?' => $params['email']]);

        if(!$rUser) {
            return $response->withJson(['message' => 'Email informado esta incorreto.'])->withStatus(409);
        } else if(!password_verify($params['password'], $rUser->password)) {
            return $response->withJson(['message' => 'Senha informada esta incorreta.'])->withStatus(409);
        }

        return $response->withJson(['token' => $this->jwt($rUser)]);
    }
}