<?php

namespace Cora\Operacoes;

class ConsultarBoleto
{
	protected $apiCoraBase;

	public function consultar(ApiCoraBase $apiCoraBase, $invoice_id)
	{
		try {

			$client = $apiCoraBase->getClient();

			$url = "/v2/invoices/{$invoice_id}";

			$options = [
				'headers' => $apiCoraBase->getHeaders(),
			];

			$response = $client->request('GET', $url, $options);

			return $response->getBody()->getContents();
		} catch (\Throwable $th) {
			throw $th;
		}
	}
}
