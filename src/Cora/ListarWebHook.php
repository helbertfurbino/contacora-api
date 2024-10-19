<?php

namespace Cora;

class ListarWebHook
{
    protected $apiCoraBase;

    public function listar(ApiCoraBase $apiCoraBase)
    {
        $this->apiCoraBase = $apiCoraBase;

        try {

            $client = $this->apiCoraBase->getClient();

            $headers = array_merge($this->apiCoraBase->getHeaders(), [
                'Authorization' => 'Bearer ' . $this->apiCoraBase->token,
            ]);

            $response = $client->request('GET', '/endpoints/', [
                'headers' => $headers,
            ]);

            return $response->getBody()->getContents();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
