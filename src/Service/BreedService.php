<?php

namespace App\Service;

use App\Entity\Breed;
use Httpful\Request;
use Httpful\Response;
use stdClass;

/**
 * Classe service que manipula os dados da entidade Breed
 * @author David Diniz
 * @since 1.0.0
 */
class BreedService extends ModelService
{
    /**
     * {@inheritDoc}
     */
    protected static $entityClass = Breed::class;

    /**
     * Busca em TheCatApi o breed pelo nome
     *
     * @param string $name
     * @return Response
     */
    public function getBreedByName(string $name) : Response
    {
        $url = 'https://api.thecatapi.com/v1/breeds/search?q=' . $this->container->utilService->antiInjection($name);
        return Request::get($url)
        ->addHeader('x-api-key: ', $this->container->environment['APP_CAT_API_KEY'])
        ->send();
    }

    /**
     * Tranforma o objeto breed em um array
     *
     * @param object $obj
     * @return array
     */
    public function toArray(object $obj) : array
    {
        $newParams = [];
        foreach($obj as $property => $value) {
            if (isset($obj->$property)) {
                if ($property == 'weight') {
                    $newParams['breed_weight_imperial'] = $obj->weight->imperial;
                    $newParams['breed_weight_metric'] = $obj->weight->imperial;
                } else {
                    $newParams['breed_' . $property] = $value;
                }
            }
        }
        return $newParams;
    }

    /**
     * Tranforma o array breed em um objeto
     *
     * @param array $params
     * @return object
     */
    public function toObject(array $params) : object
    {
        $obj = new stdClass();
        foreach($params as $key => $value) {
            if (isset($params[$key])) {
                $property = str_replace('breed_', '', $key);
                if ($property == 'weight_imperial' || $property == 'weight_metric') {
                    if (empty($obj->weight)) {
                        $obj->weight = new stdClass();
                    }
                    $property = str_replace('weight_', '', $property);
                    $obj->weight->$property = $value;
                } 
                else {
                    $obj->$property = $value;
                }

            }
        }
        return $obj;
    }

    /**
     * Salva no banco de dados o objeto
     *
     * @param object $obj
     * @return Breed
     */
    public function save(object $obj) : Breed
    {
        $params = $this->toArray($obj);
        
        if (!empty($params['breed_id'])) {
            /** @var Breed $breed */
            $breed = $this->getRepository()->findOneBy([
                'breedId' => $params['breed_id']
            ]);
        } 
        
        if (empty($breed)) {
            $breed = new Breed();
        }

        foreach ($params as $key => $value) {
            $method = 'set' . str_replace('_', '', ucwords($key, '_'));
            if (isset($value) && method_exists($breed, $method)) {
                $breed->$method($value);
            }
        }

        return $this->getRepository()->save($breed);
    }

    /**
     * Retorna um array de objetos Breed que foram encontrados no banco de dados
     *
     * @param string $name
     * @return array
     */
    public function getBreedsFromDb(string $name) : array
    {
        $rows = [
            'breeds' => []
        ];
        $result = $this->getRepository()->getBreedsByName($this->container, $name);
        if (!empty($result) && count($result)) {
            foreach ($result as $row) {
                $rows['breeds'][] = $this->toObject($row);
            }
        }
        
        return $rows;
    }

    /**
     * Salva todos os objetos Breeds obtidos de TheCatApi
     *
     * @param array $body
     * @return boolean
     */
    public function saveAll(array $body) : bool
    {
        if (!empty($body) && count($body)) {
            foreach ($body as $row) {
                $this->save($row);
            }
        }

        return true;
    }
}