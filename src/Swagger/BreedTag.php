<?php

namespace App\Swagger;

/**
 * Classe que define a documentação da tag Breeds
 * @author David Diniz <diniz.david@gmail.com>
 * @since 1.0.0
 */
class BreedTag extends AbstractTag
{
    /**
     * Define documentação do endpoint getBreeds
     *
     * @return void
     */
    private function setBreeds()
    {
        $pathName = "/breeds";

        $path = new \stdClass();
        $path->get = new \stdClass();
        $path->get->tags = ["{$this->tag['name']}"];
        $path->get->summary = "Get a list of breeds by name";
        $path->get->description = "Search Breeds by using part of its name";
        $path->get->operationId = "getBreeds";
        $path->get->produces = ["application/json"];
        $this->swagger->paths[$pathName] = $path;

        $this->setParameters($pathName, [
            [
                'name' => 'name',
                'description' => 'Breed name',
            ]
            ], false);

        // HTTP Response (200) Success
        $arrResponse = [
            'description' => $this->getResponseDesc(200),
            'schema' => [
                '$ref' => "#/definitions/retBreedList200"
            ],
        ];
        $definitions = [
            'retBreedList200' => [
                'type' => 'object',
                'properties' => [
                    'usuarios' => [
                        'type' => 'array',
                        'items' => [
                            '$ref' => '#/definitions/breedObject'
                        ]
                    ]
                ]
            ],
            'breedObject' => [
                'type' => 'object',
                'properties' => [
                    'adaptability' => ['type' => 'integer'],
                    'affection_level' => ['type' => 'integer'],
                    'alt_names' => ['type' => 'string'],
                    'cfa_url' => ['type' => 'string'],
                    'child_friendly' => ['type' => 'integer'],
                    'country_code' => ['type' => 'string'],
                    'country_codes' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'dog_friendly' => ['type' => 'integer'],
                    'energy_level' => ['type' => 'integer'],
                    'experimental' => ['type' => 'integer'],
                    'grooming' => ['type' => 'integer'],
                    'hairless' => ['type' => 'integer'],
                    'health_issues' => ['type' => 'integer'],
                    'hypoallergenic' => ['type' => 'integer'],
                    'id' => ['type' => 'string'],
                    'indoor' => ['type' => 'integer'],
                    'intelligence' => ['type' => 'integer'],
                    'lap' => ['type' => 'integer'],
                    'life_span' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'natural' => ['type' => 'integer'],
                    'origin' => ['type' => 'string'],
                    'rare' => ['type' => 'integer'],
                    'reference_image_id' => ['type' => 'string'],
                    'rex' => ['type' => 'integer'],
                    'shedding_level' => ['type' => 'integer'],
                    'short_legs' => ['type' => 'integer'],
                    'social_needs' => ['type' => 'integer'],
                    'stranger_friendly' => ['type' => 'integer'],
                    'suppressed_tail' => ['type' => 'integer'],
                    'temperament' => ['type' => 'string'],
                    'vcahospitals_url' => ['type' => 'string'],
                    'vetstreet_url' => ['type' => 'string'],
                    'vocalisation' => ['type' => 'integer'],
                    'wikipedia_url' => ['type' => 'string'],
                    'weight' => [
                        'type' => 'object',
                        'properties' => [
                            'imperial' => ['type' => 'string'],
                            'metric' => ['type' => 'string'],
                        ]
                    ],
                ]
            ]
        ];
        $this->setResponse($pathName, 200, $arrResponse, $definitions);

        /**
         * HTTP Response (400) Bad Request
         * HTTP Response (401) Unauthorized
         * HTTP Response (500) Internal Server Error
         */
        $this->setManyDefaultResponse($pathName, [400,401,500]);
    }

    /**
     * Define todas as documentações de endpoint da tag USUARIOS
     *
     * @return void
     */
    public function setRoutes()
    {
        $this->setBreeds();
    }
}