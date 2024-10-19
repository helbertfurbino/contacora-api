<?php

namespace Cora;

use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class ApiCoraBase
{
	public $token;
	public $clientId;
	protected $certFile;
	protected $privateKey;
	protected $cacheKey;

	const URL_BASE_CORA = 'https://matls-clients.api.cora.com.br/';
	const TOKEN_GRANT_TYPE = 'client_credentials';
	const DEFAULT_CACHE_KEY = 'cora_api_token';

	public function __construct($certFile, $privateKey, $clientId, $cacheKey = null)
	{
		if (empty($certFile) || empty($privateKey) || empty($clientId)) {
			throw new \InvalidArgumentException('CertFile, PrivateKey e ClientId são obrigatórios.');
		}

		$this->certFile = $certFile;
		$this->privateKey = $privateKey;
		$this->clientId = $clientId;
		$this->cacheKey = $cacheKey ?: self::DEFAULT_CACHE_KEY;

		$this->token = $this->getCachedToken();
	}

	private function getCachedToken()
	{
		if (Cache::has($this->cacheKey)) {
			return Cache::get($this->cacheKey);
		}
		return $this->fetchNewToken();
	}

	private function fetchNewToken()
	{
		try {
			$url = self::URL_BASE_CORA . "token";
			$ch = curl_init($url);

			curl_setopt($ch, CURLOPT_SSLKEY, $this->privateKey);
			curl_setopt($ch, CURLOPT_SSLCERT, $this->certFile);
			curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/x-www-form-urlencoded"]);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
				'grant_type' => self::TOKEN_GRANT_TYPE,
				'client_id' => $this->clientId
			]));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$response = curl_exec($ch);
			curl_close($ch);

			if ($response === false) {
				$error = curl_error($ch);
				throw new \RuntimeException('Falha ao comunicar com a API Cora: ' . $error);
			}

			$data = json_decode($response, true);
			if (json_last_error() !== JSON_ERROR_NONE) {
				throw new \RuntimeException('Erro ao decodificar a resposta da API.');
			}

			if (isset($data['access_token'])) {
				$this->token = $data['access_token'];
				$expiresInSeconds = $data['expires_in'] ?? 3600;
				Cache::put($this->cacheKey, $this->token, now()->addSeconds($expiresInSeconds));

				return $this->token;
			} else {
				throw new \RuntimeException('Erro ao obter o token de acesso: ' . json_encode($data));
			}
		} catch (\Throwable $th) {
			throw new \RuntimeException('Erro ao obter token de acesso: ' . $th->getMessage());
		}
	}

	public function getClient()
	{
		return new Client([
			'base_uri' => self::URL_BASE_CORA,
			'cert' => $this->certFile,
			'ssl_key' => $this->privateKey,
			'headers' => $this->getHeaders(),
		]);
	}

	public function getHeaders()
	{
		if (!$this->token) {
			throw new \RuntimeException('Token não encontrado. Impossível gerar headers de autorização.');
		}

		return [
			'Idempotency-Key' => (string) Str::uuid(),
			'Authorization' => 'Bearer ' . $this->token,
			'Content-Type' => 'application/json',
		];
	}
}
