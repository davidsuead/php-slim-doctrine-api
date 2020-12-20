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
     * Valida o parâmetro accessToken
     *
     * @param string $accessToken
     * @return Token
     * @throws Exception
     */
    protected function validateAccessToken($accessToken) : Token
    {
        /** @var Token $token */
        $token = $this->container->tokenService->getTokenByAccessToken($accessToken);
        
        if (empty($token)) {
            throw new Exception('Access token inválido');
        }

        if (time() > $token->getExpiredAt()->getTimestamp()) {
            throw new Exception('Access token expirado');
        }

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

    /**
     * Valida o refresh token
     *
     * @param string $refreshToken
     * @return void
     */
    protected function validateRefreshToken(string $refreshToken) : void
    {
        if (!$this->container->tokenService->verifyRefreshToken($refreshToken)) {
            throw new Exception('Refresh token inválido.');
        }
    }
}