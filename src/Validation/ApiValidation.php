<?php

namespace App\Validation;

use Exception;
use Slim\Http\Request;
use App\Entity\User;
use App\Entity\Token;

/**
 * Classe de validação para parâmetros de requisição em API Rest
 * @author David Diniz <diniz.david@gmail.com>
 * @since 1.0.0
 */
class ApiValidation extends Validation
{
    /**
     * Verifica se o token de acesso é válido
     *
     * @param Request $request
     * @return void
     * @throws Exception
     */
    protected function validateAuthorization(Request $request) : void
    {
        $headers = $request->getHeaders();
        $chave = $headers['HTTP_AUTHORIZATION'][0]; //chave de autorização de consulta
        $chave = explode(" ", $chave);
        
        if (strpos("Bearer", trim($chave[0])) === false) {
            $this->code = 401;
            throw new Exception('A autorização foi negada para esta solicitação');
        }
        
        if ($chave[1] != $this->container->environment->get('APP_TOKEN_API')) {
            $this->code = 401;
            throw new Exception('A autorização foi negada para esta solicitação'); 
        }
    }

    /**
     * Valida o parâmetro accessToken
     *
     * @param string $accessToken
     * @return Token
     * @throws Exception
     */
    protected function validateToken($accessToken)
    {
        /** @var Token $token */
        $token = $this->container->tokenService->getRepository()->findOneBy([
            'accessToken' => $accessToken
        ]);
        
        if(empty($token)) {
            throw new Exception('O Token do usuário não foi encontrado no banco de dados');
        }

        // if (time() > $token->getTempoExpiracao()) {
        //     throw new Exception('ACCESSTOKEN Expirado');
        // }

        return $token;
    }

    /**
     * Valida o User id (primary key)
     *
     * @param int $userId
     * @return User
     * @throws Exception
     */
    protected function validateUserId(int $userId) : User
    {
        /** @var User $usuario */
        $user = $this->container->userService->buscar($userId);
        
        if (empty($user)) {
            throw new Exception('ID do usuário não foi encontrado no banco de dados');
        }

        return $user;
    }

    /**
     * Valida o usuário
     *
     * @param string $username
     * @return User
     */
    protected function validateUsername(string $username) : User
    {
        $user = $this->container->userService->getUserByUsername($username);

        if (empty($user)) {
            throw new Exception('Usuário inválido.');
        }

        return $user;
    }

    /**
     * Valida a senha do usuário
     *
     * @param string $username
     * @param string $password
     * @return void
     * @throws Exception
     */
    protected function validatePassword(string $username, string $password) : void
    {
        if (!$this->container->userService->verifyPassword($username, $password)) {
            throw new Exception('Senha inválida.');
        }
    }
}