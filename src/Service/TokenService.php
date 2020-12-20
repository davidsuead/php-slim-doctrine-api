<?php

namespace App\Service;

use DateTime;
use App\Entity\Token;
use App\Entity\User;
use Firebase\JWT\JWT;

/**
 * Classe service que manipula os dados da entidade Token
 * @author David Diniz
 * @since 1.0.0
 */
class TokenService extends ModelService
{
    /**
     * {@inheritDoc}
     */
    protected static $entityClass = Token::class;

    /**
     * Salva no banco de dados um registro da entidade Token
     *
     * @param string $accessToken
     * @param string $refreshToken
     * @param integer $expireAt
     * @param boolean $active
     * @param integer $userId
     * @return Token
     */
    public function save(string $accessToken, string $refreshToken, DateTime $expireAt, bool $active, int $userId) : Token
    {
        $token = new Token();
        $token->setToken($accessToken)
            ->setRefreshToken($refreshToken)
            ->setExpiredAt($expireAt)
            ->setActive($active)
            ->setUser($this->container->userService->getReference($userId));
        return $this->getRepository()->save($token);
    }

    /**
     * Retorna a entidade User pelo username
     *
     * @param string $username
     * @return Token
     */
    public function generateToken(string $username) : Token
    {
        /** @var User $user */
        $user = $this->container->userService->getUserByUsername($username);

        $expireDate = new DateTime();                
        $accessTokenPayload = [
            'sub' => $user->getId(),
            'name' => $user->getUsername(),
            'exp' => $expireDate->getTimestamp()
        ];
        $accessToken = JWT::encode($accessTokenPayload, $this->container->environment['JWT_SECRET_KEY']);

        $refreshTokenPayload = [
            'name' => $user->getUsername(),
            'ramdom' => uniqid()
        ];
        $refreshToken = JWT::encode($refreshTokenPayload, $this->container->environment['JWT_SECRET_KEY']);

        return $this->save($accessToken, $refreshToken, $expireDate, true, $user->getId());
    }
}