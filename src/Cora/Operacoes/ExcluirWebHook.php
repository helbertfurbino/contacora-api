<?php

namespace Cora\Operacoes;

class ExcluirWebHook
{
    protected $apiCoraBase;

    public function excluir(ApiCoraBase $apiCoraBase, string $endpointId)
    {
        $this->apiCoraBase = $apiCoraBase;

        try {

            $client = $this->apiCoraBase->getClient();

            $headers = array_merge($this->apiCoraBase->getHeaders(), [
                'Authorization' => 'Bearer ' . $this->apiCoraBase->token,
            ]);

            $response = $client->request('DELETE', '/endpoints/' . $endpointId, [
                'headers' => $headers,
            ]);

            return $response->getBody()->getContents();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
