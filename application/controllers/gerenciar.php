<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gerenciar extends CI_Controller {

	public function index()
	{	
		$this->load->model('Pessoa');
		$pessoas = $this->Pessoa->listar();

		$lista = Array();

		foreach($pessoas as $p)
		{
			$this->load->model('Agenda');
			$this->Agenda->setIdPessoa($p->id_pessoa);
			$agenda = $this->Agenda->listarPorPessoa();

			$ag = Array(
				'pessoa' => $p,
				'agenda' => $agenda
			);
			$lista[] = $ag;
		}

		$data['lista'] = $lista;
		$this->load->view('home', $data);
	}

	public function cadastrar()
	{
		$this->load->view('cadastrar');
	}

	public function editar()
	{
		$id_pessoa = $this->uri->segment(3);
		$this->load->model('Pessoa');
		$this->Pessoa->setId($id_pessoa);
		$pessoa = $this->Pessoa->consultar();

		$this->load->model('Agenda');
		$this->Agenda->setIdPessoa($id_pessoa);
		$agenda = $this->Agenda->listarPorPessoa();

		$data['pessoa'] = $pessoa;
		$data['agenda'] = $agenda;

		$this->load->view('editar', $data);
	}

	
	public function inserir()
	{
		$nome = isset($_POST['nome']) ? filter_var($_POST['nome']) : '';
		$email = isset($_POST['email']) ? filter_var($_POST['email']) : '';
		$telefone = isset($_POST['telefone']) ? filter_var($_POST['telefone']) : '';
		$endereco = isset($_POST['endereco']) ? filter_var($_POST['endereco']) : '';

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required');

        if ($this->form_validation->run() == TRUE)
        {
            $this->load->model('Pessoa');
            $this->Pessoa->setNome($nome);
            $this->Pessoa->setEndereco($endereco);

            $this->load->model('Agenda');
            $this->Agenda->setEmail($email);
            $this->Agenda->setTelefone($telefone);
            $this->Agenda->setDataCadastro(date('Y-m-d H:i:s'));

            $this->Pessoa->setAgenda($this->Agenda);
            $insertPessoa = $this->Pessoa->inserir();
            if($insertPessoa)
            {
	           	echo true;  
            }else
            {
            	echo $insertPessoa;
            }
        }
        else
        {
            echo validation_errors();
        }

	}

	public function atualizar()
	{
		$id_pessoa = isset($_POST['id_pessoa']) ? filter_var($_POST['id_pessoa']) : '';
		$nome = isset($_POST['nome']) ? filter_var($_POST['nome']) : '';
		$email = isset($_POST['email']) ? filter_var($_POST['email']) : '';
		$telefone = isset($_POST['telefone']) ? filter_var($_POST['telefone']) : '';
		$endereco = isset($_POST['endereco']) ? filter_var($_POST['endereco']) : '';

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required');

        if ($this->form_validation->run() == TRUE)
        {
            $this->load->model('Pessoa');
            $this->Pessoa->setId($id_pessoa);
            $this->Pessoa->setNome($nome);
            $this->Pessoa->setEndereco($endereco);

            $this->load->model('Agenda');
            $this->Agenda->setIdPessoa($id_pessoa);
            $this->Agenda->setEmail($email);
            $this->Agenda->setTelefone($telefone);
            $this->Pessoa->setAgenda($this->Agenda);

            $updatePessoa = $this->Pessoa->atualizar();
            
			if($updatePessoa){            
         		echo true;
            }else
            	echo $updatePessoa;
        }
        else
        {
            echo validation_errors();
        }

	}



	public function excluir()
	{
		$id_pessoa = isset($_POST['id_pessoa']) ? filter_var($_POST['id_pessoa']) : '';
		$this->load->model('Pessoa');
		$this->Pessoa->setId($id_pessoa);
		$deletePessoa = $this->Pessoa->excluir();
		if($deletePessoa)
		{
			echo true;
		}else
			echo $deletePessoa;
	}
}
