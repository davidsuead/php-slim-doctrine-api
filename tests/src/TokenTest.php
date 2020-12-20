<?php

namespace Tests;

use Tests\Tester;
use App\Entity\Token;

final class TokenTest extends Tester
{
    /**
     * Se o usuário existi, deve retornar um objeto User
     *
     * @return void
     */
    public function testGenerateToken() : void
    {
        $this->assertInstanceOf(
            Token::class,
            $this->container->tokenService->generateToken('admin')
        );
    }
}