<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitacao extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		if(isset($id) && !empty($id))
			$id_usuario = $id;
		else
			$id_usuario = $this->session->userdata('id');

		if(empty($id_usuario))
			redirect('inicio');

		$this->load->model('Usuario_Model');
		$dados['usuario'] = $this->Usuario_Model->getUsuario($id_usuario);

		if(empty($dados['usuario']))
			redirect('inicio');

		$this->load->model('UsuarioProjeto_Model');

		$count = $this->UsuarioProjeto_Model->countAllSolicitacoes($id_usuario);

		$perPage = $this->startPagination('solicitacao/index', $count, 4);
        $page    = ($this->uri->segment(4) ? $this->uri->segment(4) : 1);
        $offset  = ($page - 1) * $perPage;
		$dados["links"]    = $this->pagination->create_links();

		$dados['solicitacoes'] = $this->UsuarioProjeto_Model->getAllSolicitacoes($id_usuario, $perPage, $offset);

		$dados['title'] = 'Solicitações';
		$this->template->load("template/main", "solicitacao/index", $dados);
	}


}