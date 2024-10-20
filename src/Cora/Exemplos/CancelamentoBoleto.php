<?php


namespace Cora\Exemplos;

use Cora\ApiCora;

$cora = new ApiCora('certFile', 'privateKey', 'clientId');

$cora->cancelarBoleto('invoiceId');
