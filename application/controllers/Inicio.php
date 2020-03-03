<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$this->load->view('teste');
		// $this->load->view('login/index');
	}

	public function acessar()
	{	

		$data['email'] = 'tales.oliveira@alunos.fho.edu.br';
		$data['senha'] = 'abacate';

		$this->load->model('Usuario_Model');
		$usuario = $this->Usuario_Model->where('email', $data['email'])->fields(array('senha','email', 'nome'))->get();

		var_dump($usuario);

		if (password_verify($data['senha'], $usuario['senha'])) {
			$values = array('nome' => $usuario['nome']);
			$this->session->set_userdata($values);
		} else {
			echo "senha errada";
		}

		//password_hash('abacate', PASSWORD_DEFAULT);
	}

	public function sair()
	{
		session_destroy();
		redirect('inicio');
	}

}