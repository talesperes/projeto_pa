<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$dados['title'] = 'Cadastro';
		$this->template->load("template/main", "cadastro/index", $dados);
	}

	public function cadastrar()
	{

		$data = $this->input->post();

		$values = array('nome' => $data['nome'], 'sexo' => $data['sexo'], 'email' => $data['email'], 'nascimento' => $data['data_nascimento'], 'cidade' => $data['cidade'], 'telefone' => $data['telefone'], 'estado' => $data['estado'],'instagram' => $data['instagram'],'twitter' => $data['twitter'],'linkedin' => $data['linkedin'],'facebook' => $data['facebook'], 'github' => $data['github'], 'senha' => password_hash($data['senha'], PASSWORD_DEFAULT));

		$this->load->model("Usuario_Model");
		$usuario = $this->Usuario_Model->insert($values);

	}

	public function teste()
	{
		$dados['title'] = 'teste';
		$this->template->load("template/main", "cadastro/teste", $dados);

	}
}