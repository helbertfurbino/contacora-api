<?php


namespace Cora\Exemplos;

use Cora\ApiCora;
use Cora\DTO\DTOBoleto;
use Illuminate\Support\Str;

$cora = new ApiCora('certFile', 'privateKey', 'clientId');

$idempotencyKey = (string) Str::uuid();

$dtoBoleto = new DTOBoleto();

//Cliente
$dtoBoleto->setNomeSacado("John Doe");
$dtoBoleto->setEmailSacado("johndoe@example.com");
$dtoBoleto->setDocumentoSacado("12345678901");
$dtoBoleto->setTipoDocumentoSacado("CPF");
$dtoBoleto->setRuaSacado("Rua Exemplo");
$dtoBoleto->setNumeroSacado("12345");
$dtoBoleto->setCidadeSacado("Cidade Exemplo");
$dtoBoleto->setEstadoSacado("EX");
$dtoBoleto->setComplementoSacado("Apt 101");
$dtoBoleto->setCepSacado("12345-678");

//Serviço
$dtoBoleto->setNomeServico("Serviço de Exemplo");
$dtoBoleto->setDescricaoServico("Descrição do serviço exemplo");
$dtoBoleto->setValor(150.50);
$dtoBoleto->setDataVencimento("2024-12-31");

//Multa e Mora
$dtoBoleto->setMulta(2.00); // Multa fictícia de 2%
$dtoBoleto->setJuros(0.5);  // Juros fictícios de 0.5%

$cora->gerarBoleto($dtoBoleto, $idempotencyKey);
