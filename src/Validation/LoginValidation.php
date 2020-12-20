<?php

namespace App\Validation;

use Exception;
use Slim\Http\Request;
use Respect\Validation\Validator as V;

/**
 * Classe que define regras de validação do endpoint login
 * @author David Diniz <diniz.david@gmail.com>
 * @since 1.0.0
 */
class LoginValidation extends ApiValidation
{
    /**
     * {@inheritDoc}
     */
    public function attributeRules() 
    {
        return [
            ['notEmpty', ['Authorization','username','password']],
            ['length', ['Authorization'], ['max' => 150]],
            ['length', ['username'], ['max' => 50]],
            ['length', ['password'], ['max' => 20]]
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
            $this->validateAuthorization($request);
            
            $params = $request->getParams();
            $this->validateUsername($params['username']);
            $this->validatePassword($params['username'], $params['password']);
        } catch (Exception $ex) {
            $this->container->validator->addError('error', $ex->getMessage());
        }
    }
}