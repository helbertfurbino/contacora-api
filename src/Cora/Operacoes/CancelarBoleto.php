<?php

namespace Cora\Operacoes;

class CancelarBoleto
{
	protected $apiCoraBase;


	public function cancelar(ApiCoraBase $apiCoraBase, $invoice_id)
	{
		try {

			$client = $apiCoraBase->getClient();

			$url = "/v2/invoices/{$invoice_id}";

			$options = [
				'headers' => $apiCoraBase->getHeaders(),
			];

			$response = $client->request('DELETE', $url, $options);

			return $response->getBody()->getContents();
		} catch (\Throwable $th) {
			throw $th;
		}
	}
}
