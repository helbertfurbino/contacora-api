<?php

namespace Cora;

class ApiCora extends ApiCoraBase
{
	public function gerarBoleto(DTOBoleto $dtoBoleto)
	{
		$boleto = new GerarBoleto();

		return $boleto->gerar($this, $dtoBoleto);
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
		$webhook = new excluirWebhook();

		return $webhook->excluir($this, $id);
	}
}
