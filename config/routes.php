<?php

/**
 * Rotas APP
 */
$app->group('/', function () {    
    $this->get('', 'app.controller:index')->setName('app.home');
    $this->get('401', 'app.controller:error401')->setName('app.401');
    $this->get('403', 'app.controller:error403')->setName('app.403');
    $this->get('404', 'app.controller:error404')->setName('app.404');
    $this->get('4xx', 'app.controller:error4xx')->setName('app.4xx');
    $this->get('500', 'app.controller:error500')->setName('app.500');    
    $this->get('swagger', 'api.controller:swagger')->setName('api.swagger');
    $this->post('login', 'api.controller:login')->setName('api.login');
    $this->post('refresh-token', 'api.controller:refreshToken')->setName('api.refreshToken');
    
    $this->get('breeds', 'api.controller:getBreeds')->setName('api.getBreed');
});

