<?php

namespace Cora;

class CriarWebHook
{
    protected $apiCoraBase;

    public function criar($urlWebhook, $resource, $trigger, ApiCoraBase $apiCoraBase)
    {
        $this->apiCoraBase = $apiCoraBase;

        try {

            $client = $this->apiCoraBase->getClient();

            $payload = [
                'url' => $urlWebhook,
                'resource' => $resource,
                'trigger' => $trigger
            ];

            $headers = array_merge($this->apiCoraBase->getHeaders(), [
                'Authorization' => 'Bearer ' . $this->apiCoraBase->token,
            ]);

            $response = $client->request('POST', '/endpoints/', [
                'headers' => $headers,
                'json' => $payload,
            ]);

            return $response->getBody()->getContents();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
