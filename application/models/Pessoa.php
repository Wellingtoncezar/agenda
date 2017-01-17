<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa extends CI_Model {
	private $id;
	private $nome;
	private $endereco;
	private $agenda;

	public function __construct()
	{
        parent::__construct();
	}

	public function setId($id)
	{
		$this->id = $id;
	}
	public function getId()
	{
		return $this->id;
	}
	public function setNome($nome)
	{
		$this->nome = $nome;
	}
	public function getNome()
	{
		return $this->nome;
	}

	public function setEndereco($endereco)
	{
		$this->endereco = $endereco;
	}
	public function getEndereco()
	{
		return $this->endereco;
	}

	public function setAgenda($agenda)
	{
		$this->agenda = $agenda;
	}

	public function getAgenda()
	{
		$this->agenda;
	}


	public function listar()
	{
		$query = $this->db->get('pessoa');
		return $query->result();
	}

	public function consultar()
	{
		$this->db->where('id_pessoa', $this->id);
		$query = $this->db->get('pessoa');
		return $query->row();
	}


	public function inserir()
	{
		$data['nome_pessoa'] = $this->nome;
		$data['endereco'] = $this->endereco;

		if($this->db->insert('pessoa', $data))
		{
			$this->id = $this->db->insert_id();

			$this->agenda->setIdPessoa($this->id);
			$this->agenda->inserir();
			return true;
		}else
			return $this->db->_error_message();
	}

	public function atualizar()
	{
		$data['nome_pessoa'] = $this->nome;
		$data['endereco'] = $this->endereco;
		
		$this->db->where('id_pessoa', $this->id);
		$updatePessoa = $this->db->update('pessoa', $data);
		$updateAgenda = $this->agenda->atualizar();

		if($updatePessoa || $updateAgenda)
		{
			return true;
		}else
			return $this->db->_error_message();
	}


	public function excluir()
	{
		$this->db->where('id_pessoa', $this->id);
		if($this->db->delete('pessoa'))
		{
			return true;
		}else
			return $this->db->_error_message();
	}
	


}
