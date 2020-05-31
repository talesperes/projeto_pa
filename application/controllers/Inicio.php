<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{	

		$this->load->model("Projeto_Model");
		$filtros['limit'] = 4;
		$dados['projetosDestaque'] = $this->Projeto_Model->getProjetos($filtros);

		$this->load->model("Usuario_Model");
		$dados['usuariosRank'] = $usuariosRank = $this->Usuario_Model->fields(array('id_usuario', 'nome', 'pontuacao'))->order_by('pontuacao', 'desc')->limit(20)->get_all();

		$dados['title'] = 'Inicio';
		$this->template->load("template/main", "inicio/index", $dados);
	}

	public function acessar()
	{

		$data = $this->input->post();

		$this->load->model('Usuario_Model');
		$usuario = $this->Usuario_Model->where('email', $data['email'])
		->get();

		if (password_verify($data['senha'], $usuario['senha'])) {

			$values = array('id' => $usuario['id_usuario'], 'nome' => $usuario['nome'], 'email' => $usuario['email'], 'telefone' => $usuario['telefone'], 'cidade' => $usuario['cidade'], 'estado' => $usuario['estado'], 'idade' => $interval->y,'logado' => true);
			
			$this->session->set_userdata($values);

			redirect('perfil');

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