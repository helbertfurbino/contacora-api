# contacora-api

API com funções de boleto para a conta digital PJ Cora

https://www.cora.com.br/conta-pj-digital

## Desenvolvimento necessário

Aceitamos PR que venham a incluir mais abstrações como pagamentos, QRCODE PIX, dentre outros.

## Endpoints disponíveis

Geração de boletos (invoices)

Cancelamento de boletos

Consulta detalhada de boletos

Criação de Webhook para notificações

Exclusão de Webhook

Listagem de Webhook

## Instalação

composer require helbertfurbino/contacora-api

## Construtor

$certFile:

Caminho para o arquivo de certificado (SSL) que será utilizado na comunicação segura com a API da Cora. Este arquivo é essencial para autenticação mútua entre o cliente e o servidor.

$privateKey:

Caminho para o arquivo contendo a chave privada correspondente ao certificado utilizado. A chave privada é usada para assinar a comunicação e garantir a segurança na transmissão de dados entre o cliente e a Cora.

$clientId:

Identificador único fornecido pelo banco Cora para cada cliente registrado no sistema. Este ID é utilizado durante o processo de autenticação para obter o token de acesso necessário para a interação com a API.

$keyCache (Opcional):

Chave de cache personalizada para armazenar o token de autenticação gerado após o login. Caso não seja fornecida, a chave padrão utilizada será cora_api_token. O uso do cache ajuda a evitar a necessidade de solicitar um novo token a cada requisição.

     $cora = new ApiCora($certFile, $privateKey, $this->conta->client_id, $keyCache);

## Exemplo Criação de Boleto

        $dtoBoleto = new DTOBoleto();

Cliente

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

Criação do Boleto

        $cora->gerarBoleto($dtoBoleto);
