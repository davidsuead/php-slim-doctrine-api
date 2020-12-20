<?php

namespace App\Validation;

use Exception;
use Slim\Http\Request;

/**
 * Classe que define regras de validação do endpoint breeds
 * @author David Diniz <diniz.david@gmail.com>
 * @since 1.0.0
 */
class BreedsValidation extends ApiValidation
{
    /**
     * {@inheritDoc}
     */
    public function attributeRules() 
    {
        return [
            ['notEmpty', ['name']],
            ['length', ['name'], ['max' => 20]],
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
            $accessToken = $request->getAttribute('jwt');
            $this->validateUsername($accessToken['name']);
        } catch (Exception $ex) {
            $this->container->validator->addError('error', $ex->getMessage());
        }
    }
}