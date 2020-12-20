<?php

namespace App\Validation;

use Exception;
use Slim\Http\Request;

/**
 * Classe que define regras de validação do endpoint refresh-token
 * @author David Diniz <diniz.david@gmail.com>
 * @since 1.0.0
 */
class RefreshTokenValidation extends ApiValidation
{
    /**
     * {@inheritDoc}
     */
    public function attributeRules() 
    {
        return [
            ['notEmpty', ['refreshToken']],
            ['length', ['refreshToken'], ['max' => 500]],
        ];
    }

    /**
     * Validação personalizada
     *
     * @param Request $request
     * @return void
     */
    public function customValidate(Request $request) : void
    {
        try {
            $params = $request->getParams();
            $this->validateRefreshToken($params['refreshToken']);
            $refreshTokenDecoded = $this->container->tokenService->getRefreshTokenDecoded($params['refreshToken']);
            // echo $params['refreshToken'];
            // die;
            $this->validateUsername($refreshTokenDecoded->name);
        } catch (Exception $ex) {
            $this->container->validator->addError('error', $ex->getMessage());
        }
    }
}