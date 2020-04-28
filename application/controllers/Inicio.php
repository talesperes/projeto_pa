<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$dados['title'] = 'Inicio';
		$this->template->load("template/main", "inicio/index", $dados);
	}

	public function acessar()
	{

		$data = $this->input->post();

		$this->load->model('Usuario_Model');
		$usuario = $this->Usuario_Model->where('email', $data['email'])->fields(array('senha','email', 'nome'))->get();

		if (password_verify($data['senha'], $usuario['senha'])) {
			$values = array('nome' => $usuario['nome'], 'logado' => true);
			$this->session->set_userdata($values);
			redirect('inicio');
		} else {
			redirect('sair');
		}

	}

	public function sair()
	{
		session_destroy();
		redirect('inicio');
	}

}