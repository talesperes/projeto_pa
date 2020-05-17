<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{

		$id_usuario = $this->session->userdata('id');

		$this->load->model('Usuario_Model');
		$dados['usuario'] = $this->Usuario_Model->getUsuario($id_usuario);

		$dados['title'] = 'Meu Perfil';
		$this->template->load("template/main", "perfil/index", $dados);
	}

	public function projetos()
	{

		$id_usuario = $this->session->userdata('id');

		$this->load->model('Projeto_Model');
		$dados['projetos'] = $projetos = $this->Projeto_Model->getMeusProjetos($id_usuario);

		$dados['title'] = 'Meus Projetos';
		$this->template->load("template/main", "perfil/projetos", $dados);

	}

	public function alterar_perfil($id)
	{
		if(!isset($id) || empty($id) || $id != $this->session->userdata('id'))
			redirect('inicio');

		$this->load->model('Usuario_Model');
		$dados['usuario'] = $this->Usuario_Model->where('id_usuario', $id)->get();

		$dados['title'] = 'Alterar Perfil';
		$this->template->load("template/main", "perfil/alterar_perfil", $dados);
	}


}