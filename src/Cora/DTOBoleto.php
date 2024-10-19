<?php

namespace Cora;

class DTOBoleto
{
	private $nomeSacado;
	private $emailSacado;
	private $documentoSacado;
	private $tipoDocumentoSacado;
	private $ruaSacado;
	private $numeroSacado;
	private $bairroSacado;
	private $cidadeSacado;
	private $estadoSacado;
	private $complementoSacado;
	private $cepSacado;
	private $nomeServico;
	private $descricaoServico;
	private $valor;
	private $multa;
	private $juros;
	private $dataVencimento;

	/**
	 * Get the value of dataVencimento
	 */
	public function getDataVencimento()
	{
		return $this->dataVencimento;
	}

	/**
	 * Set the value of dataVencimento
	 *
	 * @return  self
	 */
	public function setDataVencimento($dataVencimento)
	{
		$this->dataVencimento = $dataVencimento;

		return $this;
	}

	/**
	 * Get the value of nomeSacado
	 */
	public function getNomeSacado()
	{
		return $this->nomeSacado;
	}

	/**
	 * Set the value of nomeSacado
	 *
	 * @return  self
	 */
	public function setNomeSacado($nomeSacado)
	{
		$this->nomeSacado = $nomeSacado;

		return $this;
	}

	/**
	 * Get the value of emailSacado
	 */
	public function getEmailSacado()
	{
		return $this->emailSacado;
	}

	/**
	 * Set the value of emailSacado
	 *
	 * @return  self
	 */
	public function setEmailSacado($emailSacado)
	{
		$this->emailSacado = $emailSacado;

		return $this;
	}

	/**
	 * Get the value of documentoSacado
	 */
	public function getDocumentoSacado()
	{
		return $this->documentoSacado;
	}

	/**
	 * Set the value of documentoSacado
	 *
	 * @return  self
	 */
	public function setDocumentoSacado($documentoSacado)
	{
		if (!$documentoSacado)
			throw new Exception("Documento é obrigatório");

		$this->documentoSacado = $documentoSacado;

		return $this;
	}

	/**
	 * Get the value of tipoDocumentoSacado
	 */
	public function getTipoDocumentoSacado()
	{
		return $this->tipoDocumentoSacado;
	}

	/**
	 * Set the value of tipoDocumentoSacado
	 *
	 * @return  self
	 */
	public function setTipoDocumentoSacado($tipoDocumentoSacado)
	{
		$this->tipoDocumentoSacado = $tipoDocumentoSacado;

		return $this;
	}

	/**
	 * Get the value of ruaSacado
	 */
	public function getRuaSacado()
	{
		return $this->ruaSacado;
	}

	/**
	 * Set the value of ruaSacado
	 *
	 * @return  self
	 */
	public function setRuaSacado($ruaSacado)
	{
		$this->ruaSacado = $ruaSacado;

		return $this;
	}

	/**
	 * Get the value of numeroSacado
	 */
	public function getNumeroSacado()
	{
		return $this->numeroSacado;
	}

	/**
	 * Set the value of numeroSacado
	 *
	 * @return  self
	 */
	public function setNumeroSacado($numeroSacado)
	{
		$this->numeroSacado = $numeroSacado;

		return $this;
	}

	/**
	 * Get the value of bairroSacado
	 */
	public function getBairroSacado()
	{
		return $this->bairroSacado;
	}

	/**
	 * Set the value of bairroSacado
	 *
	 * @return  self
	 */
	public function setBairroSacado($bairroSacado)
	{
		$this->bairroSacado = $bairroSacado;

		return $this;
	}

	/**
	 * Get the value of cidadeSacado
	 */
	public function getCidadeSacado()
	{
		return $this->cidadeSacado;
	}

	/**
	 * Set the value of cidadeSacado
	 *
	 * @return  self
	 */
	public function setCidadeSacado($cidadeSacado)
	{
		$this->cidadeSacado = $cidadeSacado;

		return $this;
	}

	/**
	 * Get the value of estadoSacado
	 */
	public function getEstadoSacado()
	{
		return $this->estadoSacado;
	}

	/**
	 * Set the value of estadoSacado
	 *
	 * @return  self
	 */
	public function setEstadoSacado($estadoSacado)
	{
		$this->estadoSacado = $estadoSacado;

		return $this;
	}

	/**
	 * Get the value of complementoSacado
	 */
	public function getComplementoSacado()
	{
		return $this->complementoSacado;
	}

	/**
	 * Set the value of complementoSacado
	 *
	 * @return  self
	 */
	public function setComplementoSacado($complementoSacado)
	{
		$this->complementoSacado = $complementoSacado;

		return $this;
	}

	/**
	 * Get the value of cepSacado
	 */
	public function getCepSacado()
	{
		return $this->cepSacado;
	}

	/**
	 * Set the value of cepSacado
	 *
	 * @return  self
	 */
	public function setCepSacado($cepSacado)
	{
		$this->cepSacado = $cepSacado;

		return $this;
	}

	/**
	 * Get the value of nomeServico
	 */
	public function getNomeServico()
	{
		return $this->nomeServico;
	}

	/**
	 * Set the value of nomeServico
	 *
	 * @return  self
	 */
	public function setNomeServico($nomeServico)
	{
		$this->nomeServico = $nomeServico;

		return $this;
	}

	/**
	 * Get the value of descricaoServico
	 */
	public function getDescricaoServico()
	{
		return $this->descricaoServico;
	}

	/**
	 * Set the value of descricaoServico
	 *
	 * @return  self
	 */
	public function setDescricaoServico($descricaoServico)
	{
		$this->descricaoServico = $descricaoServico;

		return $this;
	}

	/**
	 * Get the value of valor
	 */
	public function getValor()
	{
		return preg_replace('/[^0-9]/', '', $this->valor);
	}

	/**
	 * Set the value of valor
	 *
	 * @return  self
	 */
	public function setValor($valor)
	{
		$this->valor = $valor;

		return $this;
	}

	/**
	 * Get the value of multa
	 */
	public function getMulta()
	{
		return preg_replace('/[^0-9]/', '', number_format(($this->valor * $this->multa / 100), 2));
	}

	/**
	 * Set the value of multa
	 *
	 * @return  self
	 */
	public function setMulta($multa)
	{
		$this->multa = $multa;

		return $this;
	}

	/**
	 * Get the value of juros
	 */
	public function getJuros()
	{
		$juros =  $this->juros;

		return $juros;
	}

	/**
	 * Set the value of juros
	 *
	 * @return  self
	 */
	public function setJuros($juros)
	{
		$this->juros = $juros;

		return $this;
	}
}
