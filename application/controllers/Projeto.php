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

		$perPage = $this->startPagination('projeto/index', $count, 4);
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

			if(!empty($_FILES['img_projeto']['name'])) {

				$dir = 'assets/imagens/usuarios/'.$this->session->userdata('id').'/projetos/';
				$this->startUpload('./' . $dir);

				if (!$this->upload->do_upload('img_projeto')) {
					var_dump($this->upload->display_errors());
					exit;
				}

				$projeto['imagem'] = $this->upload->data()['file_name'];
			}

			$this->load->model("Projeto_Model");
			$values = array('titulo' => $projeto['nome'], 'categoria' => $projeto['area'], 'descricao' => $projeto['descricao'], 'num_pessoas' => $projeto['num_pessoas'], 'status' => 'Aberto', 'imagem' => $projeto['imagem'], 'fk_p_usuario' => $this->session->userdata('id'));
			$this->Projeto_Model->insert($values);
			redirect('perfil/projetos');
		
		}

		$dados['title'] = 'Criar Projeto';
		$this->template->load("template/main", "projeto/criar_projeto", $dados);
	}

	public function visualizar($id)
	{

		if(!isset($id) && empty($id))
			redirect('projeto/');

		$this->load->model("Projeto_Model");
		$dados['projeto'] = $projeto = $this->Projeto_Model->getProjetoDetalhado($id);

		$this->load->model("UsuarioProjeto_Model");
		$dados['projetoPart'] = $this->UsuarioProjeto_Model->where('fk_up_projeto', $id)->where('fk_up_usuario', $this->session->userdata('id'))->get();

		$dados['participantes'] = $participantes = $this->UsuarioProjeto_Model->getQtdParticipantesProjeto($id);

		if($participantes['qtd'] == $projeto['num_pessoas'] && $projeto['status'] == 'Aberto') {
			$update = $this->Projeto_Model->update(array('status' => 'Executando'), $id);
			if($update)
				$this->alert->set('alert-success', 'Quantidade de participantes completa, status do projeto foi alterado para "Executando".');
		}

		if($this->session->userdata('id') == $projeto['id_usuario']) {
			$dados['solicitacoes'] = $solicitacoes = $this->UsuarioProjeto_Model->getSolicitacoesProjeto($id); 
		}

		$dados['projetosRel'] = $projetosRel = $this->Projeto_Model->where('categoria', $projeto['categoria'])->limit(4)->get_all();

		$dados['title'] = 'Projeto';
		$this->template->load("template/main", "projeto/visualizar", $dados);

	}

	public function participar($id)
	{
		if(!isset($id) && empty($id))
			redirect('projeto/');

		$this->load->model("Projeto_Model");
		$projeto = $this->Projeto_Model->where('status', "Aberto")->get($id);

		if(!$projeto || $projeto['fk_p_usuario'] == $this->session->userdata('id'))
			redirect('projeto/');

		$this->load->model('UsuarioProjeto_Model');

		$values = array('fk_up_projeto' => $id, 'fk_up_usuario' => $this->session->userdata('id'), 'status' => 'Aguardando');
		$insert = $this->UsuarioProjeto_Model->insert($values);

		if($insert)
			$this->alert->set('alert-success', 'Seu pedido para participar desse projeto foi enviado!');
		else
			$this->alert->set('alert-danger', 'Houve um problema ao tentar participar do projeto!');
		
		redirect('projeto/visualizar/'.$id);

	}

	public function cancelar($id)
	{

		if(!isset($id) && empty($id))
			redirect('projeto/');

		$this->load->model("Projeto_Model");
		$projeto = $this->Projeto_Model->where('status', "Aberto")->get($id);

		if(!$projeto || $projeto['fk_p_usuario'] == $this->session->userdata('id'))
			redirect('projeto/');

		$this->load->model('UsuarioProjeto_Model');

		$delete = $this->UsuarioProjeto_Model->where('fk_up_projeto', $id)->where('fk_up_usuario', $this->session->userdata('id'))->delete();

		if($delete)
			$this->alert->set('alert-success', 'Solicitação Cancelada!');
		else
			$this->alert->set('alert-danger', 'Houve um problema ao tentar cancelar a solicitação do projeto!');

		redirect('projeto/visualizar/'.$id);

	}

	public function aceitar($id_projeto, $id_usuario)
	{

		if(!isset($id_projeto) && empty($id_projeto) && !isset($id_usuario) && empty($id_usuario))
			redirect('projeto/');

		$this->load->model("Projeto_Model");
		$projeto = $this->Projeto_Model->getProjetoDetalhado($id_projeto);

		$this->load->model("UsuarioProjeto_Model");
		$participantes = $this->UsuarioProjeto_Model->getQtdParticipantesProjeto($id_projeto);

		if($participantes['qtd'] == $projeto['num_pessoas']) {
			$this->alert->set('alert-warning', 'Esse projeto já possui a quantidade de participantes necessária.');
			redirect('projeto/visualizar/'.$id_projeto);
		} else {

			$update = $this->UsuarioProjeto_Model->where('fk_up_projeto', $id_projeto)->where('fk_up_usuario', $id_usuario)->update(array('status' => 'Participando'));		

			if($update)
				$this->alert->set('alert-success', 'Solicitação Aceita!');
			else
				$this->alert->set('alert-danger', 'Houve um problema ao aceitar a solicitação!');

			redirect('projeto/visualizar/'.$id_projeto);
		}

	}

}