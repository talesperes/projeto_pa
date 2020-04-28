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

		$values = array('nome' => $data['nome'], 'sexo' => $data['sexo'], 'email' => $data['email'], 'celular' => $data['celular'], 'nascimento' => $data['data_nascimento'], 'senha' => password_hash($data['senha'], PASSWORD_DEFAULT));

		$this->load->model("Usuario_Model");
		$usuario = $this->Usuario_Model->insert($values);

		if ($usuario) {
			
			$this->load->model('RedesSociais_Model');

			$valuesRedesSociais = array('instagram' => $data['instagram'], 'facebook' => $data['facebook'], 'twitter' => $data['twitter']);
			$this->RedesSociais_Model->insert($valuesRedesSociais);

			$response = '200';
		}
		else
			$response = '400';

		echo json_encode($response);

	}

}