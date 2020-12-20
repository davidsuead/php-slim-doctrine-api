<?php

namespace Tests;

use Tests\Tester;
use App\Entity\User;

final class UserTest extends Tester
{
    /**
     * Se o usuário existi, deve retornar um objeto User
     *
     * @return void
     */
    public function testGetUserByUsername() : void
    {
        $this->assertInstanceOf(
            User::class,
            $this->container->userService->getUserByUsername('admin')
        );
    }

    /**
     * Se o usuário e senha existirem, deve retornar true
     *
     * @return void
     */
    public function testVerifyPassword() : void
    {
        $this->assertTrue($this->container->userService->verifyPassword('admin', '@#$RF@!718'));
    }
}