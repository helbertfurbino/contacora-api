<?php


require __DIR__ . '/vendor/autoload.php';

use Cora\ApiCora;

$api = new ApiCora('certFile', 'privateKey', 'clientId');

echo 'Autoload funcionando!';


/*require __DIR__ . '/vendor/autoload.php';

use Cora\ApiCora;

$api = new ApiCora("asdfasdf", "asfdasdfa", "asfddasf"); // Tente instanciar a classe
echo 'Classe ApiCora foi carregada corretamente.';*/
