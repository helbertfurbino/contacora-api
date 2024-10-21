<?php

namespace Cora;

use Cora\Base\ApiCoraBase;
use Cora\DTO\DTOBoleto;
use Cora\Operacoes\ConsultarBoleto;
use Cora\Operacoes\CancelarBoleto;
use Cora\Operacoes\GerarBoleto;
use Cora\Operacoes\CriarWebHook;
use Cora\Operacoes\ExcluirWebHook;
use Cora\Operacoes\listarWebhook;

class ApiCora extends ApiCoraBase
{
	public function gerarBoleto(DTOBoleto $dtoBoleto, string $idempotencyKey)
	{
		$boleto = new GerarBoleto();

		return $boleto->gerar($this, $dtoBoleto, $idempotencyKey);
	}

	public function consultarBoleto($invoiceId)
	{
		$boleto = new ConsultarBoleto();

		return $boleto->consultar($this, $invoiceId);
	}

	public function cancelarBoleto($invoiceId)
	{
		$boleto = new CancelarBoleto();

		return $boleto->cancelar($this, $invoiceId);
	}

	public function criarWebHook($urlWebhook, $resource, $trigger)
	{
		$webhook = new CriarWebHook($this);
		return $webhook->criar($urlWebhook, $resource, $trigger, $this);
	}

	public function listarWebhook()
	{
		$webhook = new ListarWebHook();

		return $webhook->listar($this);
	}

	public function excluirWebhook($id)
	{
		$webhook = new ExcluirWebHook();

		return $webhook->excluir($this, $id);
	}
}
