<?php

namespace Cora;

namespace Cora;

class GerarBoleto
{
	protected DTOBoleto $dtoBoleto;
	protected ApiCoraBase $apiCoraBase;


	public function gerar(ApiCoraBase $apiCoraBase, DTOBoleto $dtoBoleto)
	{
		$this->dtoBoleto = $dtoBoleto;

		$this->apiCoraBase = $apiCoraBase;

		try {
			$client = $this->apiCoraBase->getClient();

			$arrayJson = [
				'headers' => $apiCoraBase->getHeaders(),
				'json' => $this->jsonBoleto()
			];

			$response = $client->request('POST', '/v2/invoices/', $arrayJson);

			return $response->getBody()->getContents();
		} catch (\Throwable $th) {
			throw $th;
		}
	}

	private function jsonBoleto()
	{
		return [
			'code' => $this->apiCoraBase->clientId,
			'customer' => $this->cliente(),
			'services' => $this->servico(),
			'payment_terms' => $this->valores(),
			'payment_forms' => ['BANK_SLIP', 'PIX']
		];
	}

	private function cliente()
	{

		return  [
			'name' => $this->dtoBoleto->getNomeSacado(),
			'email' => $this->dtoBoleto->getEmailSacado(),
			'document' => [
				'identity' => $this->dtoBoleto->getDocumentoSacado(),
				'type' => $this->dtoBoleto->getTipoDocumentoSacado()
			],
			'address' => [
				'street' => $this->dtoBoleto->getRuaSacado(),
				'number' => $this->dtoBoleto->getNumeroSacado(),
				'district' => $this->dtoBoleto->getCidadeSacado(),
				'city' => $this->dtoBoleto->getCidadeSacado(),
				'state' => $this->dtoBoleto->getEstadoSacado(),
				'complement' => $this->dtoBoleto->getComplementoSacado(),
				'zip_code' => $this->dtoBoleto->getCepSacado()
			]
		];
	}

	private function servico()
	{
		return [
			[
				'name' => $this->dtoBoleto->getNomeServico(),
				'description' => $this->dtoBoleto->getDescricaoServico(),
				'amount' => $this->dtoBoleto->getValor(),
			]
		];
	}

	private function valores()
	{
		return [
			'due_date' => $this->dtoBoleto->getDataVencimento(),
			'fine' => [
				'amount' => $this->dtoBoleto->getMulta(),
			],
			'interest' => [
				'rate' => $this->dtoBoleto->getJuros(),
			]
		];
	}
}
