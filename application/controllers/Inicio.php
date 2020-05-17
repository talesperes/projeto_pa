<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{	

		$this->load->model("Usuario_Model");
		$dados['usuariosRank'] = $usuariosRank = $this->Usuario_Model->fields(array('nome', 'pontuacao'))->order_by('pontuacao', 'desc')->get_all();

		$dados['title'] = 'Inicio';
		$this->template->load("template/main", "inicio/index", $dados);
	}

	public function acessar()
	{

		$data = $this->input->post();

		$this->load->model('Usuario_Model');
		$usuario = $this->Usuario_Model->where('email', $data['email'])
		// ->fields(array('senha','email', 'nome','nascimento'))
		->get();

		if (password_verify($data['senha'], $usuario['senha'])) {

			$values = array('id' => $usuario['id_usuario'], 'nome' => $usuario['nome'], 'email' => $usuario['email'], 'telefone' => $usuario['telefone'], 'cidade' => $usuario['cidade'], 'estado' => $usuario['estado'], 'idade' => $interval->y,'logado' => true);
			
			$this->session->set_userdata($values);

			redirect('inicio');

		} else {
			redirect('inicio/sair');
		}

	}

	public function sair()
	{
		session_destroy();
		redirect('inicio');
	}

}