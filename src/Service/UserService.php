<?php

namespace App\Service;

use App\Entity\User;

/**
 * Classe service que manipula os dados da entidade User
 * @author David Diniz
 * @since 1.0.0
 */
class UserService extends ModelService
{
    /**
     * {@inheritDoc}
     */
    protected static $entityClass = User::class;

    /**
     * Retorna a entidade User pelo username
     *
     * @param string $username
     * @return User|null
     */
    public function getUserByUsername(string $username) : ?User
    {
        return $this->getRepository()->findOneBy([
            'username' => $username
        ]);
    }

    /**
     * Valida a senha do usuário
     *
     * @param string $username
     * @param string $password
     * @return boolean
     */
    public function verifyPassword(string $username, string $password) : bool
    {
        /** @var User $user */
        $user = $this->getUserByUsername($username);
        return !empty($user) && password_verify($password, $user->getPassword());
    }
}