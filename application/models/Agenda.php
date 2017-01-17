<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Model {
	private $id;
	private $idpessoa;
	private $telefone;
	private $email;
	private $dataCadastro;

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


	public function setIdPessoa($idpessoa)
	{
		$this->idpessoa = $idpessoa;
	}
	public function getIdPessoa()
	{
		return $this->idpessoa;
	}

	public function setTelefone($telefone)
	{
		$this->telefone = $telefone;
	}
	public function getTelefone()
	{
		return $this->telefone;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}
	public function getEmail()
	{
		return $this->email;
	}

	public function setDataCadastro($dataCadastro)
	{
		$this->dataCadastro	= $dataCadastro;
	}
	public function getDataCadastro()
	{
		return $this->dataCadastro;
	}

	public function listarPorPessoa()
	{
		$this->db->where('id_pessoa', $this->idpessoa);
		$query = $this->db->get('agenda');
		return $query->row();
	}

	public function inserir()
	{
		$data['id_pessoa'] = $this->idpessoa;
		$data['email'] = $this->email;
		$data['telefone'] = $this->telefone;
		$data['data_cadastro'] = $this->dataCadastro;
		if($this->db->insert('agenda', $data))
		{
			$this->id = $this->db->insert_id();
			return true;
		}else
			return $this->db->_error_message();
	}


	public function atualizar()
	{
		$data['id_pessoa'] = $this->idpessoa;
		$data['email'] = $this->email;
		$data['telefone'] = $this->telefone;
		$data['data_cadastro'] = $this->dataCadastro;
		
		$this->db->where('id_agenda', $this->id);
		if($this->db->update('agenda', $data))
		{
			return true;
		}else
			return $this->db->_error_message();
	}

}
