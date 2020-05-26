<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projeto extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$this->load->model("Projeto_Model");

		$dados['filtros'] = $filtros = (!empty($this->input->get()) ? $this->input->get() : array() );

		$count = $this->Projeto_Model->countProjetos($filtros);

		$perPage = $this->startPagination('projeto/index', $count, 3);
        $page    = ($this->uri->segment(4) ? $this->uri->segment(4) : 1);
        $offset  = ($page - 1) * $perPage;
		$dados["links"]    = $this->pagination->create_links();

		$dados['projetos'] = $projetos = $this->Projeto_Model->getProjetos($filtros, $perPage, $offset);

		$dados['title'] = 'Projetos';
		$this->template->load("template/main", "projeto/index", $dados);
	}

	public function criar_projeto()
	{
		$projeto = (!empty($this->input->post()) ? $this->input->post() : null ); 

		if(!empty($projeto))
		{

			$this->load->model("Projeto_Model");
			$values = array('titulo' => $projeto['nome'], 'categoria' => $projeto['area'], 'descricao' => $projeto['descricao'], 'num_pessoas' => $projeto['num_pessoas'], 'status' => '', 'fk_p_usuario' => $this->session->userdata('id'));
			$this->Projeto_Model->insert($values);
			redirect('perfil/projetos');
		
		}

		$dados['title'] = 'Criar Projeto';
		$this->template->load("template/main", "projeto/criar_projeto", $dados);
	}

}